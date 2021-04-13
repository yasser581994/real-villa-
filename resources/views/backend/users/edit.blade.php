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
                <h3 class="page-title"> Edit User
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
                                        <form action="{{route('users.update',  $user->id)}}" method="POST"  class="form-horizontal">
                                            @csrf
                                                <div class="form-body">
                                                    <!--name-->
                                                    <div class="form-group ">
                                                        <label class="col-md-3 control-label">Name</label>
                                                        <div class="col-md-4">
                                                            <input type="text" value="{{$user->name}}" class="form-control input-circle" name="name" placeholder="User Name">
                                                        </div>
                                                    </div>
                                                    <!--email-->
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Email</label>
                                                        <div class="col-md-4">
                                                        <input type="email" value='{{$user->email}}' class="form-control input-circle" name="email"  placeholder="User Email"id="exampleFormControlFile1">
                                                        </div>
                                                    </div>
                                                    <!--password-->
                                                    <div class="form-group">
                                                    <label class="col-md-3 control-label">Password</label>
                                                        <div class="col-md-4">
                                                        <input type="password" class="form-control input-circle" name="password" placeholder="User Password" id="exampleFormControlFile1">
                                                        </div>
                                                    </div>
                                                    <!--admin-->
                                                    <div class="form-group  ">
                                                    <label class="col-md-3 control-label">Role </label>
                                                    <div class="md-radio-inline">
                                                        <div class="md-radio">
                                                        <input value="{{$user->role}}"
                                                            @if ($user->role == 1 )
                                                            checked                       
                                                            @endif
                                                            type="radio" id="radio7" class="md-radiobtn" name="role">
                                                            <label for="radio7">
                                                                <span class="inc"></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>
                                                                admin
                                                            </label>
                                                        </div> 
                                                        <div class="md-radio">
                                                            <input value="{{$user->role}}"
                                                            @if ($user->role == 0 )
                                                            checked                       
                                                            @endif
                                                            type="radio" id="radio8" class="md-radiobtn" name="role">
                                                                <label for="radio8">
                                                                    <span class="inc"></span>
                                                                    <span class="check"></span>
                                                                    <span class="box"></span>
                                                                    user
                                                                </label>
                                                            </div> 
                                                    </div>
                                                    </div> 
                                                </div> 
                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <button type="submit" class="btn btn-circle green">Edit</button>
                                                            <a href="{{route('users.index')}}" class="btn btn-circle btn-info btn-md">Back</a>
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
