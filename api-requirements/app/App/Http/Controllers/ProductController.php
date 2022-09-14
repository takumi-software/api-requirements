<?php

namespace CodeHappy\App\Http\Controllers;

use CodeHappy\App\Http\Resources\ProductResource;
use CodeHappy\Domain\Product\Actions\ListProduct;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductController extends Controller
{
    /**
     * List products
     *
     * @param ListProduct $action
     * @return JsonResource
     */
    public function __invoke(ListProduct $action): JsonResource
    {
        return ProductResource::collection($action->execute());
    }
}
