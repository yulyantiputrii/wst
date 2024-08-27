<?php

namespace App\Models;

use CodeIgniter\Model;

class RatingModel extends Model
{
    protected $table = 'rating';
    protected $primaryKey = 'id_rating';

    protected $allowedFields = ['id_produk', 'id', 'nilai_rating', 'komentar', 'created_rating', 'updated_rating'];
}
