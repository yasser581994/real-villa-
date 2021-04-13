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
                <a href="{{route('pages.index')}}">Tables</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Datatables</span>
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
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box red">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-globe"></i>Table Pages </div>
                        <div class="actions">
                            <a href="{{route('pages.create')}}" class="btn btn-default btn-sm btn-circle">
                                <i class="fa fa-plus"></i> Add </a>
                            <a href="javascript:;" class="btn btn-default btn-sm btn-circle">
                                <i class="fa fa-print"></i> Print </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_2">
                            <thead>
                                <tr>
                                    <th class="text-center"> Name </th>
                                    <th class="text-center"> Image </th>
                                    <th class="text-center"> Edit </th>
                                    <th class="text-center"> Delete </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pages as $page)
                                <tr>
                                    <td class="text-center"> {{$page->name['en']}} / {{$page->name['ar']}}</td>
                                    <td class="text-center"><img src="{{url('storage/'.$page->image)}}" alt="{{$page->name['en']}}" width="30px" height="30px"></td>
                                    <td class="text-center"> 
                                         <a href="{{route('pages.edit', $page->id)}}" class="btn btn-circle btn-info btn-md">Edit</a>
                                    </td>
                                    <td class="text-center">  
                                      <form method="POST" action="{{ route('pages.destroy', $page->id) }}">
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
