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
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
       
    }
}
