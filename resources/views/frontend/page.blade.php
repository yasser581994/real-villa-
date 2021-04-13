@extends('layouts.app')
@section('content')

<div class="bg-light">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="{{route('index' , [$lang])}}"> <i class="fas fa-home"></i>@lang('app.Home')</a></li>
          <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> {{$page->name[$lang]}} </span></li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--=================================
breadcrumb -->
@if ($page->id == 4 )


<!--===============================
Contact -->
<section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title">
          <h2>@lang('app.Contact Us')</h2>
        </div>
      </div>
    </div>
    <div class="row align-items-center">
      <div class="col-lg-5">
        <div class="contact-address bg-light p-4">
          @foreach ($settings as $setting)
          <div class="d-flex mb-3">
                <div class="contact-address-icon">
                  <i class="{{$setting->icon}}"></i>
                </div>
                <div class="ml-3">
                  <h6>{{$setting->type}}</h6>
                  <p>{{$setting->text[$lang]}}</p>
                </div>
          </div>
          @endforeach
        </div>
      </div>
      
      <div class="col-lg-7 mt-4 mt-lg-0">
        <div class="contact-form">
          <h4 class="mb-4">@lang('app.Please complete the contact form')</h4>
                 
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
          
          <form action="{{route('messages.store' , $lang)}}" method="POST">
            @csrf
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" class="form-control" name="name" id="name" placeholder="@lang('app.Your name')">
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="@lang('app.Your email')">
              </div>
              <div class="form-group col-md-6">
                <input type="text" class="form-control" name="phone" id="phone" placeholder="@lang('app.Your phone')">
              </div>
              <div class="form-group col-md-6">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="@lang('app.Subject')">
              </div>
              <div class="form-group col-md-12">
                <textarea class="form-control" name="desc" rows="4" placeholder="@lang('app.Your message')"></textarea>
              </div>
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary">@lang('app.Create')</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
Contact -->



@else
    


<!--=================================
about -->
<section class="space-ptb bg-holder" style="background-image: url('{{ asset('frontend/images/pattern-bg.html)')}}');">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-lg-12">
      <h4 class=" mb-4 px-6">{{$aboutpage->content[$lang]}}</h4>
      </div>
    </div>
  </div>
</section>
<!--=================================
about -->

<!--=================================
testimonial -->
<section class="testimonial-main bg-holder" style="background-image: url('{{ asset('frontend/images/bg/02.jpg')}}');">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="owl-carousel owl-dots-bottom-left" data-nav-dots="true" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1" data-space="0">
          <div class="item">
            <div class="testimonial">
              <div class="testimonial-content">
                <p><i class="quotes">"</i>@lang('app.Thank you Martin for selling our apartment. We are delighted with the result. I can highly recommend Martin to anyone seeking a truly professional Realtor.')</p>
              </div>
              <div class="testimonial-name">
                <h6 class="text-primary mb-1">@lang('app.Lisa & Graeme')</h6>
                <span>@lang('app.Hamilton Rd. Willoughby')</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial">
              <div class="testimonial-content">
                <p><i class="quotes">"</i>@lang('app.Oliver always had a smile and was so quick to answer and get the job done.  I will definitely suggest you to anyone we know who is selling or wanting to purchase a home. He is the best!')</p>
              </div>
              <div class="testimonial-name">
                <h6 class="text-primary mb-1">@lang('app.Jessica Alex')</h6>
                <span>@lang('app.West Division Street')</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
testimonial -->

<br>


@endif

@endsection