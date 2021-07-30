<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // them sp vao gio hang
    public function add_to_cart($id){
        // tim san pham
        $product = Product::findOrFail($id);
        $cart = []; // mac dinh gio hang trong
        if(Session::has("cart")){
            $cart = Session::get("cart");
        }
        if(check_cart($cart,$product)){
            $product->cart_qty  = 1;

        }else{
            for($i=0;$i<count($cart);$i++){
                if($cart->id == $product->id){
                    $product->qty += 1;
                }
            }
        }
        return redirect()->back();
    }

    private function check_cart(Product $product,$cart){
        $cart = [];
        if(Session::has("cart")){
            $cart= Session::get("cart");
        }
        for ($i=0;$i<count($cart);$i++){
            if($cart->id == $product->id){
                $cart = $product;
            }
        }
    }

    public function cart(){
        $cart = [];
        if (Session::has("cart")){
            $cart = Session::get("cart");
        }
        return redirect()->back();
    }
}
