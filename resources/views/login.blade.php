@extends('layout')

@section('content')
    <h1>Login User</h1>
    <div class="col-sm-6">
    <form action="login" method="POST">
        @csrf
        
        <div class="form-group">
            <label >Email </label>
            <input type="email" class="form-control" name="email" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label >Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password">
          </div>
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
      <div>
@endsection