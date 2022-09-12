<?php

namespace App\http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return ProductResource::collection($products)->additional(['status'=> true, 'message' => 'Products retrieved.']);
    }
}
