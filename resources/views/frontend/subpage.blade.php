@extends('layouts.app')
@section('content')
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
        <!--yayayayaya-->
        @foreach ($posts as $onepost)
        <?php
         $slug1 = App\Models\Page::where('id' , $onepost->page->page_id)->value('slug'); ?>
        <div class="col-md-4">
          <div class="property-image bg-overlay-gradient-04">
            <img class="img-fluid" src="{{url('storage/'.$onepost->image)}}" width="350" height="300" alt="{{$onepost->name[$lang]}}">
          </div>
          <div class="property-details">
            <div class="property-details-inner">
              <a class="property-link" href="{{route('details.page' ,['lang' => $lang , 'slug1' => $slug1 ,'slug2' => $onepost->page->slug , 'slug3' => $onepost->slug])}}"> <h5 class="property-title">{{$onepost->name[$lang]}}</h5>
              </a>
              <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>{{$onepost->address[$lang]}}</span>
              <span class="property-agent-date"><i class="far fa-clock fa-md"></i>{{$onepost->created_at->diffForHumans()}}</span>
                <div class="property-price">{{number_format($onepost->price)}}<span> /EGP</span> </div>
                  <ul class="property-info list-unstyled d-flex">
                    <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Badroom<span>{{$onepost->badrooms}}</span></li>
                    <li class="flex-fill property-bath"><i class="fas fa-home"></i>Room<span>{{$onepost->rooms}}</span></li>
                    <li class="flex-fill property-bath"><i class="fas fa-building"></i>Floor<span>{{$onepost->floor}}</span></li>
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

@endsection