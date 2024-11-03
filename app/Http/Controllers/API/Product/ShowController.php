<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Product $product)
    {
        return new ProductResource($product);
    }
}
