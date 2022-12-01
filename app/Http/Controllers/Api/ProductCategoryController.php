<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCategoryRequest;
use App\Http\Resources\ProductCategoryResourceJson;

class ProductCategoryController extends Controller
{
    public function store(ProductCategoryRequest $request)
    {
        $productCategory = ProductCategory::create($request->validated());

        return ProductCategoryResourceJson::make(ProductCategory::find($productCategory->id));
    }

    public function update(ProductCategoryRequest $request)
    {
        throw_if(!ProductCategory::find($request->id), NoResourcesExeption::class);
        $productCategory = ProductCategory::find($request->id);
        $productCategory->update($request->validated());
        return ProductCategoryResourceJson::make(ProductCategory::find($productCategory->id));
    }

    public function destroy(Request $request)
    {
        throw_if(!ProductCategory::find($request->id), NoResourcesExeption::class);
        $productCategory = ProductCategory::find($request->id);
        $productCategory->delete();
        $code = 200;
        return response()->json(answerWithData('Resource deleted', $code), $code);
    }
}
