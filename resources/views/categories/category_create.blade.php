
@extends('welcome')

@section('Category', 'Сreate')


@section('content')


    <div class="row">
        <div class="col-lg-6 mx-auto">

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
                    <label for="post-title">Title</label>
                    <input type="text" name="title" class="form-control" id="post-title" value="{{ old('title') }}" >
                </div>

                <div class="form-group">
                    <label for="post-title">Alias</label>
                    <input type="text" name="alias" class="form-control" id="post-title" value="{{ old('alias') }}" >

                    <div class="form-group">
                        <label for="post-title">Status</label>
                        <input type="text" name="status" class="form-control" id="post-title" value="{{ old('status', 0) }}" >
                    </div>


                <button type="submit" class="btn btn-success mt-3">
                    Add Category
                </button>

            </form>
        </div>
    </div>
@endsection

