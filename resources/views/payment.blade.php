@extends('layouts.app')
@section('content')

<div class="container py-5">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-8">

        <h3 class="alert alert-secondary text-center fw-semibold" style='border: none; color: white; background-color: #E6A4B4;'>Payment Succeed !</h3>
        <h6 class='pb-4 fw-bold'> Below Your Payment Details :</h6>

          <table class='table table-border text-center table-striped align-center'>
                <thead class='table-secondary'>
                    <tr>
                        <th>Item Name</th>
                        <th>Image</th>
                        <th>Type</th>
                        <th>Price</th>
                    </tr>
                </thead>

                @foreach($item as $itm)
                @foreach($data as $row)
                @if($row->itemid == $itm->id)
                <tbody>
                    <tr>
                        <td>{{ $itm->itemname }}</td>
                        <td><img src="/items/{{$itm->image}}" width='100' height='80' class="img-fluid rounded-3" alt="Cotton T-shirt"></td>
                        <td>{{ $itm->type }}</td>
                        <td>{{ $itm->price }} SR </td>
                    </tr>
                </tbody>
                @endif
                @endforeach
                @endforeach
            </table>

          
          
          <div class="card">
            <div class="card-body">
            <a href="{{ route('empty') }}" id='add' class="btn btn-warning btn-block btn-lg">Return To Main</a>
            </div>
          </div>
  
        </div>
      </div>
</div>

@endsection
