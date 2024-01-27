@extends('layouts.app')
@section('content')

<div class="container">
   
    <h5 class="alert alert-secondary text-center fw-semibold" style='border: none; color: white; background-color: #E6A4B4;'>Welcome to CARE website !</h5>
    <div class="row text-center d-flex align-items-center justify-content-center">
    @foreach($data as $row)
        <div class="col-sm-5 m-2 p-2 text-center d-flex align-items-center justify-content-center">
            <span>
            <a href="{{ route('showproduct', ['id'=>$row->id]) }}">
                
            <div class="card" id='grcard' style="width: 26rem; height: 20rem; ">
                <div class="card-body">
                    <img src="/groups/{{$row->img}}" alt="{{ $row->itemgroupsname }}">
                    <p class="fw-bold mt-3" >{{ $row->itemgroupsname }}</p>
                </div>
            </div>
            </a>
            </span>
        </div>
    @endforeach
    </div>

</div>

@endsection