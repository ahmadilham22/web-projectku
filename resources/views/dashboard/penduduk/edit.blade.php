@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h3 mb-3 fw-normal text-center">Edit people</h1>
      </div>

      <div class="col-lg-8">

        <form action="/dashboard/update/" method="POST">
        <input type="hidden" name="iduser" value="{{ encrypt($people->id) }}">
        @method('put')
        @csrf
        

        <div class="form-floating">
          <input
            type="text"
            name="name"
            class="form-control @error('name') is-invalid @enderror"
            id="name"
            placeholder="Name" required value="{{ old('name', $people->name)  }}"
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
            name="nik"
            class="form-control @error('nik') is-invalid @enderror"
            id="nik"
            placeholder="nik" required value="{{ old('nik', $people->nik )}}"
          />
          <label for="nik">NIK</label>
          @error('nik')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
              
          @enderror
        </div>
        <div class="form-floating">
          <input
            type="text"
            name="age"
            class="form-control @error('age') is-invalid @enderror"
            id="age"
            placeholder="name@example.com" required value="{{ old('age', $people->age) }}"
          />
          <label for="age">Age</label>
          @error('age')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
              
          @enderror
        </div>
        <div class="form-floating">
          <input
            type="date"
            name="date_of_birth"
            class="form-control @error('date_of_birth') is-invalid @enderror"
            id="date_of_birth"
            placeholder="date_of_birth" required value="{{ old('age', $people->date_of_birth) }}"
          />
          <label for="date_of_birth">Date of birth</label>
          @error('date_of_birth')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
              
          @enderror
        </div>

        <div class="form-floating">
          <input
            type="text"
            name="address"
            class="form-control @error('address') is-invalid @enderror"
            id="address"
            placeholder="address" required value="{{ old('age', $people->address) }}"
          />
          <label for="address">Address</label>
          @error('address')
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