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
                    <h3 class="page-title"> Create Settings
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
                                                <form role="form" method="post" action="{{route('settings.update', $setting->id)}}">
                                                    @csrf
                                                    <div class="form-body">
                                                        <!--text-->
                                                        @foreach($AllLanguages as $one)
                                                        <div class="form-group  ">
                                                            <label class="col-md-3 control-label">{{$one->name}} Text </label>
                                                            <div class="input-group col-md-6">
                                                                    <span class="input-group-addon input-circle-left ">
                                                                        <i>{{$one->code}}</i>
                                                                    </span>
                                                                <input type="text" class="form-control input-circle-right" value="{{$setting->text[$one->code]}}"
                                                                name="text[{{$one->code}}]" placeholder="{{$one->name}}text">
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        <!--type-->
                                                        <div class="form-group  ">
                                                            <label class="col-md-3 control-label">Type</label>
                                                            <div class="input-group col-md-6">
                                                                <select class="form-control input-circle" id="exampleFormControlSelect1" name="type">
                                                                    <option value="0">Select</option>
                                                                    <option value="email">Email</option>
                                                                    <option value="phone">Phone</option>
                                                                    <option value="address">Address</option>
                                                                </select>   
                                                            </div>
                                                        </div>
                                                        <!--icon-->
                                                        <div class="form-group  ">
                                                            <label class="col-md-3 control-label">Icon </label>
                                                            <div class="input-group col-md-6">
                                                                <input value="{{$setting->icon}}" type="text" class="form-control input-circle" name="icon" placeholder="icon">
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn btn-circle green">Edit</button>
                                                                <a href="{{route('settings.index')}}" class="btn btn-circle btn-info btn-md">Back</a>
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
