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
        $productCategory = ProductCategory::find($request->id);
        if ($productCategory) {
            $productCategory->update($request->validated());

            return ProductCategoryResourceJson::make(ProductCategory::find($productCategory->id));
        }
        $code = 404;
        return response()->json(answerWithData('Resource not found', $code), $code);
    }

    public function destroy(Request $request)
    {
        $productCategory = ProductCategory::find($request->id);
        if ($productCategory) {
            $productCategory->delete();
            $code = 200;
            return response()->json(answerWithData('Resource deleted', $code), $code);
        }
        $code = 404;
        return response()->json(answerWithData('Resource not found', $code), $code);
    }
}
