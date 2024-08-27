<?php

namespace App\Controllers;

class AdminHome extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Admin'
        ];

        return view('admin/home', $data);
    }

   
}
