@extends('welcome')
@section('Category', 'index')
@section('content')

<div class="container mt-5">

    <div class="mt-3">
        <a href="{{ route('category.create') }}" class="btn btn-info">Add Category</a>
    </div>

    <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Alias</th>
            <th scope="col">Status</th>
            <th scope="col">Active</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($categories as $category)

         <tr>
            <th scope="row">{{ $category->id }}</th>
            <td>{{ $category->title }}</td>
            <td>{{ $category->alias }}</td>
            <td>{{ $category->status }}</td>
            <td class="">
              <ul class="nav justify-content-end">

                <li class="nav-item">
                  <a class="nav-link" href="{{ route('category.show', $category->id) }} "><i class="fa-solid fa-eye"></i></a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="{{ route('category.edit', $category->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>

                </li>


                  <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                    {{ csrf_field() }}
                    @method('DELETE')
                    <button type="submit" class="btn "><i class="fa-solid fa-trash-can"></i></button>
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




