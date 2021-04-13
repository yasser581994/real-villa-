@extends('layouts.admin') 

@section('content')


  <!--end model-->
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
                <a href="{{route('massages.index')}}">Tables</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Datatables</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Massages
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box red">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-globe"></i>Table Massages </div>
                        <div class="actions">
                            <a href="{{route('languages.create')}}" class="btn btn-default btn-sm btn-circle">
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
                                    <th class="text-center"> Phone </th>
                                    <th class="text-center"> Show </th>
                                    <th class="text-center"> Delete </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($massages as $key => $massage)
                                <div class="modal fade" id="exampleModal-show{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel{{$key}}">New message</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <form method="Get" action="/admin/massages/index" id="showform">
                                            @csrf
                                          <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">Name:</label>
                                            <input type="text" class="form-control" value="{{$massage->name}}" id="recipient-name" readonly>
                                          </div>
                                          <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Phone:</label>
                                              <input type="text" class="form-control" value="{{$massage->phone}}" id="recipient-name" readonly>
                                            </div>
                                            <div class="form-group">
                                              <label for="recipient-name" class="col-form-label">Email:</label>
                                                <input type="text" class="form-control" value="{{$massage->email}}" id="recipient-name" readonly>
                                              </div>
                                          <div class="form-group">
                                            <label for="message-text" class="col-form-label">Description:</label>
                                            <textarea class="form-control" id="message-text">{{$massage->desc}}</textarea>
                                          </div>
                                        </form>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <tr>
                                    <td class="text-center"> {{$massage->name}} </td>
                                    <td class="text-center"> {{$massage->phone}} </td>
                                    <td class="text-center">  
                                    <button  data-toggle="modal" data-target="#exampleModal-show{{$key}}" type="button" class="btn btn-circle btn-primary" data-toggle="modal" data-target="#exampleModal{{$key}}" data-whatever="@mdo">Show </button>                                        </form> 
                                    <td class="text-center">  
                                      <form method="POST" action="{{ route('massages.destroy', $massage->id) }}">
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

@section('js')
<script>
    $('#exampleModal-show').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
 // var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
</script>
    
@endsection