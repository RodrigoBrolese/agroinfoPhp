<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = new Product();

        $response = [
            'products' => $products->get(),
        ];

        return view('products.index', $response);
    }
}
