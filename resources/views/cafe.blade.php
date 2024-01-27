@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <table>
                <thead>
                    <tr>
                        <th>title</th>
                        <th>description</th>
                        <th>image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td>{{$row->title}}</td>
                        <td>{{$row->description}}</td>
                        <td><img src="{{$row->image}}" alt="coffee" width='100' height="100"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>




@endsection