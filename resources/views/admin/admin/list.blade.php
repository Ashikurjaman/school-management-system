@extends('layout.app')

@section('page-title')
User List
@endsection
@section('title')
User List
@endsection


@section('content')



<div class="card">
              <div class="card-header ">
                <div class="col-sm-6 float-right">
                <a class="btn btn-info float-right " href="{{url('admin/list/add')}}">Add New</a>
                </div>
              </div>

              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">SL</th>
                      <th>Name</th>
                      <th>Email</th>

                      <th>Created</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($user as $users)
                    <tr>

                        <td>{{$loop->iteration}}</td>
                      <td>{{$users->name}}</td>
                      <td>{{$users->email}}</td>


                      <td>{{$users->created_at}}</td>
                      <td>
                        <a class="btn btn-info" href="">Edit</a>
                        <a class="btn btn-danger" href="">Delete</a>
                      </td>
                      <td>
                        @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            @endsection
