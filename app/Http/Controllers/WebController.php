<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\City;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use mysql_xdevapi\Table;

class WebController extends Controller
{
    public function home(){
        return view("home");
    }

    public function aboutUs()
    {
        return view("about-us");
    }

//    public function home()
//    {
//        return view("ass5/home");
//    }

//
//    // them sp vao gio hang
    public function add_to_cart($id)
    {
        // tim sp
        $product = Product::findOrFail($id);
        // cho sp vao gio hang - session
        $cart = []; // mac dinh ban dau la chua co sp nao
        if (Session::has("cart")) {
            $cart = Session::get("cart");
        }
        // kiem tra xem gio hang da co sp nay chua
        if (!$this->checkCart($cart, $product)) { // neu sp chua co trong gio hang
            $product->cart_qty = 1;// them 1 thuoc tinh cart_qty
            $cart[] = $product; // nap vao gio hang
        } else {
            for ($i = 0; $i < count($cart); $i++) {
                if ($cart[$i]->id == $product->id) {
                    $cart[$i]->cart_qty += 1;
                    break;
                }
            }
        }
        // gan tra lai cart vao session
        Session::put("cart", $cart);
        return redirect()->back();

    }

    // tim kiem san pham co trong array ko
    private function checkCart(array $cart, Product $p)
    {
        foreach ($cart as $item) {
            if ($item->id == $p->id)
                return true;
        }
        return false;
    }
    public function cart()
    {
        $cart = [];
       if(Session::get("cart"));
            $cart = Session::get("cart");
        return view("cart.cart", ["cart" => $cart]);
    }

    public function check_out()
    {
        if(!Session::has("cart")){
            return redirect()->to("/cart"); // chuyen huong ve trang gio hang khi ko co sp
        }
        $cart = Session::get("cart");
        $grandTotal = 0;
        foreach ($cart as $item){
            $grandTotal += $item->cart_qty * $item->price;
        }
        return view("cart.checkout",["cart"=>$cart,"grandTotal"=>$grandTotal]);
    }
    public function create_order(Request  $request){
        if(!Session::has("cart")){
            return redirect()->to("/cart"); // chuyen huong ve trang gio hang khi ko co sp
        }
        $cart = Session::get("cart");
        $request->validate([
            "customer_name" => "required",
            "customer_tel" => "required",
            "customer_address" => "required",
        ]);

        try{
            // tao don hang
            $grandTotal = 0;
            foreach ($cart as $item){
                $grandTotal += $item->cart_qty * $item->price;
            }
            $order = Order::create([
                "customer_name" => $request->get("customer_name"),
                "customer_tel" => $request->get("customer_tel"),
                 "customer_address" => $request->get("customer_address"),
                 "city" => $request->get("city"),
                 "shipping_fee" => $request->get("shipping_fee"),
                 "grand_total" => $request->get("grand_total"),

            ]);
                foreach($cart as $item){
                    DB::table("orders_item")->insert([
                        "order_id"=>$order->id,
                        "product_id"=>$item->id,
                        "qty"=>$item->cart_qty,
                        "price"=>$item->price
                    ]);
                    // giam so luong san pham
                    Product::where("id",$item->id)->decrement("qty",$item->cart_qty);
                }

                // xoa gio hang
                Session::forget("cart"); // Session::put("cart",null)

        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("orderSuccess");
    }


    public function update_qty($id,Request $request){
        if(Session::has("cart")){
            $cart = Session::get("cart");
            for($i=0;$i<count($cart);$i++){
                if($cart[$i].$id == $id){
                    $cart[$i]->cart_qty = $request->get("cart_qty"); // lay input cua form //
                    // cap nhat so luong sp trong gio hang
                    if($cart[$i]->cart_qty == 0){
                        unset($cart[$i]);// xoa sp trong gio hang neu sl =0
                    }
                    break;
                }
            }
            Session::put("cart",$cart);
        }
        return redirect()->back();
    }
// xoa 1 sp trong gio hang
    public function remove_item($id){
        if(Session::has("cart")){
            $cart = Session::get("cart");
            for($i=0;$i<count($cart);$i++){
                if($cart[$i]->id == $id){
                        unset($cart[$i]);// xoa sp trong gio hang neu sl =0
                    break;
                }
            }
            Session::put("cart",$cart);
        }
        return redirect()->back();
    }
    // xoa toan bo gio hang
    public function clear_cart(){
        Session::forget("cart");
        return redirect()->back();
    }


    public function all_product(){
        $products = Product::limit(10)->get();
        return response();
    }
}
