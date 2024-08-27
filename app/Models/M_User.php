<?php

namespace App\Models;

use CodeIgniter\Model;

class M_User extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $allowedFields = [
        'id',
        'email',
        'username',
        'fullname',
        'birthday',
        'phone_number',
        'instagram',
        'country',
        'city',
        'user_image',
        'password_hash'
    ];
    protected $usernameExcludes = ['admin'];

    public function getUserPredictions()
    {
        $ratingUser = new M_Rating();
        $ratingUser = $ratingUser->select('id')
            ->distinct('id')
            ->get()
            ->getResultArray();

        foreach ($ratingUser as $key => $value) {
            $id_users[$key] = $value['id'];
        }

        return $this->whereNotIn('username', $this->usernameExcludes)
            ->whereIn('id', $id_users)
            ->findAll();
    }

    public function getIsRated($userIdLogged)
    {
        return (new M_Rating)->select('id')
            ->where('id', $userIdLogged)
            ->findAll();
    }
}
