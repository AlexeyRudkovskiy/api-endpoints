<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductsCollection;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::query()->latest()->cursorPaginate();

        return ProductsCollection::collection($products);
    }

    public function show(Product $product)
    {
        return ProductResource::make($product);
    }
}
