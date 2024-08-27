<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Transaksi extends Model
{
    protected $table      = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = [
        'id_produk',
        'id',
        'item',
        'total_biaya',
        'tanggal_tour',
        'jenis_transaksi',
        'status_transaksi',
        'bukti_transaksi',
        'status_tour',
        'created_at',
        'updated_at'
    ];
    protected $useTimestamps = true;

    public function detailtransaksi($id){
        $query =  $this->db->table('transaksi')
        ->select('
                    id_transaksi,
                    transaksi.id_produk as idproduk,
                    nama_produk,
                    item,
                    harga,
                    total_biaya,
                    tanggal_tour,
                    jenis_transaksi,
                    status_transaksi,
                    bukti_transaksi,
                    status_tour,
                    id_rating,
                    nilai_rating,
                    komentar,
                    transaksi.created_at as created,
                    transaksi.updated_at as updated,
        ')
        ->join('produk', 'produk.id_produk = transaksi.id_produk')
        ->join('rating', 'transaksi.id_produk = rating.id_produk')
        ->where('transaksi.id = ' . $id)
        ->where('rating.id = ' . $id)
        ->get();  
        return $query;
    }

    public function detailtransaksiuser($id){
        $query =  $this->db->table('transaksi')
        ->select('
                    id_transaksi,
                    transaksi.id_produk as idproduk,
                    nama_produk,
                    item,
                    harga,
                    sampul,
                    total_biaya,
                    tanggal_tour,
                    jenis_transaksi,
                    status_transaksi,
                    bukti_transaksi,
                    status_tour,
                    id_rating,
                    nilai_rating,
                    komentar,
                    transaksi.created_at as created,
                    transaksi.updated_at as updated,
        ')
        ->join('produk', 'produk.id_produk = transaksi.id_produk')
        ->join('rating', 'transaksi.id_produk = rating.id_produk')
        ->where('transaksi.id_transaksi = ' . $id)
        ->get();  
        return $query;
    }
    
   
}