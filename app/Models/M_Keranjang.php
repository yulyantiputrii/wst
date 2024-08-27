<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Keranjang extends Model
{
    protected $table      = 'keranjang';
    protected $primaryKey = 'id_keranjang';
    protected $allowedFields = ['id_produk', 'tanggal_tour', 'item', 'id'];

    public function pesanan($id)
    {
        $query =  $this->db->table('keranjang')
        ->select('id_keranjang, keranjang.id_produk as idproduk, keranjang.id as iduser, tanggal_tour, item, nama_produk, harga, sampul')
        ->join('produk', 'produk.id_produk = keranjang.id_produk')
        ->join('users', 'users.id = keranjang.id')
        ->where('users.id = ' . $id)
        ->orderBy('id_keranjang', 'DESC')
        ->get();  
        return $query;
    }
    public function detailPesanan($id_keranjang)
    {
        $query =  $this->db->table('keranjang')
        ->select('id_keranjang, keranjang.id_produk as idproduk, keranjang.id as iduser, tanggal_tour, item, nama_produk, harga, sampul')
        ->join('produk', 'produk.id_produk = keranjang.id_produk')
        ->join('users', 'users.id = keranjang.id')
        ->where('keranjang.id_keranjang = ' . $id_keranjang)
        ->orderBy('id_keranjang', 'DESC')
        ->get();  
        return $query;
    }

}