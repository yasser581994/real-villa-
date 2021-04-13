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
                    <!-- BEGIN THEME PANEL -->
                    <div class="theme-panel hidden-xs hidden-sm">
                        <div class="toggler"> </div>
                        <div class="toggler-close"> </div>
                        <div class="theme-options">
                            <div class="theme-option theme-colors clearfix">
                                <span> THEME COLOR </span>
                                <ul>
                                    <li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default"> </li>
                                    <li class="color-darkblue tooltips" data-style="darkblue" data-container="body" data-original-title="Dark Blue"> </li>
                                    <li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue"> </li>
                                    <li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey"> </li>
                                    <li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light"> </li>
                                    <li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true" data-original-title="Light 2"> </li>
                                </ul>
                            </div>
                            <div class="theme-option">
                                <span> Theme Style </span>
                                <select class="layout-style-option form-control input-sm">
                                    <option value="square" selected="selected">Square corners</option>
                                    <option value="rounded">Rounded corners</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Layout </span>
                                <select class="layout-option form-control input-sm">
                                    <option value="fluid" selected="selected">Fluid</option>
                                    <option value="boxed">Boxed</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Header </span>
                                <select class="page-header-option form-control input-sm">
                                    <option value="fixed" selected="selected">Fixed</option>
                                    <option value="default">Default</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Top Menu Dropdown</span>
                                <select class="page-header-top-dropdown-style-option form-control input-sm">
                                    <option value="light" selected="selected">Light</option>
                                    <option value="dark">Dark</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Mode</span>
                                <select class="sidebar-option form-control input-sm">
                                    <option value="fixed">Fixed</option>
                                    <option value="default" selected="selected">Default</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Menu </span>
                                <select class="sidebar-menu-option form-control input-sm">
                                    <option value="accordion" selected="selected">Accordion</option>
                                    <option value="hover">Hover</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Style </span>
                                <select class="sidebar-style-option form-control input-sm">
                                    <option value="default" selected="selected">Default</option>
                                    <option value="light">Light</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Position </span>
                                <select class="sidebar-pos-option form-control input-sm">
                                    <option value="left" selected="selected">Left</option>
                                    <option value="right">Right</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Footer </span>
                                <select class="page-footer-option form-control input-sm">
                                    <option value="fixed">Fixed</option>
                                    <option value="default" selected="selected">Default</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- END THEME PANEL -->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Form Stuff</span>
                            </li>
                        </ul>
                        <div class="page-toolbar">
                            <div class="btn-group pull-right">
                                <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li>
                                        <a href="#">
                                            <i class="icon-bell"></i> Action</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-shield"></i> Another action</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-user"></i> Something else here</a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-bag"></i> Separated link</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Bootstrap Form Controls
                        <small>bootstrap form controls and more</small>
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
                                    <form role="form" method="post" action="{{route('pages.update', $editpage->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <div class="form-group form-md-line-input form-md-floating-label has-info">
                                                <label class="control-label">Pages Number</label>
                                                <div>
                                                    <select class="form-control" id="exampleFormControlSelect1" name="page_id">
                                                       <option value="0">Parent Page</option>
                                                        @foreach ($pages as $page)
                                                    <option value="{{$page->id}}" {{$editpage->page_id == $page->id ? 'selected' : ''}}>{{$page->name['en']}}</option>
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
                                                <input type="text" class="form-control" value="{{$editpage->name[$one->code]}}" name="name[{{$one->code}}]" placeholder="Name Page"> </div>
                                            </div>
                                            @endforeach
                                            @foreach($AllLanguages as $one)
                                            <div class="form-group">
                                                <label>{{$one->name}}Content</label>
                                                <textarea name="content[{{$one->code}}]" class="form-control" rows="3">{{$editpage->content[$one->code]}}</textarea>
                                            </div>
                                            @endforeach
                                            <div class="form-group form-md-line-input form-md-floating-label has-info">
                                                <label class="control-label">Position</label>
                                                <div>
                                                    <select class="form-control" id="exampleFormControlSelect1" name="position">
                                                        <option value="">Select Position</option>
                                                        <option value="header" {{$editpage->position == 'header' ? 'selected' : ''}}>Header</option>
                                                        <option value="footer" {{$editpage->position == 'footer' ? 'selected' : ''}}>Footer</option>
                                                        <option value="header and footer" {{$editpage->position == 'header and footer' ? 'selected' : ''}}>Header And Footer</option>
                                                    </select>   
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label>Sort</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                    </span>
                                                    <input type="number" value="{{$editpage->sort}}" class="form-control" name="sort" placeholder="Sort"> 
                                                </div>
                                            </div>
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
                                            <button type="submit" class="btn blue">Edit</button>
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
