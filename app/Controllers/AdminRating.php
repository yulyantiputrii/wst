<?php

namespace App\Controllers;
use App\Models\M_Produk;
use App\Models\M_Kategori;
use App\Models\M_Rating;

class AdminRating extends BaseController
{

    protected $mProduk, $mKategori, $mRating;

    public function __construct()
    {
        $this->mProduk      = new M_Produk();
        $this->mKategori    = new M_Kategori();
        $this->mRating      = new M_Rating();
    }

    public function index()
    {
        $produk        = $this->mProduk->getProdukKategori()->getResultArray();
        $allRating     = $this->mRating->getRatingInfo()->getResultArray();
       
       
        $data = [
            'title'     => 'Rating ',
            'produk'    =>  $produk,
            'rating'    =>  $allRating
        ];
        return view('admin/rating', $data);
    }

    public function delete($id){
        $this->mRating->delete($id);
        return redirect()->to('ratingadmin')->with('berhasil', 'Rating berhasil dihapus');
    }


}
