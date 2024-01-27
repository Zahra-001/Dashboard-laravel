@extends('layouts.dashboard')
@section('content')

<div class="container ">
    <div class="row text-center">
    <div class="col-sm-12 mt-3">
        <div class="card">
        <h3 class='alert alert-secondary' style='border: none; color: white; background-color: #E6A4B4;'>Add Item</h3>
            <div class="card-body d-flex justify-content-sm-center">
            <form action="{{route('saveitem')}}" method='POST'>
                @csrf
                <label for="itemname" class='pt-2'>Name</label>
                <input type="text" class='form-control form-control-sm' name='itemname'>

                <label for="price" class='pt-2'>Price</label>
                <input type="text" class='form-control form-control-sm' name='price'>

                <label for="qty" class='pt-2'>Quantity</label>
                <input type="text" class='form-control form-control-sm' name='qty'>

                <label for="type" class='pt-2'>Type</label>
                <input type="text" class='form-control form-control-sm' name='type'>

                <label for="itemgroupno" class='pt-2'>Group No.</label>
                <input type="text" class='form-control form-control-sm' name='itemgroupno'>

                <div class ="text-center">
                    <button class='btn btn-primary mt-2' type='submit' onclick='msg'>Save</button>
                </div>
            </form>
            </div>
        </div>

        <div class="card mt-3">
        <div class="card-body">
        <table class='table table-border text-center table-striped'>
                <thead class='table-secondary'>
                    <tr>
                        <th>Item No.</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Type</th>
                        <th>Group No.</th>
                        <th colspan="2">Edit</th>
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
                        <td><a href="{{ route('del-item', ['x' => $row->id]) }}"><i class="bi bi-trash3-fill text-danger"></i></a></td>
                        <td><a href="{{ route('edit-item', ['x' => $row->id]) }}"><i class="bi bi-pencil-square text-success"></i></a></td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
    </div>
        </div>
    </div>
</div>

@endsection

