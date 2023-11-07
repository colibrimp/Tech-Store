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
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Currency</th>
            <th scope="col">Category Id</th>
            <th scope="col">Status</th>
            <th scope="col">Active</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($products as $product)

         <tr>
            <th scope="row">{{ $product->id }}</th>
            <td>{{ $product->title }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->currency }}</td>
            <td>{{ $product->category->title }}</td>
            <td>{{ $product->status }}</td>
            <td class="">
              <ul class="nav justify-content-end">

                <li class="nav-item">
                  <a class="nav-link" href="{{ route('products.show', $product->id) }} "><i class="fa-solid fa-eye"></i></a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="{{ route('products.edit', $product->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>

                </li>


                  <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    {{ csrf_field() }}
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                </form>

              </ul>
            </td>
          </tr>

          @endforeach

        </tbody>
      </table>
   </div>

</div>

@endsection




