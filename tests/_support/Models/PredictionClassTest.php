<?php
// tests/Models/PredictionClassTest.php

namespace Tests\Models;

use App\Models\PredictionClass;
use PHPUnit\Framework\TestCase;

class PredictionClassTest extends TestCase
{
    public function testPredictionData()
    {
        // Siapkan data dummy untuk pengujian
        $predictions = (object) [
            'users' => [
                (object) ['id' => 1, 'name' => 'User1'],
                (object) ['id' => 2, 'name' => 'User2']
            ],
            'predictions' => [
                [
                    'product' => (object) ['name' => 'Product1'],
                    'users' => [
                        ['user' => (object) ['id' => 1], 'prediction' => (object) ['prediction' => 4.5]],
                        ['user' => (object) ['id' => 2], 'prediction' => (object) ['prediction' => 3.2]],
                    ]
                ]
            ]
        ];

        $predictionClass = new PredictionClass($predictions, 1);

        // Uji jika data sudah sesuai dengan yang diharapkan
        $this->assertEquals(1, $predictionClass->userIdRated);
        $this->assertCount(2, $predictionClass->predictions->users);
        $this->assertEquals('Product1', $predictionClass->predictions->predictions[0]['product']->name);
    }
}
