<?php

namespace App\Providers;

use App\News;
use App\Type_detail;
use Illuminate\Support\ServiceProvider;
use App\Type_product;
use App\Cart;
use Session;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * add data for header menu
         */
        view()->composer('header', function ($view) {
            $loai_sp = Type_product::all();

            $loai_chitiet = Type_detail::all();
            $view->with([
                'loai_chitiet' => $loai_chitiet
            ]);
        });

        view()->composer('header', function ($view) {
            if (Session('cart')) {
                $old_Cart = Session::get('cart');
                $cart = new Cart($old_Cart);
                $view->with([
                    'cart' => Session::get('cart'),
                    'product_cart' => $cart->items,
                    'totalPrice' => $cart->totalPrice,
                    'totalQty' => $cart->totalQty,
                ]);
            }
        });

        view()->composer('page.dat_hang', function ($view) {
            if (Session('cart')) {
                $old_Cart = Session::get('cart');
                $cart = new Cart($old_Cart);
                $view->with([
                    'cart' => Session::get('cart'),
                    'product_cart' => $cart->items,
                    'totalPrice' => $cart->totalPrice,
                    'totalQty' => $cart->totalQty,
                ]);
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
