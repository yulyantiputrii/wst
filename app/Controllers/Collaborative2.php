<?php

namespace App\Controllers;
use App\Models\M_Produk;
use App\Models\M_Kategori;
use App\Models\M_Rating;
use LDAP\Result;
use PHPUnit\Framework\Constraint\Count;

class Collaborative2 extends BaseController
{
    protected   $mProduk, 
                $mKategori, 
                $mRating, 
                $db, 
                $builder
                ;
    public      $ratingDb, 
                $ratingRaw,
                $users,
                $user_id,
                $products,
                $ratings,
                $similarities
                // $predictionRecomendationsForUser,
                // $predictions
                ;

    public function __construct($user_id = null)
    {
        $this->db           = \Config\Database::connect();
        $this->builder      = $this->db->table('users');
        $this->mProduk      = new M_Produk();
        $this->mKategori    = new M_Kategori();
        $this->mRating      = new M_Rating();
        $this->users        = $this->users();
        $this->user_id      = $_SESSION['user_id'] ?? $user_id;
        $this->products     = $this->products();
        $this->ratingDb     = $this->ratingDb();
        $this->ratingRaw    = $this->ratingRaw();
        $this->ratings      = $this->ratings();
        $this->similarities   = $this->similarities();
        // $this->predictions = $this->predictions();
        // $this->predictionRecomendationsForUser = $this->predictionRecomendationsForUser();
        
    }

    public function users(){

        $rows = $this->mRating->usersRating()->getResultArray();
        $result = [];

        foreach($rows as $item){
            $id = $item['id']; //mengambil id
            $username = $item['username']; //mengambil username

            // mengisi user dengan data yang diambil
            $user['id'] = $id;
            $user['username'] = $username;

            //menampilkan array id yang diisi dengan user (id, username)
            $result[$id] = (object) $user;
        }

        return $result;
    }

    function user()
    {
        $this->builder->select('id, username');
        $this->builder->where('id', $this->user_id);
        // $query = $this->builder->get();
        $query = $this->builder->get();
        return $query;

    }

    private function products()
    {
        $rows = $this->mProduk->findAll();
        
        foreach ($rows as $item) {
            $id = $item['id_produk'];
            $name = $item['nama_produk'];

            $product['id_produk'] = $id;
            $product['nama_produk'] = $name;

            $result[$id] = (object) $product;
        }

        return $result;
    }

    public function ratingdb(){
        
        $rows = $this->mRating->findAll();
        $result = [];
        foreach ($rows as $item){
            $user_id    = $item['id'];
            $product_id = $item['id_produk'];
            $rating     = $item['nilai_rating'];

            //rating berdasarkan produk dengan isi user = nilai rating
            $result[$product_id][$user_id] = $rating;
        }

        return $result;
    }

    public function ratingRaw(){        
        $users = $this->users;
        $products = $this->products;
        $ratingDb = $this->ratingDb;
        $result = [];

        foreach ($products as $product) {

            foreach ($users as $user) {
                $user_id = $user->id; //mengambil id user
                $product_id = $product->id_produk; //mengambil id produk

                //menampilkan produk id -> user id -> nilai rating. Jika nilai null maka auto 0
                $result[$product_id][$user_id] = $ratingDb[$product_id][$user_id] ?? 0;
                
            }
        }
        return $result;
    }

    private function ratings()
    {
        $products = [];
        $users = [];

        foreach ($this->products as $product) { //mengulang id produk
            $products[$product->id_produk] = $product; 

            foreach ($this->users as $user) { //mengulang id user
                $users[$user->id] = $user;

                //mengambil nilai rating, nilai 0 jika tidak ada data
                $rating = $this->ratingRaw[$product->id_produk][$user->id] ?? 0; 
                $rating_sum = array_sum($this->ratingRaw[$product->id_produk]);
                $rating_count = count($this->ratingRaw[$product->id_produk]);
                $rating_avg = $rating_sum / $rating_count ; 

                //mengisi nilai
                $rating_user_item = [
                    'id'                => $user->id,
                    'username'          => $user->username,
                    // 'rating'            => $rating ?: 0,
                    'rating'            => $rating,
                    'rating_minus_avg'  => $rating - $rating_avg
                ];

                $rating_users[$product->id_produk][$user->id] = (object) $rating_user_item;

                $product_rating_item = [
                    'product'           => $products[$product->id_produk],
                    'users'             => $rating_users[$product->id_produk],
                    'sum'               => $rating_sum,
                    'count'             => $rating_count,
                    'rating_avg'        => $rating_avg
                ];

                $product_ratings[$product->id_produk] = $product_rating_item;
            }
        }

        $result['products'] = $products; //result dari function
        $result['users'] = $users; //result dari function
        $result['product_ratings'] = $product_ratings; //result hasil function ini

        return (object) $result;
    }
    
    public function similarity($product_id_1, $product_id_2){
        $users      = $this->ratings->users;
        // $users      = $this->users;
        $numerator  = [];

        foreach ($users as $user) {

            // masukkan id_produk ke product_ratings yang ada didalam function ratings. lalu masukkan user id ke user yang ada didalam rating_item
            // id user akan diteruskan ke rating_user. kemudian diteruskan ke algoritma rating_minus_avg didalam rating_user_item
            $product_id_1_rating_minus_avg = $this->ratings->product_ratings[$product_id_1]['users'][$user->id]->rating_minus_avg; // hasil per baris. contoh (-0,8)
            $product_id_2_rating_minus_avg = $this->ratings->product_ratings[$product_id_2]['users'][$user->id]->rating_minus_avg; // hasil perbaris. contoh (3,4)

            //user->id = id user saat ini (yang sedang di foreach)
            $numerator[$user->id] = $product_id_1_rating_minus_avg * $product_id_2_rating_minus_avg;

            //pow untuk memangkatkan
            $denominator_1[$user->id] = pow(($product_id_1_rating_minus_avg), 2); 
            $denominator_2[$user->id] = pow(($product_id_2_rating_minus_avg), 2);
        }

        $numerator = array_sum($numerator);
        $denominator_1 = sqrt(array_sum($denominator_1)); //sqrt untuk menghitung akar
        $denominator_2 = sqrt(array_sum($denominator_2)); //sqrt untuk menghitung akar

        $denominator = $denominator_1 * $denominator_2;
        $similarity = $numerator / $denominator ;

        $result = [
            'numerator'             => $numerator,
            'denominator_1'         => $denominator_1,
            'denominator_2'         => $denominator_2,
            'denominator'           => $denominator,
            'similarity'            => $similarity,
            'similarity_absolute'   => abs($similarity)
        ];

        return (object) $result;
    }

    public function similarities(){
        $products = [];
        $similarities = [];

        foreach ($this->products as $product_1) {
            $products[$product_1->id_produk] = $product_1;

            foreach ($this->products as $product_2) {
                $similarity['product'] = $products[$product_1->id_produk];
                $similarity['similarity'] = $this->similarity($product_1->id_produk, $product_2->id_produk);

                // echo $product_1->nama_produk . " _ ";
                // echo $product_2->nama_produk . " <br>";

                $similarities[$product_1->id_produk]['product'] = $similarity['product']; //nama dan id produk
                $similarities[$product_1->id_produk]['compares'][$product_2->id_produk] = $similarity; //compares yang diisi hasil similarity produk 1 dan 2
                $similarities[$product_1->id_produk]['similarity_sum'][$product_2->id_produk] = $similarity['similarity']->similarity; //mengambil semua hasil similarity untuk di sum.
                $similarities[$product_1->id_produk]['similarity_absolute_sum'][$product_2->id_produk] = $similarity['similarity']->similarity_absolute; // mengambil semua hasil abs similairty 

            }

            $similarities[$product_1->id_produk]['similarity_sum'] = array_sum($similarities[$product_1->id_produk]['similarity_sum']); // jumlah similarity
            $similarities[$product_1->id_produk]['similarity_absolute_sum'] = array_sum($similarities[$product_1->id_produk]['similarity_absolute_sum']); //jumlah semua similarity yang sudah di abs
        }

        $result['products'] = $products;
        $result['similarities'] = $similarities;

        return (object) $result;
    }

    // private function predictions()
    // {
    //     $products = [];
    //     $users = [];
    //     $predictions = [];

    //     foreach ($this->products as $product) {
    //         $products[$product->id_produk] = $product;

    //         foreach ($this->users as $user) {
    //             $users[$user->id] = $user;

    //             $prediction['product'] = $products[$product->id_produk];
    //             $prediction['user'] = $users[$user->id];
    //             $prediction['prediction'] = $this->prediction(
    //                 $product->id_produk,
    //                 $user->id,
    //             );

    //             $predictions[$product->id_produk]['product'] = $prediction['product'];
    //             $predictions[$product->id_produk]['users'][$user->id] = $prediction;

    //             $recomendations_for_user[$user->id][$product->id_produk] = $predictions[$product->id_produk]['users'][$user->id]['prediction']->prediction;
    //             arsort($recomendations_for_user[$user->id]);
    //         }
    //     }

    //     $result['products'] = $products;
    //     $result['users'] = $users;
    //     $result['predictions'] = $predictions;
    //     $result['recomendations_for_user'] = $recomendations_for_user;

    //     return (object) $result;
    // }

    // private function predictionRecomendationsForUser()
    // {

    //     if ($this->user_id) {
    //         foreach ($this->predictions->recomendations_for_user[$this->user_id] as $product_id => $prediction) {
    //             $result[$product_id]['product'] = $this->products[$product_id];
    //             $result[$product_id]['prediction'] = $prediction;
    //         }

    //         return (object) $result;
    //     }
    // }

    // private function prediction($product_id, $user_id)
    // {
    //     $rating_avg = $this->ratings->product_ratings[$product_id]['rating_avg'];
    //     $numerator = $this->prediction_numerator($product_id, $user_id);
    //     $denominator = $this->similiarities->similiarities[$product_id]['similiarity_absolute_sum'];

    //     $result['rating_avg'] = $rating_avg;
    //     $result['numerator'] = $numerator;
    //     $result['denominator'] = $denominator;
    //     $result['bagi'] = $result['numerator'] / $result['denominator'];

    //     $result['prediction'] = $result['rating_avg'] + $result['bagi'];
    //     // $result['prediction'] = $result['rating_avg'] + $this->division($result['numerator'], $result['denominator']);

    //     return (object) $result;
    // }

    // private function prediction_numerator($product_id, $user_id)
    // {
    //     $similiarities = $this->similiarities->similiarities[$product_id]['compares'];
    //     $result = [];

    //     foreach ($similiarities as $product_id_2 => $similiarity) {
    //         $rating_minus_avg = $this->ratings->product_ratings[$product_id_2]['users'][$user_id]->rating_minus_avg;
    //         $similiarity_value = $similiarity['similiarity']->similiarity;

    //         $result[$product_id_2] = $rating_minus_avg * $similiarity_value;
    //     }

    //     return array_sum($result);
    // }


    public function index()
    {
        $sim = $this->similarities();
        dd($sim);

        return view('collaborative');
    }


}
