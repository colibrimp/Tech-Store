@extends('welcome')

@section('Product', $product->title)


@section('content')


    @php
        
        $image = '';
        if (count($product->images) > 0) {
            $image = $product->images[0]['title'];
        } else {
            $image = 'no_image.png';
        }
    @endphp

    <div class="container">
        <div class="card mt-5 ">
            <div class="card-body">
                <h3>{{ $product->title }}</h3>

                <div class="mt-5 d-flex justify-content-center">
                    @if ($product)
                        <a href="{{ route('products.show', $product->id) }}">
                            <img src="{{ asset('uploads/products/' . $image) }}" width="280px" height="245px" alt="Image">
                        </a>
                    @else
                        <span>No Image Found!</span>
                    @endif
                </div>

                <div>
                    <p class="mt-5">Description: {{ $product->description }}</p>
                    <p>Price: {{ $product->price . ' ' . $product->currency }}</p>
                    <p>Status: {{ $product->status }}</p>
                </div>

            </div>
        </div>
    </div>

@endsection
