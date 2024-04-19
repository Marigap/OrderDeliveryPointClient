<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteDeliveryRequest;
use App\Http\Requests\OrderDeliveryRequest;
use App\Http\Requests\UpdateDeliveryStatusRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class OrderDeliveriesController extends Controller
{

    public function getAllDeliveries()
    {
        $response = Http::get('http://localhost:8000/api/v1/order-deliveries');
        return view('modify-delivery', ['deliveries' => $response->json()]);
    }

    // TODO: rename to AddDeliveryRequest
    public function addDelivery(OrderDeliveryRequest $request)
    {
        return Http::post("http://localhost:8000/api/v1/order-deliveries", [
            'client_info' => [
                'client_name' => $request->client_name,
                'phone' => $request->phone,
                'email' => $request->email,
            ],
            'order_info' => [
                'order_name' => $request->order_name,
                'order_weight' => $request->order_weight,
            ],
            'current_location' => $request->current_location,
            'need_notify' => $request->need_notify,
        ]);
    }

    public function updateDeliveryStatus(UpdateDeliveryStatusRequest $request)
    {
        $apiUrl = "http://localhost:8000/api/v1/order-deliveries/" . $request->delivery_id;
        return Http::put($apiUrl, [
            "status" => $request->status,
            "current_location" => $request->current_location
        ]);
    }

    public function deleteDelivery(DeleteDeliveryRequest $request)
    {
        $apiUrl = "http://localhost:8000/api/v1/order-deliveries/" . $request->delivery_id;
        return Http::delete($apiUrl, []);
    }

}
