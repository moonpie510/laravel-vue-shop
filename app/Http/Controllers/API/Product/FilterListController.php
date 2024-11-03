<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Category;
use App\Models\Color;
use App\Models\Group;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class FilterListController extends Controller
{
    public function __invoke(Product $product)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $colors = Color::all();

        $maxPrice = Product::query()->max('price');
        $minPrice = Product::query()->min('price');

        return response()->json([
            'categories' => $categories,
            'colors' => $colors,
            'tags' => $tags,
            'price' => [
                'max' => $maxPrice,
                'min' => $minPrice
            ]
        ]);
    }
}
