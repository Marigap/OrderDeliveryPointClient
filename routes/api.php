<?php

use App\Http\Controllers\OrderDeliveriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/get-all-deliveries', [OrderDeliveriesController::class, 'getAllDeliveries']);
Route::post('/add-delivery', [OrderDeliveriesController::class, 'addDelivery']);
// TODO: add dynamic id param to URI (/modify-delivery/{delivery_id})
Route::put('/update-delivery-status', [OrderDeliveriesController::class, 'updateDeliveryStatus']);
Route::delete('/delete-delivery', [OrderDeliveriesController::class, 'deleteDelivery']);
