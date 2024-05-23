<?php

namespace Tests\Feature;

use App\Http\Controllers\OrderDeliveriesController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class DeliveriesApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_deliveries()
    {
        // check status change notification handling
        Http::partialMock()->shouldReceive('get')->once()->andReturn();
        $response = $this->get('/get-all-deliveries');
    }

    public function test_update_delivery_status()
    {
        // check status change notification handling
        Http::partialMock()->shouldReceive('put')->once();
        $deliveryStatusUpdate = [
            'delivery_id' => 1,
            'status' => 'processing',
            'current_location' => 'Zelik'
        ];
        $response = $this->put('/update-delivery-status', $deliveryStatusUpdate);
    }

    public function test_delete_delivery()
    {
        // check status change notification handling
        Http::partialMock()->shouldReceive('delete')->once();
        $deliveryIdToDelete = ['delivery_id' => 1];
        $response = $this->delete('/delete-delivery', $deliveryIdToDelete);
    }

    public function test_add_delivery()
    {
        Http::partialMock()->shouldReceive('post')->once();
        $newDelivery = [
            "order_name" => "My own order",
            "order_weight" => 11,
            "current_location" => "Moscow",
            "client_name" => "Anton",
            "phone" => "79000001012",
            "email" => "my-mail123@mail.ru",
        ];
        $response = $this->post('/add-delivery', $newDelivery);
    }

    public function test_all_deliveries_text_area_update()
    {
        Http::partialMock()->shouldReceive('get')->once()->andReturn();
        $response = $this->get('/get-all-deliveries');
        $data = $response->json();

        echo $response->getContent();

        // Проверяем, что данные записываются в textarea
        //$this->visit('/modify-delivery')
        //    ->seeInElement('#all-deliveries-text-area', $data['text']);
    }
}
