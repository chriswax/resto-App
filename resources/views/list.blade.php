@extends('layout')

@section('content')
@if(Session::get('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
   {{Session::get('status')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

@endif
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">E-mail</th>
            <th scope="col">Address</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td scope="row">{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->address}}</td>
                <td><a href="delete/{{$item->id}}"><i class="fa fa-trash text-danger"></i></a>
                    | <a href="update/{{$item->id}}"><i class="fa fa-edit"></i></a></td>
            </tr>
            @endforeach
        </tbody>
      </table>
@endsection