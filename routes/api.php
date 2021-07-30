<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("customers",function (){
    $customers = Customer::with("Appointment")->get();
    return $customers;
});

Route::get("customers/{customer_id}",function ($customer_id){
    $customer = Customer::findOrFail($customer_id);
    return $customer;
});

Route::put("customer/{customer_id",function (Request $request,$customer_id){
    $customer = Customer::findOrFail($customer_id);
    $customer->update([
        "customer_name"=>$request->customer_name,
        "customer_email"=>$request->customer_email,
        "customer_phone"=>$request->customer_phone,
        "customer_address"=>$request->customer_address
    ]);
    return $customer;
});