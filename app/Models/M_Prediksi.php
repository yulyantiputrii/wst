<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Prediksi extends Model
{
    protected $table              = 'prediksi';
    protected $primaryKey         = 'id';
    protected $allowedFields      = ['id_user', 'nama_produk', 'id_produk', 'nilai_prediksi', 'nilai_mae'];
    protected $limitRecomendation = 3;

    public function getPredictionOf($id_user, $id_produk)
    {
        return $this->where('id_user', $id_user)
            ->where('id_produk', $id_produk)
            ->findAll();
    }

    public function insertMae($id_user, $id_produk, $mae)
    {
        return $this->insert([
            'id_user'   => $id_user,
            'id_produk' => $id_produk,
            'nilai_mae' => $mae
        ]);
    }

    public function updateMae($id_user, $id_produk, $mae)
    {
        return $this->where('id_user', $id_user)
            ->where('id_produk', $id_produk)
            ->set(['nilai_mae' => $mae])
            ->update();
    }

    public function insertPrediction($id_user, $id_produk, $prediction)
    {
        return $this->insert([
            'id_user'        => $id_user,
            'id_produk'      => $id_produk,
            'nilai_prediksi' => $prediction
        ]);
    }

    public function updatePrediction($id_user, $id_produk, $prediction)
    {
        return $this->where('id_user', $id_user)
            ->where('id_produk', $id_produk)
            ->set(['nilai_prediksi' => $prediction])
            ->update();
    }

    public function getRecomendationProductsForUser($userId)
    {
        return $this->select("produk.*, {$this->table}.nilai_mae, {$this->table}.nilai_prediksi")
            ->join('produk', "produk.id_produk = {$this->table}.id_produk")
            ->join('users', "users.id = {$this->table}.id_user")
            ->where("users.id = {$userId}")
            ->limit($this->limitRecomendation)
            ->orderBy('nilai_prediksi', 'DESC')
            ->get()
            ->getResult();
    }

    public function getRecomendationProductsForGuest()
    {
        $produk = new M_Produk();
        $produkPredictions = $produk->getProdukPredictions();

        foreach ($produkPredictions as $key => $value) {
            $id_produks[$key] = $value['id_produk'];
        }

        return $id_produks ?
            $produk->whereIn('id_produk', $id_produks)
            ->limit($this->limitRecomendation)
            ->orderBy('nilai_mae', 'ASC')
            ->get()
            ->getResult() :
            [];
    }
}
