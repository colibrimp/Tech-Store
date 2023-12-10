@extends('welcome')
@section('Product', 'index')
@section('content')

<div class="container mt-5">

    <div class="mt-3">
        <a href="{{ route('products.create') }}" class="btn btn-info">Add Products</a>
    </div>

    <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Image</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Currency</th>
            <th scope="col">Category_Id</th>
            <th scope="col">Status</th>
            <th scope="col">Active</th>
          </tr>
        </thead>
        <tbody>
  

            @foreach ($products as $product)
                @php
        
                  $image = '';
                  if (count($product->images) > 0){
                       $image = $product->images[0]['title'];
                  }else{
                      $image = 'no_image.png';
                 }
                @endphp
         <tr>
            <th scope="row">{{ $product->id }}</th>
            <td>{{ $product->title }}</td>
            <td>
                @if($product)
                <a href="{{route('products.show', $product->id)}}">
                  <img src="{{ asset('uploads/products/' . $image) }}" width="280px"
                height="245px" alt="Image">
              </a>
                @else
                    <span>No Image Found!</span>
                @endif
            </td>

            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->currency }}</td>
            <td>{{ $product->category->title }}</td>
            <td>{{ $product->status }}</td>
            <td class="d-flex">
               
                  <form action="{{ route('basket.store') }}" method="Post">
                    {{ csrf_field() }}
                    <button type="submit"><i class="fa-solid fa-basket-shopping"></i></button>
                </form>

                  <a class="nav-link" href="{{ route('products.show', $product->id) }} "><i class="fa-solid fa-eye"></i></a>

                  <a class="nav-link" href="{{ route('products.edit', $product->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>

                  <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    {{ csrf_field() }}
                    @method('DELETE')
                    <button type="submit" class="btn "><i class="fa-solid fa-trash-can"></i></button>
                </form>

            </td>
          </tr>

          @endforeach

        </tbody>
      </table>
   </div>

</div>

@endsection




