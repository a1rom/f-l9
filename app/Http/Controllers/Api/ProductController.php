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
        throw_if(!Product::find($request->id), NoResourcesExeption::class);
        $product = Product::find($request->id);
        $product->update($request->validated());
        return ProductResourceJson::make(Product::find($product->id));
    }

    public function destroy(Request $request)
    {
        throw_if(!Product::find($request->id), NoResourcesExeption::class);
        $product = Product::find($request->id);
        $product->delete();
        $code = 200;
        return response()->json(answerWithData('Resource deleted', $code), $code);
    }
}
