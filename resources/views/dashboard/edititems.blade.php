@extends('layouts.dashboard')
@section('content')

<div class="container">
    <div class="row text-center d-flex align-items-center justify-content-center">
        <div class="col">
            <div class="card mt-3">
            <h1 class="alert alert-secondary" style='border: none; color: white; background-color: #E6A4B4;'>Edit Item Information</h1>

                <div class="card-body">
                    <form action="{{ route('update-item') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <table class='table table-border text-center'>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            @isset($item)
                            <tbody>
                                <tr>
                                    <td><label for="itemname">Name</label></td>
                                    <td><input type="text" name='itemname' id='x1' value="{{$item->itemname}}"></td>
                                </tr>
                                <tr>
                                    <td><label for="price">Price</label></td>
                                    <td><input type="text" name='price' id='x2' value="{{$item->price}}"></td>
                                </tr>
                                <tr>
                                    <td><label for="qty">Quantity</label></td>
                                    <td><input type="text" name='qty' id='x3' value="{{$item->qty}}"></td>
                                </tr>
                                <tr>
                                    <td><label for="type">Type</label></td>
                                    <td><input type="text" name='type' id='x4' value="{{$item->type}}"></td>
                                </tr>
                                <tr>
                                    <td><label for="itemgroupno">Group No.</label></td>
                                    <td><input type="text" name='itemgroupno' id='x5' value="{{$item->itemgroupno}}"></td>
                                </tr>
                            </tbody>
                            @endisset
                        </table>
                        <div class ="text-center">
                            <button class='btn btn-primary mt-2' type='submit'>Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection