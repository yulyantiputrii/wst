<?php

namespace App\Controllers;
use App\Models\M_Kategori;

class AdminKategori extends BaseController
{
    protected $mKategori;

    public function __construct()
    {
        $this->mKategori    = new M_Kategori();
    }

    public function index()
    {
        $data = [
            'title'     => 'Kategori',
            'kategori'  =>  $this->mKategori->findAll(),
        ];
        return view('admin/kategori', $data);
    }

    public function detail($id)
    {
        $kategori = $this->mKategori->where(['id_kategori' => $id])->first();
        $data = [
            'title'     => 'Detail Kategori',
            'kategori'  =>  $kategori
        ];
        return view('admin/kategoridetail', $data);
    }

    
    
    public function add()
    {
        $data = [
            'title'     => 'Add Data',
        ];
        return view('admin/kategoritambah', $data);
    }

    public function save()
    {
        $this->mKategori->save([
            'nama_kategori'         =>  $this->request->getVar('nama_kategori'),
            'induk_kategori'        =>  $this->request->getVar('induk_kategori'),
            'deskripsi_kategori'    =>  $this->request->getVar('deskripsi_kategori')
        ]);    
        return redirect()->to('/kategoriadmin');
    }

    public function edit($id)
    {
        $kategori = $this->mKategori->where(['id_kategori' => $id])->first();

        $data = [
            'title'     => 'Detail Kategori',
            'kategori'  =>  $kategori
        ];
        return view('admin/kategoridetail', $data);
    }

    public function update($id)
    {

        $this->mKategori->save([
            'id_kategori'           =>  $id,
            'nama_kategori'         =>  $this->request->getVar('nama_kategori'),
            'induk_kategori'        =>  $this->request->getVar('induk_kategori'),
            'deskripsi_kategori'    =>  $this->request->getVar('deskripsi_kategori')
        ]);    

        return redirect()->to('/kategoriadmin')->with('berhasil', 'Data berhasil di Edit');
    }

    public function delete($id){
        $this->mKategori->delete($id);
        return redirect()->to('kategoriadmin');
    }


   
}
