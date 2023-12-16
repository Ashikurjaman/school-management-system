@extends('layout.app')

@section('page-title')
User Edit
@endsection
@section('title')
User Edit
@endsection


@section('content')

<!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <form method="post" action="">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label >Name</label>
                    <input type="text" name="name" class="form-control" value="{{old('name',$user->name)}}"  placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label >Email</label>
                    <input type="email" name="email" class="form-control" value="{{old('name',$user->email)}}"  placeholder="email">
                    <div style="color:brown">{{$errors->first('email')}}</div>
                  </div>
                  <div class="form-group">
                    <label >Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label >User type</label>
                    <input type="number" class="form-control" value="{{$user->user_type}}" name="type" placeholder="type">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            @endsection
