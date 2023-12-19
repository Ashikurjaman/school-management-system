@extends('layout.app')
@section('page-title')
Add New Subject
@endsection
@section('title')
Add New Subject
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
                                    <input type="text" name="name" class="form-control"value="{{ old('name') }}"  placeholder="Name">
                                      <div style="color:brown">{{$errors->first('name')}}</div>
                                            </div>
                                 <div class="form-group">
                                    <label >Subject Type</label>
                                                <select class="form-control" name="subject_type" >
                                                    <option value="">Select type</option>
                                                <option value="Practical">Practical</option>
                                                <option value="Theory">Theory</option>
                                                </select>

                                            </div>
                                            <div>
                                    <label >Subject Code</label>
                                    <input type="text" name="subject_code" class="form-control"value="{{ old('subject_code') }}"  placeholder="code">

                                            </div>
                                            <div class="form-group">
                                                <label >Status</label>
                                                <select class="form-control" name="status" id="">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                        </div>
                                        @endsection
