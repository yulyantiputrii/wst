<?php

namespace App\Controllers;
use App\Models\M_User;
use PhpParser\Node\Expr\AssignOp\Mul;

class Profile extends BaseController
{
    public $home, $mUsers;

    public function __construct()
    {
        $this->home      = new Home();
        $this->mUsers      = new M_User();
    }

    public function index()
    {
        $iduser = user()->id ?? null;

        $role = $this->home->cekrole($iduser); //mengambil role dari function cekrole di class home
        $rolee = $role->role;

        $data = [
            'title'     => 'Profile',
            'role'      => $rolee
        ];

        return view('user/Profile', $data);
    }

    public function update($id){
        session();

        // $iduser = user()->id;

        // $users = new \Myth\Auth\Models\UserModel();

        // if(!$this->validate([
        //     'sampul'  => 'uploaded[sampul]|mime_in[sampul,image/jpg,image/JPG,image/jpeg,image/JPEG,image/gif,image/png,image/PNG]|max_size[sampul,4096]',
        // ])) {
        //     return redirect()->to('/Profile')->with('hapus', 'Data gagal ditambahkan, masukkan cover yang sesuai!');
        // }

        // $upload = $this->request->getFile('sampul');
        // $upload->move('horizon/assets/img');

        $this->mUsers->save([
            'id'                =>  $id,
            'fullname'          =>  $this->request->getVar('fullname'),
            'birthday'          =>  $this->request->getVar('birthday'),
            'phone_number'      =>  $this->request->getVar('phone_number'),
            'instagram'         =>  $this->request->getVar('instagram'),
            'country'           =>  $this->request->getVar('country'),
            'city'              =>  $this->request->getVar('city'),
            // 'sampul'            =>  $upload->getName()
        ]);    

        return redirect()->to('/profile')->with('berhasil', 'Data berhasil di Edit');
    }

}
