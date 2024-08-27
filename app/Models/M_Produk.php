<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Produk extends Model
{
    protected $table      = 'produk';
    protected $primaryKey = 'id_produk';
    protected $allowedFields = ['id_kategori', 'nama_produk', 'deskripsi_produk', 'harga', 'sampul', 'nilai_mae','maps'];
    protected $useTimestamps = true;
    protected $maeColumnName = 'nilai_mae';

    public function getProdukPredictions()
    {
        $ratingProduk = new M_Rating();
        $ratingProduk = $ratingProduk->select('id_produk')
            ->distinct('id_produk')
            ->get()
            ->getResultArray();

        foreach ($ratingProduk as $key => $value) {
            $id_produks[$key] = $value['id_produk'];
        }

        return $this->whereIn('id_produk', $id_produks)
            ->findAll();
    }

    public function getProdukKategori()
    {
        $query =  $this->db->table('produk')
        ->select('*')
        ->join('kategori', 'kategori.id_kategori = produk.id_kategori')
        ->get();  
        return $query;
    }

    public function getProdukKategoriHome()
    {
        $query =  $this->db->table('produk')
        ->select('*')
        ->join('kategori', 'kategori.id_kategori = produk.id_kategori')
        ->limit(3)
        ->orderBy('id_produk', 'DESC')
        ->get();  
        return $query;
    }

    public function getallprodukrating()
    {
        $query= $this->db->query( "SELECT kategori.id_kategori as kategori, induk_kategori, produk.id_produk as idproduk, nama_produk, harga, deskripsi_produk, sampul , rating.id_produk as produk, SUM(rating.nilai_rating) as jumlah_rating, COUNT(rating.id) as jumlah_rater, SUM(rating.nilai_rating)/COUNT(rating.id) as rata_rating, nama_kategori FROM produk JOIN rating ON produk.id_produk = rating.id_produk JOIN kategori ON kategori.id_kategori = produk.id_kategori GROUP BY rating.id_produk ");
        return $query;
    }

    public function getratingfirst($id_produk){
        $query =  $this->db->table('rating')
        ->select('fullname, komentar, nilai_rating, id_rating, rating.id_produk as idproduk')
        ->join('users', 'rating.id = users.id')
        ->where('rating.id_produk =' . $id_produk)
        ->orderBy('id_rating', 'DESC')
        ->get();  
        return $query;
    }
    
    
}
