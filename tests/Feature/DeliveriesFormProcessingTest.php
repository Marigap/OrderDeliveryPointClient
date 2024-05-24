<?php

namespace Tests\Feature;

use App\Http\Controllers\OrderDeliveriesController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Tests\TestCase;

class DeliveriesFormProcessingTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $mockController = Mockery::mock(OrderDeliveriesController::class);
        $mockController->shouldReceive('getAllDeliveries')->once();



        $this->get('/modify-delivery')->submitForm('getAllDeliveries');
    }
}
