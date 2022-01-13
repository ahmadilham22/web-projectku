@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h3 mb-3 fw-normal text-center">Edit Data</h1>
      </div>

      <div class="col-lg-8">

        <form action="/dashboard/data/{{ $data->id }}" method="POST">
          @method('put')
        @csrf
        

        <div class="form-floating">
          <input
            type="text"
            name="name"
            class="form-control @error('name') is-invalid @enderror"
            id="name"
            placeholder="Name" required value="{{ old('name', $data->name)  }}"
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
            placeholder="Username" required value="{{ old('username', $data->username )}}"
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
            placeholder="name@example.com" required value="{{ old('email', $data->email) }}"
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
          Submit
        </button>
        
      </form>
      </div>

       

@endsection