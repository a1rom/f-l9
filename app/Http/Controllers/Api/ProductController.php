<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResourceJson;

class ProductController extends Controller
{
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->validated());

        return ProductResourceJson::make(Product::find($product->id));
    }

    public function update(ProductRequest $request)
    {
        $product = Product::find($request->id);
        if ($product) {
            $product->update($request->validated());

            return ProductResourceJson::make(Product::find($product->id));
        }
        $code = 404;
        return response()->json(answerWithData('Resource not found', $code), $code);
    }

    public function destroy(Request $request)
    {
        $product = Product::find($request->id);
        if ($product) {
            $product->delete();
            $code = 200;
            return response()->json(answerWithData('Resource deleted', $code), $code);
        }
        $code = 404;
        return response()->json(answerWithData('Resource not found', $code), $code);
    }
}
