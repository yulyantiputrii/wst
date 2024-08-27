<?php

namespace App\Controllers;
use App\Models\M_Transaksi;

class AdminTransaksi extends BaseController
{
    protected $db, $builder, $mTransaksi;
    public $detailtransaksi;

    public function __construct()
    {
        $this->db           = \Config\Database::connect();
        $this->builder      = $this->db->table('users');
        $this->mTransaksi   = new M_Transaksi();
    }

    public function detailtransasksi($id_transaksi){
                $this->builder->select('
                id_transaksi,
                produk.id_produk as idproduk,
                produk.nama_produk as namaproduk,
                sampul,
                fullname,
                item,
                harga,
                country, city, email, birthday, phone_number, 
                total_biaya,
                tanggal_tour,
                jenis_transaksi,
                status_transaksi,
                bukti_transaksi,
                status_tour,
                fullname,
                tanggal_tour,
                status_transaksi,
                transaksi.created_at as created,
                transaksi.updated_at as updated,
        ');
        $this->builder->join('transaksi', 'users.id = transaksi.id');
        $this->builder->join('produk', 'produk.id_produk = transaksi.id_produk');
        $this->builder->where('transaksi.id_transaksi = '. $id_transaksi);
        $query = $this->builder->get();

        return $query;
    }

    public function index(){

        $this->builder->select('
                                id_transaksi,
                                produk.id_produk as idproduk,
                                produk.nama_produk as namaproduk,
                                fullname,
                                item,
                                harga,
                                total_biaya,
                                country,
                                tanggal_tour,
                                jenis_transaksi,
                                bukti_transaksi,
                                status_tour,
                                fullname,
                                tanggal_tour,
                                status_transaksi,
                                transaksi.created_at as created,
                                transaksi.updated_at as updated,
        ');
        $this->builder->join('transaksi', 'users.id = transaksi.id');
        $this->builder->join('produk', 'produk.id_produk = transaksi.id_produk');
        $query = $this->builder->get();
        // dd($query->getResultArray());

        $data = [
            'title'         => 'Transaksi Admin',
            'transaksi'     => $query->getResultArray() //untuk mengambil data bertype objek
        ];
        return view('admin/transaksi', $data);
    }

     public function view($id_transaksi){
        // $id_transaksi = '12';
        $detailtransaksi = $this->detailtransasksi($id_transaksi)->getFirstRow();

        // dd($detailtransaksi);

        $data = [
            'title'         => 'Transaksi Detail',
            'transaksi'     => $detailtransaksi //untuk mengambil data bertype objek
        ];
        
        return view('admin/transaksidetail', $data);
    }

    public function update($id_transaksi){

        // dd($this->request->getVar());

        $this->mTransaksi->save([
            'id_transaksi'          =>  $id_transaksi,
            'status_transaksi'      =>  $this->request->getVar('status_transaksi'),
            'status_tour'           =>  $this->request->getVar('status_tour'),
        ]);    
        return redirect()->to('/transaksiadmin')->with('berhasil', 'Data berhasil di Edit');
    }
   
}
