@extends('layouts.admin')   
@section('content')
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    @if ($errors->any())
               
                    <div class="alert alert-danger">
                      <ul class="list-group">
                      @foreach ($errors->all() as $error)
                      <li class="list-group-item">
                        {{$error}}
                      </li>    
                      @endforeach
                      </ul>
                    </div>
                        
                    @endif
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Edit Galleries
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tabbable-line boxless tabbable-reversed">

                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_0">
                                        <div class="portlet box green">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-gift"></i>Form Actions On Bottom </div>

                                            </div>
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                            <form action="{{route('galleries.update' , $gallery->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                                @csrf
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Image</label>
                                                            <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                                                        </div>
                                                    </div>
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn btn-circle green">Edit</button>
                                                                <a href="{{route('galleries.index', $gallery->post->id)}}" class="btn btn-circle btn-info btn-md">Back</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </form>
                                                <!-- END FORM-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->


@endsection
