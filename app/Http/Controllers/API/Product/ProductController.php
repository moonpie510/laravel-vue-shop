<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\API\IndexRequest;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Http\Resources\Product\IndexProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(IndexRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);

        $products = Product::filter($filter)->get();
        return IndexProductResource::collection($products);
    }

    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Category::firstOrCreate($data);
        return redirect()->route('category.index')->with('success', 'Category created successfully');
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);
        return view('category.show', compact('category'));
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }
}
