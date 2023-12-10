
@extends('welcome')

@section('Product', $product->title)


@section('content')


    <div class="row">
        <div class="col-lg-6 mx-auto">

  
            <form method="post" action="{{ route('products.update', $product->id) }}" class="mt-5"  enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PATCH')
                <div class="form-group">
                    <label for="post-title">Title</label>
                    <input type="text" name="title" class="form-control" id="post-title" value="{{ old('title', $product->title) }}" >
                </div>

                <div class="form-group">
                    @if('image' == 'image')
                    <label for="name-project" class="form-control">Download file</label>
                    <input id="name" type="file" name="image"  accept=".png, .jpg, .jpeg">
                    @endif
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" cols="30" rows="10" aria-label="With textarea" placeholder="text" >{{ old('description', $product->description)}}</textarea>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price" class="form-control" id="price" value="{{ old('price', $product->price) }}" >
                </div>


                <div class="form-group">
                    <label for="currency">Currency</label>
                    <input type="text" name="currency" class="form-control" id="currency" value="{{ old('currency', 'euro') }}" >
                </div>

                <label for="name" class="form-control">Select Category
                    <select name="category_id" class="form-control" style="width: 100%;">
                          <option selected="selected" disabled>Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                    @if($category->id == old('category_id', $product->category_id)) selected @endif>{{ $category->title }}</option>
                        @endforeach
                    </select>
                </label>

                <div class="form-group">
                    <label for="post-title">Status</label>
                    <input type="number" name="status" class="form-control" id="post-title" value="{{ old('status', 0) }}" >
                </div>



                <button type="submit" class="btn btn-success mt-3">
                        Edit Product
                    </button>

            </form>
        </div>
    </div>
@endsection

