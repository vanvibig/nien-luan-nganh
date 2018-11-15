<?php

namespace App;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id)
    {


        $priceAfterReducePromotion = 0;

        if (isset($item->promotion)) {
            $priceAfterReducePromotion = $item->unit_price;
        }

        foreach ($item->promotion as $prom) {
            if ($prom->status == 1 && \Carbon\Carbon::today() >= $prom->start && \Carbon\Carbon::today() <= $prom->end) {
                $priceAfterReducePromotion = $item->unit_price * (1 - $prom->discount / 100);
            }
        }

        $giohang = ['qty' => 0, 'price' => $priceAfterReducePromotion, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $giohang = $this->items[$id];
            }
        }
        $giohang['qty']++;
        $giohang['price'] = $priceAfterReducePromotion * $giohang['qty'];
        $this->items[$id] = $giohang;
        $this->totalQty++;
        $this->totalPrice += $priceAfterReducePromotion;
    }

    //xóa 1
    public function reduceByOne($id)
    {
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];
        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
    }

    //xóa nhiều
    public function removeItem($id)
    {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }
}
