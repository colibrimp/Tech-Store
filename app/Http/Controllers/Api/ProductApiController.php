<?php

namespace App\Http\Controllers\Api;

use App\Helpers\MyConstant;
use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductApiController extends BaseResponseApiController
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return $this->sendResponse(ProductResource::collection($products), 'Product retrieved successfully.');

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
        return $this->sendResponse(new ProductResource($product), 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        if (is_null( $product ) ||  $product->status == MyConstant::FAIL_STATUS) {

            return $this->sendError(new ProductResource( $product ), 'Product not found, status false!');

        }elseif ( $product->status == MyConstant::SUCCESS_STATUS) {

            return $this->sendResponse(new ProductResource( $product ), 'Product retrieved successfully, status true!');
        }
          else{

           return null;
       }
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

        return  $this->sendResponse(new ProductResource($product), 'Product Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Storage::delete('upload/products' . $product->images);
        $product->delete();

        return  $this->sendResponse([], 'Product deleted successfully.');
    }
}
