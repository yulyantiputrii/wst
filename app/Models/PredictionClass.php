<?php
// app/Models/PredictionClass.php

namespace App\Models;

class PredictionClass
{
    public $predictions;
    public $userIdRated;

    public function __construct($predictions, $userIdRated)
    {
        $this->predictions = $predictions;
        $this->userIdRated = $userIdRated;
    }

    // Metode lain yang relevan
}