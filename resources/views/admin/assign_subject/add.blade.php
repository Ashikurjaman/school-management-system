@extends('layout.app')
@section('page-title')
Add New Assign Subject
@endsection
@section('title')
Add New Assign Subject
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 offset-3">
                <!-- general form elements -->
                <div class="card card-primary">
                    <form method="post" action="">
                        @csrf
                        <div class="card-body ">
                            <div class="form-group">
                                <label >Select Class</label>
                                <select class="form-control" name="class_id" id="">
                                  @foreach ($getClassData as $cls)
                                    <option value="{{$cls->id}}" name="">
                                        {{$cls->name}}
                                    </option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label >Select Subject</label>
                                @foreach ($getSubjectData as $sub)
                                <div class="">

                                    <input type="checkbox" value="{{$sub->id}}" name="subject_id[]">
                                        {{$sub->name}}

                                </div>
                                @endforeach

                                <div class="form-group">
                                    <label >Status </label>
                                    <select class="form-control" name="status" id="">
                                        <option value="1">Active</option>
                                        <option value="0">inactive</option>
                                    </select>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                                        @endsection
