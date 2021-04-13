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
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                            <a href="{{route('admin')}}">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Pages
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12 ">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-red-sunglo">
                                        <i class="icon-settings font-red-sunglo"></i>
                                        <span class="caption-subject bold uppercase"> Create Page</span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <form role="form" method="POST" action="{{route('pages.store')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <div class="form-group form-md-line-input form-md-floating-label has-info">
                                                <label class="control-label">Pages Number</label>
                                                <div>
                                                    <select class="form-control" id="exampleFormControlSelect1" name="page_id">
                                                       <option value="0">Parent Page</option>
                                                        @foreach ($pages as $page)
                                                    <option value="{{$page->id}}">{{$page->name['en']}}</option>
                                                        @endforeach
                                                     </select>   
                                                </div>
                                            </div>
                                            <br>
                                            @foreach($AllLanguages as $one)
                                            <div class="form-group">
                                                <label>{{$one->name}} Name </label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i>{{$one->code}}</i>
                                                    </span>
                                                <input type="text" class="form-control" value='{{old("name.$one->code")}}'
                                             name="name[{{$one->code}}]" placeholder="Name Page"> </div>
                                            </div>
                                            @endforeach
                                            @foreach($AllLanguages as $one)
                                            <div class="form-group">
                                                <label>{{$one->name}} Content</label>
                                            <textarea name="content[{{$one->code}}]" class="form-control" rows="3">{{old("content.$one->code")}}</textarea>
                                            </div>
                                            @endforeach
                                            <div class="form-group ">
                                                <label class="col-md-3 control-label">position</label>
                                                <div class="col-md-4">
                                                    <select class="form-control input-circle" name="position">
                                                        <option value="" @if (old('position') == '') selected="selected" @endif>Select Position</option>
                                                        <option value="header" @if (old('position') == 'header') selected="selected" @endif>Header</option>
                                                        <option value="footer" @if (old('position') == 'footer') selected="selected" @endif>Footer</option>
                                                        <option value="headerfooter" @if (old('position') == 'headerfooter') selected="selected" @endif>Header And Footer</option>
                                                    </select>   
                                                </div>
                                            </div>
                                                <div class="form-group ">
                                                    <label class="col-md-3 control-label">Sort</label>
                                                    <div class="col-md-4">
                                                        <input type="number" value='{{old("sort")}}' class="form-control input-circle" name="sort" placeholder="Sort">
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Image</label>
                                                    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Banner</label>
                                                    <input type="file" class="form-control-file" name="banner" id="exampleFormControlFile1">
                                                </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-circle btn-danger btn-md">Create</button>
                                            <a href="{{route('pages.index')}}" class="btn btn-circle btn-info btn-md">Back</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END SAMPLE FORM PORTLET-->
                             <!-- BEGIN SAMPLE FORM PORTLET-->
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->



@endsection
