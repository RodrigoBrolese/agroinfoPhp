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
        $products = Product::where('user_id', Auth::user()->id)->orderBy('id')->get()->toArray();

        return response()->json(['products' => $products], 200);

    }

    public function store(Request $request) {

        $data = $this->validateRequest($request);

        $data['user_id'] = \Auth::user()->id;

        Product::insert($data);

        return response()->json(['message' => __('Cadastro realizado com sucesso')], 200);

    }

    public function show($id)
    {
        return response()->json(['product' => Product::whereUserId(Auth::user()->id)->findOrFail($id)]);
    }

    public function update($id, Request $request)
    {
        $data = $this->validateRequest($request);

        $product = Product::whereUserId(Auth::user()->id)->findOrFail($id);

        $product->update($data);

        return response()->json(['message' => __('Alteração realizado com sucesso')], 200);

    }

    public function delete($id)
    {
        $product = Product::whereUserId(Auth::user()->id)->findOrFail($id);

        try {
            $product->delete($id);
        } catch (\Exception $e) {
            return response()->json(['message' => __('Erro desconhecido')], 500);
        }

        return response()->json(['message' => __('Exclusão realizada com sucesso')], 200);

    }

    private function validateRequest(Request $request)
    {
        return $request->validate([
            'name' => ['required', 'max:255'],
            'hectare' => ['required', 'numeric', 'min:0'],
            'type' => ['required', 'max:100'],
        ]);
    }

}
