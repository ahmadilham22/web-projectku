@extends('dashboard.layouts.main')

@section('container')
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome back, {{ auth()->user()->name }}</h1>


        
      </div>
       <div class="table-responsive">
         @can('admin')
           <a href={{ url('/dashboard/add') }} class="btn btn-primary mb-4">Add New Data</a>
         @endcan
           
            @if (session()->has('success'))
     <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> 
    @endif
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              
              <th scope="col">Name</th>
              <th scope="col">NIK</th>
              <th scope="col">Age</th>
              <th scope="col">Date Of Birth</th>
              <th scope="col">Address</th>
              <th scope="col">Action</th>
              
            </tr>
          </thead>
          <tbody>
              @foreach ($peoples as $people )
                  
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $people -> name }}</td>
                <td>{{ $people -> nik }}</td>
                <td>{{ $people -> age }}</td>
                <td>{{ $people -> date_of_birth }}</td>
                <td>{{ $people -> address }}</td>
                <td>
                
                  <a href="/dashboard/{{ encrypt($people->id) }}/edit" class="badge bg-danger"><span data-feather="edit"></span></a>
                  <a href="/dashboard/{{ encrypt($people->id) }}/delete" class="badge bg-warning"><span data-feather="trash-2"></span></a>

                  {{-- <form action="/dashboard/{{ $people->id }}/delete" method="POST" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-warning border-0" onclick="return confirm('Are you sure?')">
                  <span data-feather="trash-2"></span></button>
                  </form> --}}
                  {{-- @can('admin')
                  @endcan --}}
                    
                    
                   
                </td> 
                
              </tr>
              @endforeach
            
          </tbody>
        </table>
      </div>
@endsection