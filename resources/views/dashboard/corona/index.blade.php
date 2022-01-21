@extends('dashboard.layouts.main')

@section('container')
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome back, {{ auth()->user()->name }}</h1>


        
      </div>
       <div class="table-responsive">
        
           
           
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              
              <th scope="col">Country</th>
              <th scope="col">Confirmed</th>
              <th scope="col">Deaths</th>
              <th scope="col">Recovered</th>
              <th scope="col">Active</th>
              
            </tr>
          </thead>
          <tbody>
              @foreach ($data as $datacorona)
                  
              <tr>
                <td>{{ $loop->iteration  }}</td>
                <td>{{ $datacorona['attributes']['Country_Region'] }}</td>
                <td>{{ $datacorona['attributes']['Confirmed'] }}</td>
                <td>{{ $datacorona['attributes']['Deaths'] }}</td>
                <td>{{ $datacorona['attributes']['Recovered'] }}</td>
                <td>{{ $datacorona['attributes']['Active'] }}</td>                
              </tr>

              @endforeach
            
          </tbody>
        </table>
      </div>
@endsection