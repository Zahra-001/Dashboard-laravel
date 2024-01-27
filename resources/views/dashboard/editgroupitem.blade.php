@extends('layouts.dashboard')
@section('content')

<div class="container">
    <div class="row text-center d-flex align-items-center justify-content-center">
        <div class="col">
            <div class="card mt-3">
            <h3 class="alert alert-secondary" style='border: none; color: white; background-color: #E6A4B4;'>Edit Group Name</h3>
                <div class="card-body">
                    <form action="{{ route('update') }}" method="POST">
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
                                    <td><label for="itemgroupsname">Group Name</label></td>
                                    <td><input type="text" name='itemgroupsname' id='x1' value="{{$item->itemgroupsname}}"></td>
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