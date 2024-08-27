<?php
namespace App\Tests;

use CodeIgniter\Test\CIUnitTestCase;
use App\Controllers\Collaborative2;

class Collaborative2Test extends CIUnitTestCase
{
    public function testSimilarity()
    {
        $controller = new Collaborative2(1);
        $similarity = $controller->similarity(1, 2);

        $this->assertIsObject($similarity);
        $this->assertObjectHasAttribute('similarity', $similarity);
        // tambahkan assertions lain untuk memeriksa nilai spesifik
    }

    // Tambahkan test untuk metode lain
}
