<?php

namespace App\Controllers;
use App\Models\M_Produk;
use App\Models\M_Kategori;
use App\Models\M_Rating;

class AdminProduk extends BaseController
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
        $produk     = $this->mProduk->getProdukKategori()->getResultArray();
        $data = [
            'title'     => 'Product',
            'produk'    =>  $produk
        ];
        return view('admin/produk', $data);
    }

    public function add()
    {
        session();
        $kategori = $this->mKategori->findAll();

        $data = [
            'title'         => 'Add Product',
            'kategori'      => $kategori,
            'validation'   => \Config\Services::validation()
        ];

        return view('admin/produktambah', $data);
    }
    
    public function save()
    { 
        session();
        if(!$this->validate([
            'sampul'  => 'uploaded[sampul]|mime_in[sampul,image/jpg,image/JPG,image/jpeg,image/JPEG,image/gif,image/png,image/PNG]|max_size[sampul,4096]',
        ])) {
            return redirect()->to('/produkadmin/add')->with('hapus', 'Data gagal ditambahkan, masukkan cover yang sesuai!');
        }

        $upload = $this->request->getFile('sampul');
        $upload->move('horizon/assets/img');

        $this->mProduk->save([
            'id_kategori'           =>  $this->request->getVar('id_kategori'),
            'nama_produk'           =>  $this->request->getVar('nama_produk'),
            'harga'                 =>  $this->request->getVar('harga'),
            'deskripsi_produk'      =>  $this->request->getVar('deskripsi_produk'),
            'maps' => $this->request->getPost('maps'),
            'sampul'            	=>  $upload->getName()
        ]);  


        return redirect()->to('/produkadmin')->with('berhasil', 'Data berhasil disimpan');
   
    }
    
    public function edit($id)
    {
        $kategori           = $this->mKategori->findAll();
        $produk             = $this->mProduk->where(['id_produk' => $id])->first();
        
        $data = [
            'title'     => 'Edit Product',
            'kategori'  => $kategori,
            'produk'    => $produk
        ];

        return view('admin/produkedit', $data);
    }

    public function update($id)
    { 

        $validation_foto = $this->validate([
            'sampul'  => 'uploaded[sampul]|mime_in[sampul,image/jpg,image/JPG,image/jpeg,image/JPEG,image/gif,image/png,image/PNG]|max_size[sampul,4096]',
        ]);

        if($validation_foto == FALSE){
            $this->mProduk->save([
                'id_produk'             =>  $id,
                'id_kategori'           =>  $this->request->getVar('id_kategori'),
                'nama_produk'           =>  $this->request->getVar('nama_produk'),
                'harga'                 =>  $this->request->getVar('harga'),
                'maps'                 =>  $this->request->getVar('maps'),
                'deskripsi_produk'      =>  $this->request->getVar('deskripsi_produk')
                
            ]); 
        } else{

            $upload = $this->request->getFile('sampul');
            $upload->move('horizon/assets/img');
    
            $this->mProduk->save([
                'id_produk'             =>  $id,
                'id_kategori'           =>  $this->request->getVar('id_kategori'),
                'nama_produk'           =>  $this->request->getVar('nama_produk'),
                'harga'                 =>  $this->request->getVar('harga'),
                'maps'                 =>  $this->request->getVar('maps'),
                'deskripsi_produk'      =>  $this->request->getVar('deskripsi_produk'),
                'sampul'            	=>  $upload->getName()
            ]);    
        }
        return redirect()->to('/produkadmin')->with('berhasil', 'Data berhasil di Edit');
        
    }

    public function delete($id){
        $this->mProduk->delete($id);
        return redirect()->to('produkadmin')->with('berhasil', 'Data berhasil dihapus');
    }

    public function detail($id)
{
    // Cari produk berdasarkan ID
    $produk = $this->mProduk->where(['id_produk' => $id])->first();

    // Jika produk tidak ditemukan, arahkan ke halaman produk admin
    if(!$produk) {
        return redirect()->to('/produkadmin')->with('error', 'Produk tidak ditemukan');
    }

    // Siapkan data untuk dikirim ke view
    $data = [
        'title' => 'Detail Produk',
        'produk' => $produk
    ];

    // Tampilkan view detail produk
    return view('user/detail_produk', $data);
}



}
