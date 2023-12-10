@extends('layouts.main')

@section('content')
    <section class="panel">
        <div class="container">

<div class="mt-5">
   <form method="POST" action="{{ route('login.store') }}" class="mt-5">
      @csrf

      <div class="mb-3">
          <label for="name" class="form-label">Login</label>
          <input type="text" class="form-control" id="email" placeholder="login" value="{{ old('email') }}">
          
      </div>

      <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" placeholder="password"
                  value="{{ old('password') }}">
          
      </div>


      <div class="form-label">
          <button type="submit" id="submit" class="btn btn-secondary">Enter</button>
      </div>

      <div class="mt-2">
          <p>Don`t Have an accout? <a href="{{ url('register') }}"><b>Register!!</b></a></p>

      </div>
  </form>
</div>
            
        </div>


    </section>
@endsection
