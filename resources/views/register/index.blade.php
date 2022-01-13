@extends('main')


@section('container')
  <main class="form-registration text-center">
    
     
      <form action="/register" method="POST">
        @csrf
        <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>

        <div class="form-floating">
          <input
            type="text"
            name="name"
            class="form-control @error('name') is-invalid @enderror"
            id="name"
            placeholder="Name" required value="{{ old('name') }}"
          />
          <label for="name">Name</label>
          @error('name')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
              
          @enderror
        </div>
        <div class="form-floating">
          <input
            type="text"
            name="username"
            class="form-control @error('username') is-invalid @enderror"
            id="username"
            placeholder="Username" required value="{{ old('username') }}"
          />
          <label for="username">Username</label>
          @error('username')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
              
          @enderror
        </div>
        <div class="form-floating">
          <input
            type="email"
            name="email"
            class="form-control @error('email') is-invalid @enderror"
            id="email"
            placeholder="name@example.com" required value="{{ old('email') }}"
          />
          <label for="email">Email address</label>
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
            class="form-control @error('password') is-invalid @enderror"
            id="password"
            placeholder="Password" required 
          />
          <label for="password">Password</label>
          @error('password')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
              
          @enderror
        </div>

        <div class="checkbox mb-3">
          
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">
          Sign up
        </button>
        <form action="" >
            <small class="d-block text-center">Already Registered? <a href="/login">Login</a></small>
        </form>
      </form>
    </main>   
@endsection