@extends('layouts.admin')   
@section('content')
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                <a href="{{route('admin')}}">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Datatables</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Galleries
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box red">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-globe"></i>Table Galleries </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_2">
                            <thead>
                                <tr>
                                    <th class="text-center"> Image </th>
                                    <th class="text-center"> Edit </th>
                                    <th class="text-center"> Delete </th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($post->galleries as $gallery)
                                    <tr>
                                        <td class="text-center"><img src="{{url('storage/'.$gallery->image)}}" alt="{{$gallery->name}}" width="30px" height="30px"></td>
                                        <td class="text-center"> 
                                            <a href="{{route('galleries.edit', $gallery->id)}}" class="btn btn-circle btn-info btn-md">Edit</a>
                                        </td>
                                        <td class="text-center">  
                                        <form method="POST" action="{{ route('galleries.destroy', $gallery->id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-circle btn-danger">Delete</button>
                                        </form> 
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

@endsection
