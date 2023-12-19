@extends('layout.app')
@section('page-title')
Edit Subject
@endsection
@section('title')
Edit Subject
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
                                    <label >Subject Name</label>
                                    <input type="text" name="name" class="form-control"value="{{$data->name }}"  placeholder="Name">

                                            </div>

                                 <div class="form-group">
                                    <label >Subject Code</label>
                                    <input type="text" name="subject_code" class="form-control"value="{{$data->subject_code }}"  placeholder="Subject code">

                                 </div>

                                 <div class="form-group">
                                    <label >Subject Type</label>
                                    <select class="form-control" name="subject_type" >

                                                    <option {{($data->subject_type == 'Practical') ? 'selected' :''}} value="Practical">Practical</option>

                                                    <option {{($data->subject_type == 'Theory') ? 'selected' :''}} value="Theory">Theory</option>
                                                    </select>

                                            </div>


                                            <div class="form-group">
                                                <label >Status</label>
                                                <select class="form-control" name="status" id="">

                                                    <option {{($data->status == 0) ? 'selected' :''}} value="0">Inactive</option>

                                                    <option {{($data->status == 1) ? 'selected' :''}} value="1">Active</option>
                                                 </select>
                                            </div>
                                            </div>
                                            <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                        </div>
                                        @endsection
