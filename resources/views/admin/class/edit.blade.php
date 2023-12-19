@extends('layout.app')
@section('page-title')
Add New Class
@endsection
@section('title')
Add New Class
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
                                    <label >Name</label>
                                    <input type="text" name="name" class="form-control"value="{{$data->name }}"  placeholder="Name">
                                      <div style="color:brown">{{$errors->first('name')}}</div>
                                            </div>
                                            <div class="form-group">
                                                <label >Status</label>
                                                <select class="form-control" name="status" id="">
                                                    @if ($data->status == 0)
                                                    <option value="0">inactive</option>
                                                    @else
                                                    <option value="1">Active</option>

                                                    @endif


                                                </select>
                                            </div>
                                            </div>
                                            <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                        </div>
                                        @endsection
