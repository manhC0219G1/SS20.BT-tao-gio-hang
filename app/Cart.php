<?php


namespace App;


use Illuminate\Support\Facades\Session;

class Cart
{
    public $items=null;
    public $totalPrice=0;
    public $totalQty =0;
    public function __construct($oldCart)
    {
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalQty = $oldCart->totalQty;
        }
    }
    public function add($product,$product_id){
        $storeNewItem = ['qty'=>0,'price'=>$product->price,'item'=>$product];
        if($this->items){
            if(array_key_exists($product_id,$this->items)){
                $storeNewItem = $this->items[$product_id];

            }
        }
        $storeNewItem['qty']++;
        $storeNewItem['price'] = $storeNewItem['qty'] * $product->price;
        $this->items[$product_id] = $storeNewItem;
        $this->totalQty++;
        $this->totalPrice += $product->price;
    }
    public function update($newQty,$product_id){
        $product = Product::find($product_id);
        $oldCart = Session::get('cart');
        $oldItem = $oldCart->items[$product_id];
        $itemUpdate = $this->items[$product_id];
        $itemUpdate['qty'] = $newQty;
        $itemUpdate['price'] = $newQty * $product->price;
        $this->items[$product_id] = $itemUpdate;
        $this->totalPrice = $this->totalPrice -$oldItem['price']+ $itemUpdate['price'];
        $this->totalQty = $this->totalQty - $oldItem['qty'] + $itemUpdate['qty'];
    }

}