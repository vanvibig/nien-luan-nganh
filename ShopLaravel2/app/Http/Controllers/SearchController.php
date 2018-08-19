<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Response;

class SearchController extends Controller
{
    public function search(Request $req)
    {
        if (isset($req->search)) {
            $products = Product::where('name', 'like', '%' . $req->search . '%')->limit(2)->get();
            $output = "";
            if ($products) {
                foreach ($products as $product) {
                    $output .= '<li><a href="' . route('chitietsanpham', $product->id) . '">' .
                        $product->name
                        . '</a></li>';
                }
                return Response($output);
            }

        }
    }
}