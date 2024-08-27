<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Rating extends Model
{
    protected $table      = 'rating';
    protected $primaryKey = 'id_rating';
    protected $allowedFields = ['id_rating','id', 'fullname', 'username', 'id_produk', 'nilai_rating', 'komentar'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_rating';
    protected $updatedField  = 'updated_rating';

    public function getRatingPredictions()
    {
        return $this->where('id IS NOT NULL', null, false)
            ->where('id_produk IS NOT NULL', null, false)
            ->findAll();
    }

    public function getRatingInfo()
    {
        $query =  $this->db->table('rating')
        ->select('id_rating, username, fullname, nama_produk, nilai_rating, komentar')
        ->join('produk', 'produk.id_produk = rating.id_produk')
        ->join('users', 'users.id = rating.id')
        ->get();  
        return $query;
    }

    public function hitungRating()
    {
        $query= $this->db->query( "SELECT produk.id_produk as idproduk, nama_produk, harga, deskripsi_produk, sampul , rating.id_produk as produk, SUM(rating.nilai_rating) as jumlah_rating, COUNT(rating.id) as jumlah_rater, SUM(rating.nilai_rating)/COUNT(rating.id) as rata_rating, nama_kategori FROM produk JOIN rating ON produk.id_produk = rating.id_produk JOIN kategori ON kategori.id_kategori = produk.id_kategori GROUP BY rating.id_produk DESC LIMIT 3 ");
        return $query;
    }
}
