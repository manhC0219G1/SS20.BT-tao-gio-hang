<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    public function index(){
        $carts = Session::get('cart');

        return view('carts.list',compact('carts'));
    }
    public function add($productId){
        $product = Product::findOrFail($productId);
        if(Session::has('cart')){
            $oldCart = Session::get('cart');
        }else{
            $oldCart = null;
        }
        $carts = new Cart($oldCart);
        $carts->add($product, $productId);
        Session::put('cart',$carts);
        Session::flash('success', 'add item complete');
        return redirect()->route('products.index');
    }
    public function removeItem($product_id)
    {
        $cart = Session::get('cart');
        $item = $cart->items[$product_id];
        $cart->totalQty -= $item['qty'];
        $cart->totalPrice -= $item['price'];
        unset($cart->items[$product_id]);
        Session::put('cart', $cart);
//        if (!$cart->items) {
//            Session::forget('cart');
//        }
        Session::flash('success', 'Remove item complete');
        return redirect()->route('carts.list');
    }
    public function update(Request $request, $product_id)
    {
        $newQty = $request->quantity;
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $cart->update($newQty, $product_id);
        Session::put('cart', $cart);
        Session::flash('success', 'Update success');
        return redirect()->route('carts.list');
    }
}
