<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductsResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index(Request $request)
    {

        $products = Product::query()
            ->when($request->has('category'), function($query) {
                $query->where('category', request('category'));
            })
            ->when($request->has('price'), function($query) {
                $query->where('price', '>=', request('price'));
            })
            ->get();


        return ProductsResource::collection($products);

    }
}
