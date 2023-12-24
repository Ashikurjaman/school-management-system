@extends('layout.app')

@section('page-title')
Assign List
@endsection
@section('title')
Assign List
@endsection


@section('content')


@include('_message')





<div class="card">
    <div class="container-fluid">


        <div class="col-md-12">

            <form method="get" action="">


                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Class Name</label>
                        <input type="text" name="class_name" class="form-control" value="{{ Request::get('class_name') }}"
                            placeholder="Class Name">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Subject Name</label>
                        <input type="text" name="subject_name" class="form-control" value="{{ Request::get('subject_name') }}"
                            placeholder="Class Name">
                    </div>

                    <div class="form-group col-md-3">
                        <label>Date</label>
                        <input type="Date" name="date" class="form-control" value="{{ Request::get('date') }}"
                            placeholder="date">

                    </div>
                    <div class="form-group col-md-3">
                        <button type="submit" class="btn btn-primary" style="  margin-top: 32px">Search</button>
                        <a href="{{url('admin/assign_subject/list')}}" type="submit" class="btn btn-info" style="  margin-top: 32px">Reset</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer clearfix ">

        </div>
        <div class="card-header ">
            <div class="col-sm-6 float-right">
                <a class="btn btn-info float-right " href="{{url('assign_subject/list/add')}}">Add New</a>
            </div>
        </div>

        <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">SL</th>
                        <th>Class Name</th>
                        <th>Subject Name</th>
                        <th>Created By</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ($data as $d)
                <tbody>

                    <tr>
                    <td>{{$loop->iteration}}</td>
                        <td>{{$d->class_name}}</td>
                        <td>{{$d->subject_name}}</td>
                        <td>{{$d->created_by_name}}</td>

                        <td>{{date('d-m-y h:i a',strtotime($d->created_at))}}</td>
                        <td>
                            <a class="btn btn-info text-xs m-1" href="{{url('assign_subject/list/edit/'. $d->id)}}">Edit</a>
                            <a class="btn btn-warning text-xs m-1"
                                href="{{url('assign_subject/list/void/'. $d->id)}}">inactive</a>
                            <a class="btn btn-danger text-xs m-1"
                                href="{{url('assign_subject/list/delete/'. $d->id)}}">Delete</a>
                        </td>
                    </tr>

                </tbody>
                @endforeach
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
