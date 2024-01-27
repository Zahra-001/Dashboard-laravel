@extends('layouts.app')
@section('content')

<div class="container">
        @foreach($grname as $name)
        <h5 class="alert alert-secondary text-center fw-semibold" style='border: none; color: white; background-color: #E6A4B4;'>{{$name->itemgroupsname}} Section</h5>
        @endforeach
        <div class="row text-center mt-3 d-flex align-items-center justify-content-center">
            @foreach($data as $row)
            <div class="col-sm-4 pt-3 text-center d-flex align-items-center justify-content-center">
            <div class="card" id='items' style="width: 22rem; height: 18rem;">
                <div class="card-body">
                    <img src="/items/{{$row->image}}" alt="{{ $row->itemname }}">
                    <h5 class="mt-2">{{ $row->itemname }}</h5>
                    <h7 class="fw-bold">{{ $row->price }} SR</h7>
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('addtocart', ['id'=>$row->id]) }}" id='add' class="btn btn-secondary mt-2">Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
