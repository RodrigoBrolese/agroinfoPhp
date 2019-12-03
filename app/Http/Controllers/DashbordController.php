<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class DashbordController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = new Product();

        $product->user_id = 4;
        $product->name = 4;
        $product->type = 4;
        $product->save();
        $product->save();
    }
}
