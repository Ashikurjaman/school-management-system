@extends('layout.app')

@section('page-title')
User List
@endsection
@section('title')
User List
@endsection


@section('content')


@include('_message')

<div class="card card-primary">
              <div class="row">
                <form method="get" action="">

                <div class="card-body">
                  <div class="form-group col-md-6">
                    <label >Name</label>
                    <input type="text" name="name" class="form-control"value="{{ old('name') }}"  placeholder="Name">
                  </div>
                  <div class="form-group col-md-3">
                    <label >Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"  placeholder="email">
                    </div>
                    </form>
              </div>



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
                        <a class="btn btn-info text-xs m-1" href="{{url('admin/list/edit/'. $users->id)}}">Edit</a>
                        <a class="btn btn-warning text-xs m-1" href="{{url('admin/list/void/'. $users->id)}}">Void</a>
                        <a class="btn btn-danger text-xs m-1" href="{{url('admin/list/delete/'. $users->id)}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <p class=" ml-3 mt-2"><small>Total data Found {{$user->total()}}</small></p>
        <div class="float-right mr-3">

            {!! $user->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
        </div>

    </div>
    <!-- /.card-body -->


    <div class="card-footer clearfix ">

    </div>

</div>
@endsection
