<!-- addgroupsitem -->
@extends('layouts.dashboard')
@section('content')

<div class="container ">
    <div class="row text-center">
    <div class="col-sm-12 mt-3">
        <div class="card">
        <h3 class='alert alert-secondary' style='border: none; color: white; background-color: #E6A4B4;'>Add Group</h3>
            <div class="card-body d-flex justify-content-sm-center">
            
                <form action="{{route('savegritem')}}" method='POST'>
                    @csrf
                    <label for="itemgroupsname">Group Name</label>
                    <input type="text" name='itemgroupsname' class='form-control form-control-sm' id='itemgroupsname'>
                    <div class="row mt-3">
                        <div class="col">
                        <button class='btn btn-primary' type='submit'>Save</button>
                        </div>
                    </div>  
                </form>
            </div>
        </div>

        <div class="card mt-3">
        <div class="card-body">
        <table class='table table-border text-center table-striped'>
                <thead class='table-secondary'>
                    <tr>
                        <th>Group No.</th>
                        <th>Group Name</th>
                        <th colspan='2'>Edit</th>
                    </tr>
                    <tbody>
                        @foreach($data as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->itemgroupsname }}</td>
                            <td><a href="{{ route('del', ['x' => $row->id]) }}"><i class="bi bi-trash3-fill text-danger"></i></a></td>
                            <td><a href="{{ route('edit', ['x' => $row->id]) }}"><i class="bi bi-pencil-square text-success"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </thead>

            </table>
        </div>
    </div>
        </div>
    </div>
</div>

@endsection