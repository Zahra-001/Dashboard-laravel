@extends('layouts.dashboard')
@section('content')

<div class="container ">
   <div class="card mt-3">
   <h3 class='alert alert-secondary text-center' style='border: none; color: white; background-color: #E6A4B4;'>Items Stock</h3>
    <div class="card-body">
    <div class="row text-center d-flex align-items-center justify-content-center">
    <div class="col-sm-12">
        
            <table class='table table-border text-center table-striped'>
                <thead class='table-secondary'>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Type</th>
                        <th>Group No.</th>
                    </tr>
                </thead>
                <tbody>
                    @if($data!=null)
                    @foreach($data as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->itemname }}</td>
                        <td>{{ $row->price }}</td>
                        <td>{{ $row->qty }}</td>
                        <td>{{ $row->type }}</td>
                        <td>{{ $row->itemgroupno }}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
  
    </div>
    </div>
   </div>
</div>

@endsection