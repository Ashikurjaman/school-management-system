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
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ Request::get('name') }}"
                            placeholder="Name">
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
                        <th>Name</th>
                        <th>Status</th>
                        <th>Created By</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>





                    </tr>


                </tbody>
            </table>

            <div class="float-right mr-3">


            </div>

        </div>
        <!-- /.card-body -->


        <div class="card-footer clearfix ">

        </div>

    </div>
    @endsection
