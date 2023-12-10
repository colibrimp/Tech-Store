@extends('layouts.main')

@section('Auth', 'Register')

@section('content')
    <section class="panel">
        <div class="container">

            <div class="mt-5">

                {{--  FORM REGISTER --}}
                <form method="POST" action="{{ route('register.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="last_name" placeholder="name"
                                value="{{ old('last_name') }}">
                        
                    </div>


                    <div class="mb-3">
                        <label for="email" class="form-lable">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="name@example.com"
                                value="{{ old('email') }}">
                        
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-lable">Email address verified </label>
                            <input type="email" class="form-control" id="email_verified_at"
                                placeholder="name@example.com" value="{{ old('email_verified_at') }}">
                       
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-lable">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="password">
                        
                    </div>

                    <div class="mt-2">
                        <button type="submit" id="submit" class="btn btn-secondary">Register</button>

                    </div>

                    <div class="">
                        <p>Do You have an accout? <a href="{{ url('login') }}"><b>Login!!</b></a></p>

                    </div>
                </form>
            </div>

        </div>

        </div>
    </section>
@endsection
