<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetProductsController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::paginate($this->validatePaginate($request));
        return response()->json([
            'products' => $products,
        ]);
    }

    private function validatePaginate(Request $request) : int
    {
        $paginate = $request->header('paginate') ?: 10;
        if (!is_int($paginate) || $paginate < 1 || $paginate > 100) {
            $paginate = 10;
        }
        return $paginate;
    }
}
