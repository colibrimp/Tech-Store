@extends('welcome')

@section('Category', $category->title)


@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <h3>{{ $category->title }}</h3>
                <p>{{ $category->alias }}</p>
                <p>{{ $category->status }}</p>
            </div>
        </div>
    </div>

@endsection

