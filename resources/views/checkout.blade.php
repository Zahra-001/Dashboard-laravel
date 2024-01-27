@extends('layouts.app')
@section('content')

    <div class="container py-5">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-8">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
          </div>

          @foreach($item as $itm)
          @foreach($data as $row)
          @if($row->itemid == $itm->id)
          
          <div class="card rounded-3 mb-4">
            <div class="card-body">
              <div class="row d-flex justify-content-between align-items-center">
                <div class="col-md-2">
                  <img
                    src="/items/{{$itm->image}}"
                    class="img-fluid rounded-3" alt="Cotton T-shirt">
                </div>

                <div class="col-md-3 col-lg-3 col-xl-3">
                  <p class="lead fw-normal mb-2">{{$itm->itemname}}</p>
                  <p><span class="text-muted">Type: </span>{{$itm->type}}</p>
                </div>

                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                  <h5 class="mb-0">{{$itm->price}} SR</h5>
                </div>
                
                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                  <a href="{{ route('deleteitem', ['id' => $row->id]) }} " class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                </div>
              </div>
            </div>
          </div>
          @endif
          @endforeach
          @endforeach
          
          <div class="card">
            <div class="card-body">
            <a href="{{ route('payment') }}" id='add' class="btn btn-warning btn-block btn-lg">Proceed To Pay</a>
            </div>
          </div>
  
        </div>
      </div>
    </div>

@endsection