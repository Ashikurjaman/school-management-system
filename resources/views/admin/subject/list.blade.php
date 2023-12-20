@extends('layout.app')

@section('page-title')
Subject List
@endsection
@section('title')
Subject List
@endsection


@section('content')


@include('_message')





<div class="card">
    <div class="container-fluid">


        <div class="col-md-12">

            <form method="get" action="">


                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ Request::get('name') }}"
                            placeholder="Name">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Subject type</label>
                        <input type="text" name="subject_type" class="form-control" value="{{ Request::get('subject_type') }}"
                            placeholder="Subject type">
                    </div>

                    <div class="form-group col-md-3">
                        <label>Date</label>
                        <input type="Date" name="date" class="form-control" value="{{ Request::get('date') }}"
                            placeholder="date">

                    </div>
                    <div class="form-group col-md-3">
                        <button type="submit" class="btn btn-primary" style="  margin-top: 32px">Search</button>
                        <a href="{{url('admin/subject/list')}}" type="submit" class="btn btn-info" style="  margin-top: 32px">Reset</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer clearfix ">

        </div>
        <div class="card-header ">
            <div class="col-sm-6 float-right">
                <a class="btn btn-info float-right " href="{{url('subject/list/add')}}">Add New</a>
            </div>
        </div>

        <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">SL</th>
                        <th>Subject Name</th>
                        <th>Subject Code</th>
                        <th>Subject type</th>
                        <th>Status</th>
                        <th>Created By</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($data as $datas)
                    <tr>

                        <td>{{$loop->iteration}}</td>
                        <td>{{$datas->name}}</td>
                        <td>{{$datas->subject_code}}</td>
                        <td>{{$datas->subject_type}}</td>
                        <td>{{$datas->status}}</td>
                        <td>{{$datas->created_by_name}}</td>

                        <td>{{date('d-m-y h:i a',strtotime($datas->created_at))}}</td>
                        <td>
                            <a class="btn btn-info text-xs m-1" href="{{url('subject/list/edit/'. $datas->id)}}">Edit</a>
                            <a class="btn btn-warning text-xs m-1"
                                href="{{url('subject/list/void/'. $datas->id)}}">inactive</a>
                            <a class="btn btn-danger text-xs m-1"
                                href="{{url('subject/list/delete/'. $datas->id)}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <p class=" ml-3 mt-2"><small>Total data Found {{$data->total()}}</small></p>
            <div class="float-right mr-3">

            {!! $data->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
            </div>

        </div>
        <!-- /.card-body -->


        <div class="card-footer clearfix ">

        </div>

    </div>
    @endsection
