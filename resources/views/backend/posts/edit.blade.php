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
                    <h3 class="page-title"> Edit Post
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
                                            <form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                                @csrf
                                                    <div class="form-body  ">
                                                           <!--page_id-->
                                                           <div class="form-group  ">
                                                             <label class="col-md-3 control-label">Pages Number</label>
                                                               <div class="input-group col-md-6">
                                                                <select class="form-control input-circle-left" id="exampleFormControlSelect1" name="page_id">
                                                                   <option value="0">Parent Page</option>
                                                                    @foreach ($pages as $page)
                                                                <option value="{{$page->id}}">{{$page->name['en']}}</option>
                                                                    @endforeach
                                                                 </select>   
                                                                </div>
                                                            </div>
                                                        <br>
                                                           <!--name-->
                                                           @foreach($AllLanguages as $one)
                                                           <div class="form-group  ">
                                                            <label class="col-md-3 control-label">{{$one->name}} Name </label>
                                                             <div class="input-group col-md-6">
                                                                    <span class="input-group-addon input-circle-left ">
                                                                        <i>{{$one->code}}</i>
                                                                    </span>
                                                                 <input type="text" class="form-control input-circle-right"  value="{{$post->name[$one->code]}}"
                                                                  name="name[{{$one->code}}]" placeholder="Name Page">
                                                            </div>
                                                           </div>
                                                            @endforeach
                                                             <!--content-->
                                                             @foreach($AllLanguages as $one)
                                                             <div class="">
                                                              <div class="form-group"> 
                                                                 <textarea  name="content[{{$one->code}}]" rows="3"  cols="3"  id="editor_{{$one->code}}">{{$post->content[$one->code]}}</textarea>
                                                                 <script>
                                                                         CKEDITOR.replace( "editor_{{$one->code}}" );
                                                                 </script>                                                      
                                                              </div>
                                                             </div>
                                                             @endforeach
                                                            <!--price-->
                                                            <div class="form-group  ">
                                                                <label class="col-md-3 control-label">Price </label>
                                                                <div class="input-group col-md-6">
                                                                        <span class="input-group-addon input-circle-left ">
                                                                            <i>$</i>
                                                                        </span>
                                                                    <input type="number" value="{{$post->price}}" class="form-control input-circle-right" name="price" placeholder="Price">
                                                                </div>
                                                            </div>
                                                            <!--period-->
                                                            <div class="form-group  ">
                                                                <label class="col-md-3 control-label">Period </label>
                                                                <div class="input-group col-md-6">
                                                                        <span class="input-group-addon input-circle-left ">
                                                                            <i>$</i>
                                                                        </span>
                                                                    <input type="number" value="{{$post->period}}" class="form-control input-circle-right" name="period" placeholder="period">
                                                                </div>
                                                            </div>
                                                            <!--price_metter-->
                                                            <div class="form-group  ">
                                                                <label class="col-md-3 control-label">Price_Metter </label>
                                                                <div class="input-group col-md-6">
                                                                        <span class="input-group-addon input-circle-left ">
                                                                            <i>$</i>
                                                                        </span>
                                                                    <input type="number" value="{{$post->price_metter}}" class="form-control input-circle-right" name="price_metter" placeholder="price_metter">
                                                                </div>
                                                            </div>
                                                            <!--number_of_floors-->
                                                            <div class="form-group  ">
                                                                <label class="col-md-3 control-label">Number_Of_Floors </label>
                                                                <div class="input-group col-md-6">
                                                                    <input type="number" value="{{$post->number_of_floors}}" class="form-control  input-circle" name="number_of_floors" placeholder="number_of_floors">
                                                                </div>
                                                            </div>
                                                            <!--number_of_flats-->
                                                            <div class="form-group  ">
                                                                <label class="col-md-3 control-label">Number_Of_Flats </label>
                                                                <div class="input-group col-md-6">
                                                                    <input type="number" value="{{$post->number_of_flats}}" class="form-control  input-circle" name="number_of_flats" placeholder="number_of_flats">
                                                                </div>
                                                            </div>
                                                            <!--size-->
                                                            <div class="form-group  ">
                                                                <label class="col-md-3 control-label">Size </label>
                                                                <div class="input-group col-md-6">
                                                                    <input type="number"  value="{{$post->size}}"  class="form-control  input-circle" name="size" placeholder="size">
                                                                </div>
                                                            </div>
                                                            <!--year_of_build-->
                                                            <div class="form-group  ">
                                                                <label class="col-md-3 control-label">Year_Of_Build </label>
                                                                <div class="input-group col-md-6">
                                                                    <input type="date" value="{{$post->year_of_build}}" class="form-control  input-circle" name="year_of_build" placeholder="year_of_build">
                                                                </div>
                                                            </div>
                                                           <!--address-->
                                                           @foreach($AllLanguages as $one)
                                                           <div class="form-group  ">
                                                            <label class="col-md-3 control-label">{{$one->name}} Address </label>
                                                             <div class="input-group col-md-6">
                                                                    <span class="input-group-addon input-circle-left ">
                                                                        <i>{{$one->code}}</i>
                                                                    </span>
                                                                 <input value="{{@$post->address[$one->code]}}"  type="text" class="form-control input-circle-right"
                                                                  name="address[{{$one->code}}]" placeholder="Address">
                                                            </div>
                                                           </div>
                                                            @endforeach
                                                            <!--rooms-->
                                                            <div class="form-group  ">
                                                                <label class="col-md-3 control-label">Rooms </label>
                                                                <div class="input-group col-md-6">
                                                                    <input type="number" value="{{$post->rooms}}" class="form-control  input-circle" name="rooms" placeholder="rooms">
                                                                </div>
                                                            </div>
                                                            <!--badrooms-->
                                                            <div class="form-group  ">
                                                                <label class="col-md-3 control-label">Badrooms </label>
                                                                <div class="input-group col-md-6">
                                                                    <input value="{{$post->badrooms}}" type="number" class="form-control  input-circle" name="badrooms" placeholder="badrooms">
                                                                </div>
                                                            </div>
                                                            <!--garage-->
                                                            <div class="form-group  ">
                                                                <label class="col-md-3 control-label">Garage </label>
                                                                <div class="md-radio-inline">
                                                                    <div class="md-radio">
                                                                      <input value=1
                                                                      
                                                                      type="radio" id="radio1" 
                                                                       @if ($post->garage == 1 )
                                                                        checked                       
                                                                       @endif
                                                                     class="md-radiobtn" name="garage">
                                                                        <label for="radio1">
                                                                            <span class="inc"></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span>
                                                                            true
                                                                        </label>
                                                                    </div> 
                                                                    <div class="md-radio">
                                                                        <input value=0 
                                                                        @if ($post->garage == 0)
                                                                        checked                       
                                                                       @endif
                                                                        type="radio" id="radio2" class="md-radiobtn" name="garage">
                                                                          <label for="radio2">
                                                                              <span class="inc"></span>
                                                                              <span class="check"></span>
                                                                              <span class="box"></span>
                                                                              false
                                                                          </label>
                                                                      </div> 
                                                                </div>
                                                            </div>
                                                            <!--gas-->
                                                            <div class="form-group  ">
                                                                <label class="col-md-3 control-label">Gas </label>
                                                                <div class="md-radio-inline">
                                                                    <div class="md-radio">
                                                                      <input value=1 

                                                                      @if ($post->gas == 1 )
                                                                      checked                       
                                                                     @endif
                                                                      
                                                                      type="radio" id="radio3" class="md-radiobtn" name="gas">
                                                                        <label for="radio3">
                                                                            <span class="inc"></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span>
                                                                            true
                                                                        </label>
                                                                    </div> 
                                                                    <div class="md-radio">
                                                                        <input value=0 

                                                                      @if ($post->gas == 0 )
                                                                      checked                       
                                                                     @endif
                                                                      

                                                                        type="radio" id="radio4" class="md-radiobtn" name="gas">
                                                                          <label for="radio4">
                                                                              <span class="inc"></span>
                                                                              <span class="check"></span>
                                                                              <span class="box"></span>
                                                                              false
                                                                          </label>
                                                                      </div> 
                                                                </div>
                                                            </div> 
                                                            <!--evelador-->
                                                            <div class="form-group  ">
                                                                <label class="col-md-3 control-label">Evelador </label>
                                                                <div class="md-radio-inline">
                                                                    <div class="md-radio">
                                                                      <input value=1 
                                                                      
                                                                      
                                                                      @if ($post->evelador == 1 )
                                                                      checked                       
                                                                     @endif
                                                                      
                                                                      type="radio" id="radio5" class="md-radiobtn" name="evelador">
                                                                        <label for="radio5">
                                                                            <span class="inc"></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span>
                                                                            true
                                                                        </label>
                                                                    </div> 
                                                                    <div class="md-radio">
                                                                        <input value=0 
                                                                        
                                                                        @if ($post->evelador == 0 )
                                                                      checked                       
                                                                      @endif

                                                                        
                                                                        type="radio" id="radio6" class="md-radiobtn" name="evelador">
                                                                          <label for="radio6">
                                                                              <span class="inc"></span>
                                                                              <span class="check"></span>
                                                                              <span class="box"></span>
                                                                              false
                                                                          </label>
                                                                      </div> 
                                                                </div>
                                                            </div> 
                                                            <!--floor-->
                                                            <div class="form-group  ">
                                                                <label class="col-md-3 control-label">Floor </label>
                                                                <div class="input-group col-md-4">
                                                                    <input value="{{$post->floor}}" type="number" class="form-control  input-circle" name="floor" placeholder="floor">
                                                                </div>
                                                            </div>
                                                            <!--Hot-->
                                                            <div class="form-group  ">
                                                                <label class="col-md-3 control-label">Hot </label>
                                                                <div class="md-radio-inline">
                                                                    <div class="md-radio">
                                                                      <input value=1 

                                                                      @if ($post->hot == 1 )
                                                                      checked                       
                                                                      @endif
                                                                      
                                                                      type="radio" id="radio7" class="md-radiobtn" name="hot">
                                                                        <label for="radio7">
                                                                            <span class="inc"></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span>
                                                                            true
                                                                        </label>
                                                                    </div> 
                                                                    <div class="md-radio">
                                                                        <input value=0

                                                                        @if ($post->hot == 0 )
                                                                        checked                       
                                                                        @endif  
                                                                        type="radio" id="radio8" class="md-radiobtn" name="hot">
                                                                          <label for="radio8">
                                                                              <span class="inc"></span>
                                                                              <span class="check"></span>
                                                                              <span class="box"></span>
                                                                              false
                                                                          </label>
                                                                      </div> 
                                                                </div>
                                                            </div> 
                                                            <!--image-->
                                                            <div class="form-group  ">
                                                                <label class="col-md-3 control-label">Image </label>
                                                                <div class="input-group col-md-4">
                                                                    <input type="file" class="form-control  input-circle" name="image" placeholder="image">
                                                                </div>
                                                            </div>
                                                    </div> 
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn btn-circle green">Edit</button>
                                                                <a href="{{route('posts.index')}}" class="btn btn-circle btn-info btn-md">Back</a>
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
