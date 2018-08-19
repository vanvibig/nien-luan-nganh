<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Session\Store;

class Filter
{
    private $session;

    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $products = $this->getViewedProducts();

        if (!is_null($products))
        {
            $products = $this->cleanExpiredViews($products);
            $this->storeProducts($products);
        }

        return $next($request);
    }

    private function getViewedProducts()
    {
        return $this->session->get('viewed_products', null);
    }

    private function cleanExpiredViews($products)
    {
        $time = time();

        // 5 phút kể từ lần view trước đó mới được tính
        $throttleTime = 300;

        return array_filter($products, function ($timestamp) use ($time, $throttleTime)
        {
            return ($timestamp + $throttleTime) > $time;
        });
    }

    private function storeProducts($products)
    {
        $this->session->put('viewed_products', $products);
    }
}
