<?php

namespace App\Libraries;

use App\Models\M_User;
use App\Models\M_Produk;
use App\Models\M_Rating;
use App\Models\M_Prediksi;

class Prediction
{
    public $mUser;
    public $mProduk;
    public $mRating;
    public $mPrediksi;

    public $user;
    public $users;
    public $userIdRated;
    public $products;
    public $ratingDb;
    public $ratingRaw;
    public $ratings;
    public $similiarities;
    public $predictions;
    public $predictionRecomendationsForUser;
    public $maes;
    public $maeRecomendationsForGuest;
    public $maeRecomendationsForUser;

    function __construct()
    {
        $this->mUser     = new M_User();
        $this->mProduk   = new M_Produk();
        $this->mRating   = new M_Rating();
        $this->mPrediksi = new M_Prediksi();

        $this->userIdRated                     = $this->mUser->getIsRated(user()->id ?? null) ? user()->id : null;
        $this->user                            = $this->user();
        $this->users                           = $this->users();
        $this->products                        = $this->products();
        $this->ratingDb                        = $this->ratingDb();
        $this->ratingRaw                       = $this->ratingRaw();
        $this->ratings                         = $this->ratings();
        $this->similiarities                   = $this->similiarities();
        $this->predictions                     = $this->predictions();
        $this->predictionRecomendationsForUser = $this->predictionRecomendationsForUser();
        $this->maes                            = $this->maes();
        $this->maeRecomendationsForGuest       = $this->maeRecomendationsForGuest();
        $this->maeRecomendationsForUser        = $this->maeRecomendationsForUser();
    }

    private function users()
    {
        $rows = $this->mUser->getUserPredictions();

        foreach ($rows as $item) {
            $result[$item['id']] = (object) [
                'id'   => $item['id'],
                'name' => $item['username'],
            ];
        }

        return $result ?? [];
    }

    function user()
    {
        return $this->userIdRated ? $this->mUser->find($this->userIdRated) : null;
    }

    private function products()
    {
        $rows = $this->mProduk->getProdukPredictions();

        foreach ($rows as $item) {
            $result[$item['id_produk']] = (object) [
                'id'   => $item['id_produk'],
                'name' => $item['nama_produk'],
            ];
        }

        return $result ?? [];
    }

    private function ratingDb()
    {
        $rows = $this->mRating->getRatingPredictions();

        foreach ($rows as $item) {
            $result[$item['id_produk']][$item['id']] = $item['nilai_rating'];
        }

        return $result ?? [];
    }

    private function ratingRaw()
    {
        $product_rows = $this->products;
        $user_rows    = $this->users;

        foreach ($product_rows as $product) {
            foreach ($user_rows as $user) {
                $result[$product->id][$user->id] = $this->ratingDb[$product->id][$user->id] ?? 0;
            }
        }

        return $result ?? [];
    }

    private function ratings()
    {
        $product_rows = $this->products;
        $user_rows    = $this->users;

        foreach ($product_rows as $product) {
            $products[$product->id] = $product;

            foreach ($user_rows as $user) {
                $users[$user->id] = $user;

                $rating       = $this->ratingRaw[$product->id][$user->id];
                $rating_sum   = array_sum($this->ratingRaw[$product->id]);
                $rating_count = count($this->ratingRaw[$product->id]);
                $rating_avg   = $this->division($rating_sum, $rating_count);

                $rating_users[$product->id][$user->id] = (object) [
                    'id'               => $user->id,
                    'name'             => $user->name,
                    'rating'           => $rating,
                    'rating_minus_avg' => $rating - $rating_avg,
                ];

                $product_ratings[$product->id] = [
                    'product'    => $products[$product->id],
                    'users'      => $rating_users[$product->id],
                    'sum'        => $rating_sum,
                    'count'      => $rating_count,
                    'rating_avg' => $rating_avg,
                ];
            }
        }

        $result['products']        = $products ?? [];
        $result['users']           = $users ?? [];
        $result['product_ratings'] = $product_ratings ?? [];

        return (object) $result;
    }

    private function similiarities()
    {
        $product_rows = $this->products;

        foreach ($product_rows as $product_1) {
            $products[$product_1->id] = $product_1;

            foreach ($product_rows as $product_2) {
                $similiarity['product']     = $products[$product_1->id];
                $similiarity['similiarity'] = $this->similiarity(
                    $product_1->id,
                    $product_2->id,
                );

                $similiarities[$product_1->id]['product']                                  = $similiarity['product'];
                $similiarities[$product_1->id]['compares'][$product_2->id]                 = $similiarity;
                $similiarities[$product_1->id]['similiarity_sum'][$product_2->id]          = $similiarity['similiarity']->similiarity;
                $similiarities[$product_1->id]['similiarity_absolute_sum'][$product_2->id] = $similiarity['similiarity']->similiarity_absolute;
            }

            $similiarities[$product_1->id]['similiarity_sum']          = array_sum($similiarities[$product_1->id]['similiarity_sum']);
            $similiarities[$product_1->id]['similiarity_absolute_sum'] = array_sum($similiarities[$product_1->id]['similiarity_absolute_sum']);
        }

        $result['products']      = $products ?? [];
        $result['similiarities'] = $similiarities ?? [];

        return (object) $result;
    }

    private function similiarity($product_id_1, $product_id_2)
    {
        $users = $this->ratings->users;

        foreach ($users as $user) {
            $product_id_1_rating_minus_avg = $this->ratings->product_ratings[$product_id_1]['users'][$user->id]->rating_minus_avg;
            $product_id_2_rating_minus_avg = $this->ratings->product_ratings[$product_id_2]['users'][$user->id]->rating_minus_avg;

            $numerator[$user->id]     = $product_id_1_rating_minus_avg * $product_id_2_rating_minus_avg;
            $denominator_1[$user->id] = pow(($product_id_1_rating_minus_avg), 2);
            $denominator_2[$user->id] = pow(($product_id_2_rating_minus_avg), 2);
        }

        $numerator     = array_sum($numerator ?? []);
        $denominator_1 = sqrt(array_sum($denominator_1));
        $denominator_2 = sqrt(array_sum($denominator_2));
        $denominator   = $denominator_1 * $denominator_2;
        $similiarity   = $this->division($numerator, $denominator);

        $result['numerator']            = $numerator;
        $result['denominator_1']        = $denominator_1;
        $result['denominator_2']        = $denominator_2;
        $result['denominator']          = $denominator;
        $result['similiarity']          = $similiarity;
        $result['similiarity_absolute'] = abs($similiarity);

        return (object) $result;
    }

    private function predictions()
    {
        $product_rows = $this->products;
        $user_rows    = $this->users;

        foreach ($product_rows as $product) {
            $products[$product->id] = $product;

            foreach ($user_rows as $user) {
                $users[$user->id] = $user;

                $prediction['product']    = $products[$product->id];
                $prediction['user']       = $users[$user->id];
                $prediction['prediction'] = $this->prediction(
                    $product->id,
                    $user->id,
                );

                $predictions[$product->id]['product']          = $prediction['product'];
                $predictions[$product->id]['users'][$user->id] = $prediction;

                $recomendations_for_user[$user->id][$product->id] = $predictions[$product->id]['users'][$user->id]['prediction']->prediction;
                arsort($recomendations_for_user[$user->id]);
            }
        }

        $result['products'] = $products ?? [];
        $result['users'] = $users ?? [];
        $result['predictions'] = $predictions ?? [];
        $result['recomendations_for_user'] = $recomendations_for_user ?? [];

        return (object) $result;
    }

    private function predictionRecomendationsForUser()
    {
        if ($this->userIdRated) {
            foreach ($this->predictions->recomendations_for_user[$this->userIdRated] as $product_id => $prediction) {
                $result[$product_id]['product']    = $this->products[$product_id];
                $result[$product_id]['prediction'] = $prediction;
            }

            return (object) $result;
        }
    }

    private function prediction($product_id, $user_id)
    {
        $rating_avg  = $this->ratings->product_ratings[$product_id]['rating_avg'];
        $numerator   = $this->prediction_numerator($product_id, $user_id);
        $denominator = $this->similiarities->similiarities[$product_id]['similiarity_absolute_sum'];

        $result['rating_avg']  = $rating_avg;
        $result['numerator']   = $numerator;
        $result['denominator'] = $denominator;
        $result['prediction']  = $result['rating_avg'] + $this->division($result['numerator'], $result['denominator']);

        return (object) $result;
    }

    private function prediction_numerator($product_id, $user_id)
    {
        $similiarities = $this->similiarities->similiarities[$product_id]['compares'];

        foreach ($similiarities as $product_id_2 => $similiarity) {
            $rating_minus_avg  = $this->ratings->product_ratings[$product_id_2]['users'][$user_id]->rating_minus_avg;
            $similiarity_value = $similiarity['similiarity']->similiarity;

            $result[$product_id_2] = $rating_minus_avg * $similiarity_value;
        }

        return array_sum($result ?? []);
    }

    private function maes()
    {
        $product_rows = $this->products;
        $user_rows    = $this->users;

        foreach ($product_rows as $product) {
            $products[$product->id] = $product;

            $mae['product'] = $products[$product->id];

            foreach ($user_rows as $user) {
                $users[$user->id] = $user;

                $mae['user'] = $users[$user->id];
                $mae['mae']  = $this->mae(
                    $product->id,
                    $user->id,
                );

                $mae_sum[$product->id][$user->id] = $mae['mae']->mae;

                $maes[$product->id]['users'][$user->id] = $mae;

                $recomendations_for_user[$user->id][$product->id] = $mae_sum[$product->id][$user->id];
                arsort($recomendations_for_user[$user->id]);
            }

            $maes[$product->id]['product'] = $products[$product->id];
            $maes[$product->id]['sum']     = array_sum($mae_sum[$product->id]);
            $maes[$product->id]['count']   = count($mae_sum[$product->id]);
            $maes[$product->id]['avg']     = $this->division($maes[$product->id]['sum'], $maes[$product->id]['count']);

            $recomendations_for_guest[$product->id] = $maes[$product->id]['avg'];
        }

        if ($recomendations_for_guest) {
            asort($recomendations_for_guest);
        }

        $result['products']                 = $products ?? [];
        $result['users']                    = $users ?? [];
        $result['maes']                     = $maes ?? [];
        $result['recomendations_for_guest'] = $recomendations_for_guest ?? [];
        $result['recomendations_for_user']  = $recomendations_for_user ?? [];

        return (object) $result;
    }

    private function mae($product_id, $user_id)
    {
        $prediction = $this->predictions->predictions[$product_id]['users'][$user_id]['prediction']->prediction;
        $rating_avg = $this->ratings->product_ratings[$product_id]['users'][$user_id]->rating;

        $result['mae_non_abs'] = $prediction - $rating_avg;
        $result['mae']         = abs($result['mae_non_abs']);

        return (object) $result;
    }

    private function maeRecomendationsForGuest()
    {
        foreach ($this->maes->recomendations_for_guest as $product_id => $mae) {
            $result[$product_id]['product'] = $this->products[$product_id];
            $result[$product_id]['mae']     = $mae;
        }

        return (object) $result ?? [];
    }

    private function maeRecomendationsForUser()
    {
        if ($this->userIdRated) {
            foreach ($this->maes->recomendations_for_user[$this->userIdRated] as $product_id => $mae) {
                $result[$product_id]['product'] = $this->products[$product_id];
                $result[$product_id]['mae']     = $mae;
            }

            return (object) $result ?? [];
        }
    }

    function update()
    {
        $this->mPrediksi->truncate();

        $this->update_mae_product();
        $this->update_mae_recomendations();
        $this->update_prediction_recomendations();
    }

    function update_mae_product()
    {
        foreach ($this->maes->recomendations_for_guest as $id => $recomendation) {
            $this->mProduk->update($id, [
                $this->mProduk->maeColumnName => $recomendation
            ]);
        }
    }

    function update_mae_recomendations()
    {
        foreach ($this->maes->recomendations_for_user as $user_id => $products) {
            foreach ($products as $product_id => $mae) {
                $is_exists = $this->mPrediksi->getPredictionOf($user_id, $product_id);

                if ($is_exists) {
                    $this->mPrediksi->updateMae($user_id, $product_id, $mae);
                } else {
                    $this->mPrediksi->insertMae($user_id, $product_id, $mae);
                }
            }
        }
    }

    function update_prediction_recomendations()
    {
        foreach ($this->predictions->recomendations_for_user as $user_id => $products) {
            foreach ($products as $product_id => $prediction) {
                $is_exists = $this->mPrediksi->getPredictionOf($user_id, $product_id);

                if ($is_exists) {
                    $this->mPrediksi->updatePrediction($user_id, $product_id, $prediction);
                } else {
                    $this->mPrediksi->insertPrediction($user_id, $product_id, $prediction);
                }
            }
        }
    }

    function division($numerator, $denominator)
    {
        return $denominator ? $numerator / $denominator : 0;
    }

    function recomendationProductsForUser()
    {
        return $this->mPrediksi->getRecomendationProductsForUser($this->userIdRated);
    }

    function recomendationProductsForGuest()
    {
        return $this->mPrediksi->getRecomendationProductsForGuest();
    }
}
