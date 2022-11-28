@extends('layout')

@section('content')
    <h1> Update Restaurant</h1>
    <div class="col-sm-6">
    <form action="/update" method="POST">
        @csrf
        <input type="hidden"  name="id" value="{{$data->id}}">
        <div class="form-group">
          <label >Name</label>
          <input type="text" class="form-control" name="name" value="{{$data->name}}" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label >Email </label>
            <input type="email" class="form-control" name="email" value="{{$data->email}}" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label >Address</label>
            <input type="text" class="form-control" name="address" value="{{$data->address}}" placeholder="Enter address">
          </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
      <div>
@endsection