<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function index()
    {

        $tableHeaders = json_encode(
            [
                ['text' => __('Nome'), 'value' => 'name',],
                ['text' => __('Hectare'), 'value' => 'hectare',],
                ['text' => __('Tipo'), 'value' => 'type',],
                ['text' => __('Ações'), 'value' => 'action',],
            ]
        );

        $response = [
            'tableHeaders' => $tableHeaders,
        ];

        return view('products.index', $response);
    }

    public function get(Request $request)
    {
        $products = Product::where('user_id', Auth::user()->id)->get()->toArray();

        return response()->json(['products' => $products], 200);

    }

    public function store(Request $request) {

        $data = $request->validate([
            'name' => ['required', 'max:255'],
            'hectare' => ['required', 'numeric', 'min:0'],
            'type' => ['required', 'max:100'],
        ]);

        $data['user_id'] = \Auth::user()->id;

        Product::insert($data);

        return response()->json(['message' => __('Cadastro realizado com sucesso')], 200);

    }

}
