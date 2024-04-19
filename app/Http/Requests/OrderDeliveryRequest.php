<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderDeliveryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // TODO: add authorization for delivery's status modification
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "order_name" => "required",
            "order_weight" => "required",
            "current_location" => "required",
            "client_name" => "required",
            "phone" => "required|regex:/7\d{10}/",
            "email" => "required",
        ];
    }
}
