<?php

namespace App\Controllers;

use App\Models\RatingModel;

class RatingController extends BaseController
{
    public function add()
    {
        $ratingModel = new RatingModel();
        $data = [
            'id_produk' => $this->request->getPost('id_produk'),
            'id' => $this->request->getPost('id'),
            'nilai_rating' => $this->request->getPost('nilai_rating'),
            'komentar' => $this->request->getPost('komentar'),
            'created_rating' => date('Y-m-d H:i:s'),
        ];

        $ratingModel->insert($data);
        return redirect()->back()->with('message', 'Komentar dan rating berhasil ditambahkan!');
    }
}
