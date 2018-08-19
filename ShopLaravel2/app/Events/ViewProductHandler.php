<?php

namespace App\Events;

use App\Product;
use Illuminate\Session\Store;

class ViewProductHandler
{
    private $session;

    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    public function handle(Product $product)
    {
        if (!$this->isProductViewed($product)) {
            $product->increment('view_count');
            $this->storeProduct($product);
        }
    }

    private function isProductViewed($product)
    {
        $viewed = $this->session->get('viewed_products', []);

        return array_key_exists($product->id, $viewed);
    }

    private function storeProduct($product)
    {
        $key = 'viewed_products.' . $product->id;

        $this->session->put($key, time());
    }
}