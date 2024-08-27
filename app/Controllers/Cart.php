<?php

namespace App\Controllers;

use App\Models\M_Keranjang;
use App\Models\M_Rating;
use App\Models\M_Transaksi;

class Cart extends BaseController
{
    public $home, $mTransaksi, $mKeranjang, $mRating, $db;

    public function __construct()
    {
        $this->home            = new Home();
        $this->mTransaksi      = new M_Transaksi();
        $this->mKeranjang      = new M_Keranjang();
        $this->mRating        = new M_Rating();
    }

    public function index()
    {
        $iduser = user()->id ?? null;

        $role = $this->home->cekrole($iduser); //mengambil role dari function cekrole di class home
        $rolee = $role->role;

        // $detailPesanan  = $this->mKeranjang->pesanan()->getResultObject();        
        $detailPesanan  = $this->mKeranjang->pesanan($iduser)->getResultObject();  

        // dd($detailPesanan);

        $data = [
            'title'             => 'Cart',
            'role'              => $rolee,
            'detail_pesanan'    => $detailPesanan,
            // 'total_biaya'       => $totalBiaya
        ];

        return view('user/Cart', $data);
    }

    // halaman detail produk
    public function addcart(){
        $this->mKeranjang->save([
            'id'                => $this->request->getVar('id'),
            'id_produk'         => $this->request->getVar('id_produk'),
            'tanggal_tour'      => $this->request->getVar('tanggal_tour'),
            'item'              => $this->request->getVar('item')
        ]);

        return redirect()->to('/cart');
    }

    public function delete($id_keranjang){
        $this->mKeranjang->delete($id_keranjang);
        return redirect()->to('cart');
    }

    public function prosescheckout($id_keranjang){
        $iduser = user()->id ?? null;
        $role = $this->home->cekrole($iduser); //mengambil role dari function cekrole di class home
        $rolee = $role->role;

        $detailPesanan  = $this->mKeranjang->detailPesanan($id_keranjang)->getFirstRow();     

        // jika data kosong
        if (empty($detailPesanan)){
            return redirect()->to('/cart');
        }
        // dd($detailPesanan);

        $data = [
            'title'             => 'Checkout',
            'role'              => $rolee,
            'detail_pesanan'    => $detailPesanan,
            // 'total_biaya'       => $totalBiaya
        ];

        return view('user/checkout', $data);
    }

    // add transaksi dan hapus keranjang
    public function addtransaksi($id_keranjang){

        $this->mKeranjang->delete($id_keranjang);

        // $this->mRating->save([
        //     'id'                =>  user()->id,
        //     'id_produk'         =>  $this->request->getVar('id_produk'),
        // ]);    

        $this->mTransaksi->save([
            'id_produk'         =>  $this->request->getVar('id_produk'),
            'id'                =>  $this->request->getVar('id'),
            'item'              =>  $this->request->getVar('item'),
            'total_biaya'       =>  $this->request->getVar('total_biaya'),
            'tanggal_tour'      =>  $this->request->getVar('tanggal_tour'),
            'jenis_transaksi'   =>  $this->request->getVar('jenis_transaksi'),
            'status_transaksi'  =>  $this->request->getVar('status_transaksi'),
            'status_tour'       =>  'ongoing',
        ]); 

        return redirect()->to('/history');
    }

    public function history(){
        $iduser = user()->id ?? null;
        $role = $this->home->cekrole($iduser); //mengambil role dari function cekrole di class home
        $rolee = $role->role;

        // $history = $this->mTransaksi->where('id', $iduser)->findAll();
        $history = $this->mTransaksi->detailtransaksi($iduser)->getResultArray();

        // dd($history);
        $data = [
            'title'     => 'History',
            'history'   => $history,
            'role'      => $rolee,
        ];
        return view('user/history', $data);
    }

    public function detailhistory($id_transaksi){
        $iduser = user()->id ?? null;
        $role = $this->home->cekrole($iduser); 
        $rolee = $role->role;

        $detail_pesanan = $this->mTransaksi->detailtransaksiuser($id_transaksi)->getFirstRow();
        
        // dd($detail_pesanan);

        if (empty($detail_pesanan)){
            return redirect()->to('/history');
        }

        $data = [
            'title'             => 'Detail pemesanan ' . $detail_pesanan->id_transaksi,
            'detail_pesanan'    => $detail_pesanan,
            'role'              => $rolee,
        ];
        return view('user/historydetail', $data);
    }

    public function rate(){

        $this->mRating->save([
            'id_rating'         =>  $this->request->getVar('id_rating'),
            'nilai_rating'      =>  $this->request->getVar('ratein'),
            'komentar'          =>  $this->request->getVar('komentar'),
        ]); 

        return redirect()->to('/history');
    }

    public function uploadbuktibayar($id_transaksi){
        if(!$this->validate([
            'bukti_transfer'  => 'uploaded[bukti_transfer]|mime_in[bukti_transfer,image/jpg,image/JPG,image/jpeg,image/JPEG,image/gif,image/png,image/PNG]|max_size[bukti_transfer,4096]',
        ])) {
            return redirect()->to('/history');
        }

        $upload = $this->request->getFile('bukti_transfer');
        $upload->move('horizon/assets/img/buktitf');

        $this->mTransaksi->save([
            'id_transaksi'          =>  $id_transaksi,
            'status_transaksi'      =>  'proses',
            'bukti_transaksi'      	=>  $upload->getName()
        ]);    

        return redirect()->to('/history');
    }

   
}
