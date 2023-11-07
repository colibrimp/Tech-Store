
@extends('welcome')

@section('Category', $category->title)


@section('content')


    <div class="row">
        <div class="col-lg-6 mx-auto">

            {{-- для вывода ошибок --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif

            <form method="post" action="{{ route('category.store') }}" class="mt-5">
                @csrf

                <div class="form-group">
                    <label for="post-title">ID</label>
                    <input type="text" name="id" class="form-control" id="id" value="{{ old('id', $category->id) }}" >
                </div>

                <div class="form-group">
                    <label for="post-title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $category->title) }}" >
                </div>

                <div class="form-group">
                    <label for="post-title">Alias</label>
                    <input type="text" name="alias" class="form-control" id="alias" value="{{ old('alias', $category->alias) }}" >

                    <div class="form-group">
                        <label for="post-title">Status</label>
                        <input type="text" name="status" class="form-control" id="status" value="{{ old('status', $category->status) }}" >
                    </div>


                    <button type="submit" class="btn btn-success mt-3">
                        Add Category
                    </button>

            </form>
        </div>
    </div>
@endsection

