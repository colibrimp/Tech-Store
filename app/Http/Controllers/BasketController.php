<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Basket;
use App\Models\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
        // $baskets = Basket::all();
        return view('baskets.basket_index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $images = Image::all();
        $categories = Category::all();
        $product = Product::all();
        return view('products.product_create', compact('product', 'categories', 'images'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->currency = $request->currency;
        $product->category_id = $request->category_id;
        $product->status = $request->status;


        Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_id' => 'nullable',
            'status'  => 'nullable',
        ]);


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/products/', $filename);
            $product->images->title = $filename;
        }

        $product->save();

            Image::create(
                [
                    'title' => $filename,
                    'status' => true,
                    'product_id' => $product->id

                ]
            );


        return  redirect('basket');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::all();
        $product = Product::findOrFail($id);
        return view('products.product_show', compact('product', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('products.product_edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->currency = $request->currency;
        $product->category_id = $request->category_id;
        $product->status = $request->status;


        Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_id' => 'nullable',
            'status'  => 'nullable',
        ]);


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/products/', $filename);
            $product->images->title = $filename;
        }

        $product->save();

        Image::create(
            [
                'title' => $filename,
                'status' => true,
                'product_id' => $product->id

            ]
        );


        return  redirect('products');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return  redirect('products');
    }
}
