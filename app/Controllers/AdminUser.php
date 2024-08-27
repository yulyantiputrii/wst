<?php

namespace App\Controllers;

class AdminUser extends BaseController
{
    protected $db, $builder;

    public function __construct()
    {
        $this->db           = \Config\Database::connect();
        $this->builder      = $this->db->table('users');
    }

    public function index(){

        $this->builder->select('users.id as userid, username, email, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();

        $data = [
            'title' => 'User Admin',
            'users' => $query->getResult() //untuk mengambil data bertype objek
        ];

        return view('admin/useradmin', $data);
    }

    public function detail($id = 0){
        
        $this->builder->select('users.id as userid, username, email, fullname, country, city, instagram, phone_number, name, user_image, users.created_at as joined');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();

        $data = [
            'title' => 'User Admin',
            'user' => $query->getRow() //getRow untuk mengambil 1 baris data saja
        ];

        if(empty($data['user'])){
            return redirect()->to('/adminuser');
        }
        return view('admin/useradmindetail', $data);
    }


   
}
