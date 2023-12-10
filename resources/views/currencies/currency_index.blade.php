@extends('welcome')
@section('Currency', 'index')
@section('content')

<div class="container mt-5">

    <div class="mt-3">
        <a href="{{ route('currency.create') }}" class="btn btn-info">Add Currencies</a>
    </div>

    <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Symbol</th>
            <th scope="col">IS main</th>
            <th scope="col">Rate</th>
            <th scope="col">Status</th>
            <th scope="col">Active</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($currencies as $currency)

         <tr>
            <th scope="row">{{ $currency->id }}</th>
            <td>{{ $currency->title }}</td>
            <td>{{ $currency->symbol }}</td>
            <td>{{ $currency->is_main }}</td>
            <td>{{ $currency->rate }}</td>
            <td>{{ $currency->status }}</td>
            <td class="">
              <ul class="nav justify-content-end">

                <li class="nav-item">
                  <a class="nav-link" href="{{ route('products.show', $currency->id) }} "><i class="fa-solid fa-eye"></i></a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="{{ route('products.edit', $currency->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>

                </li>


                  <form action="{{ route('products.destroy', $currency->id) }}" method="POST">
                    {{ csrf_field() }}
                    @method('DELETE')
                    <button type="submit" class="btn"><i class="fa-solid fa-trash-can"></i></button>
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




