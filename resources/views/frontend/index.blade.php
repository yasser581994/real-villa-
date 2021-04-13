@extends('layouts.app')
@section('content')


<!--=================================
banner -->
<section class="clearfix">
  <div id="slider" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      @foreach($banners as $key => $banner)
      <li data-target="#slider" data-slide-to="{{$key}}" class="{{$key == 0 ? 'active' : ''}}"></li>
      @endforeach
    </ol>
    <div class="carousel-inner">
    @foreach ($banners as $key => $banner)
      <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
        <img class="img-fluid" src="{{url('storage/'.$banner->banner)}}" alt="{{$banner->name[$lang]}}">
        <div class="slider-content">
          <div class="container">
            <div class="row">
              <div class="col-lg-8 col-md-10">
                  <h1 class="text-white mb-3 animated-08">{{$banner->name[$lang]}}</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
     </div>
  </div>
</section>
  
  <!--=================================
  banner -->
  
  <!--=================================
  feature -->
  <section class="space-ptb">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-sm-6 mb-4 mb-lg-0">
          <div class="bg-light p-4 py-5 text-center h-100">
            <i class="flaticon-agent font-xlll text-primary mb-4"></i>
            <h5 class="mb-3">@lang('app.A shopper reaches out')</h5>
            <p class="mb-0">@lang('app.The price is something not necessarily defined as financial. It could be time.')</p>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-4 mb-lg-0">
          <div class="bg-light p-4 py-5 text-center h-100">
            <i class="flaticon-like font-xlll text-primary mb-4"></i>
            <h5 class="mb-3">@lang('app.We verify the lead')</h5>
            <p class="mb-0">@lang('app.This is perhaps the single biggest obstacle that all of us must overcome.')</p>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-4 mb-sm-0">
          <div class="bg-light p-4 py-5 text-center h-100">
            <i class="flaticon-room-key-1 font-xlll text-primary mb-4"></i>
            <h5 class="mb-3">@lang('app.You connect live')</h5>
            <p class="mb-0">@lang('app.One of the main areas that I work on with my clients is shedding these.')</p>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="bg-light p-4 py-5 text-center h-100">
            <i class="flaticon-house-key-1 font-xlll text-primary mb-4"></i>
            <h5 class="mb-3">@lang('app.Convert more deals')</h5>
            <p class="mb-0">@lang('app.It is truly amazing the damage that we, as parents, can inflict on our children')</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=================================
  feature -->
  
    <!--=================================
    Featured properties-->
    <section class="space-pb">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="section-title text-center">
              <h2>@lang('app.Newly listed properties')</h2>
              <p>@lang('app.Find your dream home from our Newly added properties')</p>
            </div>
          </div>
        </div>
        <div class="row">
          @foreach ($threeposts as $onepost)
          <?php
           $slug1 = App\Models\Page::where('id' , $onepost->page->page_id)->value('slug'); ?>
          <div class="col-md-4">
            <div class="property-image bg-overlay-gradient-04">
              <img class="img-fluid" src="{{url('storage/'.$onepost->image)}}" alt="{{$onepost->name[$lang]}}">
            </div>
            <div class="property-details">
              <div class="property-details-inner">
                <a class="property-link" href="{{route('details.page' ,['lang' => $lang , 'slug1' => $slug1 ,'slug2' => $onepost->page->slug , 'slug3' => $onepost->slug])}}"><h5 class="property-title">{{$onepost->name[$lang]}}</h5></a>
                <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>{{$onepost->address[$lang]}}</span>
                <span class="property-agent-date"><i class="far fa-clock fa-md"></i>{{$onepost->created_at->diffForHumans()}}</span>
                  <div class="property-price">{{number_format($onepost->price)}}<span> /EGP</span> </div>
                    <ul class="property-info list-unstyled d-flex">
                      <li class="flex-fill property-bed"><i class="fas fa-bed"></i>@lang('app.Badroom')<span>{{$onepost->badrooms}}</span></li>
                      <li class="flex-fill property-bath"><i class="fas fa-home"></i>@lang('app.Room')<span>{{$onepost->rooms}}</span></li>
                      <li class="flex-fill property-bath"><i class="fas fa-building"></i>@lang('app.Floor')<span>{{$onepost->floor}}</span></li>
                    </ul>
                  </div>
                    <div class="property-btn">
                      <a class="property-link" href="{{route('details.page' ,['lang' => $lang , 'slug1' => $slug1 ,'slug2' => $onepost->page->slug , 'slug3' => $onepost->slug])}}">@lang('app.See Details')</a>
                    </div>
              </div>
            </div>
          @endforeach

        </div>
      </div>
    </section>
    <!--=================================
    Featured properties-->


    
  
    
@endsection