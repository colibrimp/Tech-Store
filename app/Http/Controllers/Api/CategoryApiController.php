<?php

namespace App\Http\Controllers\Api;

use App\Helpers\MyConstant;
//подключаем контроллер с Helpers
use App\Http\Controllers\API\BaseResponseApiController as BaseResponseApiController;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;


class CategoryApiController extends BaseResponseApiController
{

    public function __construct()
    {
        $this->middleware('auth:api')->except([ 'show']);;
    }

    public function index()
    {
        $categories = Category::all();
        return $this->sendResponse(CategoryResource::collection($categories), 'Categories retrieved successfully.');

    }




    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->validated());

        $category->title = $request->title;
        $category->alias = $request->alias;
        $category->status = $request->status;
        $category->save();

        return $this->sendResponse(new CategoryResource($category), 'Category created successfully.');
    }



    public function show(string $id)
    {
        $category = Category::findOrFail($id);

        if (is_null($category) || $category->status == MyConstant::FAIL_STATUS) {

            return $this->sendError(new CategoryResource($category), 'Category not found, status false!');

        }elseif ( $category->status == MyConstant::SUCCESS_STATUS) {

            return $this->sendResponse(new CategoryResource($category), 'Category retrieved successfully, status true!');
        }


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->title = $request->title;
        $category->alias = $request->alias;
        $category->status = $request->status;
        $category->save();

        return $this->sendResponse(new CategoryResource($category), 'Category created successfully.');
    }


    public function destroy(Category $category)
    {

        $category->delete();

        return  $this->sendResponse([], 'Category deleted successfully.');
    }


}
