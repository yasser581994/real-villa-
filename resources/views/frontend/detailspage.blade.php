@extends('layouts.app')
@section('content')

<!--=================================
Breadcrumb -->
<div class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="{{route('index' , [$lang])}}"> <i class="fas fa-home"></i> </a></li>
            <li class="breadcrumb-item"> <i class="fas fa-chevron-right"></i>{{$page->name[$lang]}}</li>
            <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> {{$page2->name[$lang]}}</span></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!--=================================
  Breadcrumb -->
  
  <div class="wrapper">
    <!--=================================
    Property Detail -->
    <section class="space-pt">
      <div class="container">
        <div class="row">
         <div class="col-lg-4 mb-5 mb-lg-0 order-lg-2">
            <div class="sticky-top">
              <div class="mb-4">
              <h3>{{$page2->name[$lang]}}</h3>
                <span class="d-block mb-3"><i class="fas fa-calendar-alt fa-xs pr-2"></i>{{$post->address[$lang]}}</span>
              <span class="price font-xll text-primary d-block">EGP:{{number_format($post->price)}}</span>
                <ul class="property-detail-meta list-unstyled ">
                  <li><a href="#"> <i class="far fa-calendar-alt text-warning pr-2"></i>{{$post->created_at->diffForHumans()}}</a></li>
                </ul>
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox_yxiy"></div>
            
              </div>
            </div>
          </div>
            <!--image-->
            <div class="col-lg-8 order-lg-1">
              <div class="property-detail-img popup-gallery">
                <div class="owl-carousel" data-animateOut="fadeOut" data-nav-arrow="true" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1" data-space="0">
                  @foreach ($post->galleries as $photo)
                  <div class="item">
                    <a class="portfolio-img"><img class="img-fluid" src="{{url('storage/'.$photo->image)}}"></a>
                  </div>
                  @endforeach
                </div>
              </div>
            <hr>
            <!--details-->
            <div class="property-info mt-5">
              <div class="row">
                <div class="col-sm-3 mb-3 mb-sm-0">
                  <h5>@lang('app.Property details')</h5>
                </div>
                <div class="col-sm-9">
                  <div class="row mb-3">
                    <div class="col-sm-4">
                      <ul class="property-list list-unstyled">
                        <li><b>@lang('app.Post ID'):</b>{{$post->id}}</li>
                        <li><b>@lang('app.Price'):</b>${{number_format($post->price)}}</li>
                        <li><b>@lang('app.Room'):</b>{{$post->rooms}}</li>
                      </ul>
                    </div>
                    <div class="col-sm-4">
                      <ul class="property-list list-unstyled">
                      <li><b>@lang('app.Garage'):</b>{{$post->garage}}</li>
                      <li><b>@lang('app.Number Of Floors'):</b>{{$post->number_of_floors}}</li>
                      <li><b>@lang('app.Number Of Flats'):</b>{{$post->number_of_flats}}</li>
                      </ul>
                    </div>

                      <div class="col-sm-4">
                      <ul class="property-list list-unstyled">
                      <li><b>@lang('app.Siza'):</b>{{$post->size}}</li>
                      <li><b>@lang('app.Badrooms'):</b>{{$post->badrooms}}</li>
                      <li><b>@lang('app.Price Metter'):</b>{{number_format($post->price_metter)}}</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                <!--desc-->
            <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
            <div class="property-description">
              <div class="row">
                <div class="col-sm-3 mb-3 mb-sm-0">
                  <h5>@lang('app.Description')</h5>
                </div>
                <div class="col-sm-9">
                {!! $post->content[$lang] !!}
                </div>
              </div>
            </div>
                <!--Address-->
            <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
            <div class="property-address">
              <div class="row">
                <div class="col-sm-3 mb-3 mb-sm-0">
                  <h5>@lang('app.Address')</h5>
                </div>
                <div class="col-sm-9">
                  <div class="row">
                    <div class="col-sm-6">
                      <ul class="property-list list-unstyled mb-0">
                        <li><b>@lang('app.Address'):{{$post->address[$lang]}}</li>
                        <li><b>@lang('app.Country'):</b>@lang('app.Egypt')</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>

                <!--form-->
            <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">

            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            
            <div class="property-schedule">
              <div class="row">
                <div class="col-sm-3 mb-3 mb-sm-0">
                  <h5>@lang('app.Schedule a tour')</h5>
                </div>
                <div class="col-sm-9">
                  <form action="{{route('reservations.store',$lang)}}" method="POST">
                    @csrf
                    <div class="form-row">
                     
                      <div class="form-group col-sm-6 datetimepickers">
                        <div class="input-group date" id="datetimepicker-01" data-target-input="nearest">
                          <input type="text" name="date" class="form-control datetimepicker-input" placeholder="@lang('app.Date')" data-target="#datetimepicker-01">
                          <div class="input-group-append" data-target="#datetimepicker-01" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-sm-6 datetimepickers">
                        <div class="input-group date" id="datetimepicker-03" data-target-input="nearest">
                          <input type="text" name="time" class="form-control datetimepicker-input" placeholder="@lang('app.Time')" data-target="#datetimepicker-03"/>
                          <div class="input-group-append" data-target="#datetimepicker-03" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-sm-12">
                        <input type="text" name="name" class="form-control" placeholder="@lang('app.Name')">
                      </div>
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                      <div class="form-group col-sm-12">
                        <input type="email" name="email" class="form-control" placeholder="@lang('app.Email')">
                      </div>
                      <div class="form-group col-sm-12">
                        <input type="Text" name="phone" class="form-control" placeholder="@lang('app.Phone')">
                      </div>
                      <div class="form-group col-sm-12">
                        <textarea class="form-control" name="massage" rows="4" placeholder="@lang('app.Message')"></textarea>
                      </div>
                      <div class="form-group col-sm-12">
                        <button type="submit" class="btn btn-primary">@lang('app.Submit')</button>
                      </div>
                      <div class="col-sm-6"></div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
          <hr>
    </section>

@endsection