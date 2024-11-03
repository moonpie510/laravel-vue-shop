<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\Group;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function create()
    {
        $tags = Tag::all();
        $colors = Color::all();
        $categories = Category::all();
        $groups = Group::all();
        return view('product.create', compact('tags', 'colors', 'categories', 'groups'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);

        $tagsIds = $data['tags'];
        $colorsIds = $data['colors'];
        unset($data['tags'], $data['colors']);

        $product = Product::firstOrCreate($data);
        $product->tags()->attach($tagsIds);
        $product->colors()->attach($colorsIds);

        return redirect()->route('product.index');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $colors = Color::all();
        $groups = Group::all();
        return view('product.edit', compact('product', 'categories', 'tags', 'colors', 'groups'));
    }

    public function update(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        if(!is_null($data['preview_image'])){
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $product->update(['preview_image' => $data['preview_image']]);
            unset($data['preview_image']);
        }

        $tagsIds = $data['tags'];
        $colorsIds = $data['colors'];
        unset($data['tags'], $data['colors']);

        $product->update($data);
        $product->tags()->sync($tagsIds);
        $product->colors()->sync($colorsIds);

        return view('product.show', compact('product'));
    }

    public function delete(Product $product)
    {
        $product->tags()->detach();
        $product->colors()->detach();
        $product->delete();
        return redirect()->route('product.index');
    }
}
