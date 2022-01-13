@extends('main')


@section('container')
    

 <main class="form-signin">
     

     @if (session()->has('loginError'))
     <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('loginError') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> 
    @endif



      <form action="/login" method="POST">
        @csrf
        
        <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>
        @if (session()->has('success'))
     <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> 
    @endif

        <div class="form-floating">
          <input
            type="email"
            name="email"
            class="form-control @error('email') is-invalid @enderror"
            id="email"
            placeholder="name@example.com" autofocus required value="{{ old('email') }}"
          />
          <label for="floatingInput">Email address</label>
          @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="form-floating">
          <input
            type="password"
            name="password"
            class="form-control"
            id="password"
            placeholder="Password" required
          />
          <label for="floatingPassword">Password</label>
        </div>

        <div class="checkbox mb-3">
          
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">
          Sign in
        </button>
        <form action="" >
            <small class="d-block text-center">Not Resgistered? <a href="/register">Register Now</a></small>
        </form>
      </form>
    </main>

    @endsection
    