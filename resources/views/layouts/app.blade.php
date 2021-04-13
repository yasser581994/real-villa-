<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from themes.potenzaglobalsolutions.com/html/real-villa/index-slider.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Feb 2020 00:15:13 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Real Villa - Real Estate HTML5 Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Real Villa - Real Estate HTML5 Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed:300,500,600,700%7CRoboto:300,400,500,700">

    <!-- CSS Global Compulsory (Do not remove)-->
    <link rel="stylesheet" href="{{url('frontend/css/font-awesome/all.min.css')}}" />
    <link rel="stylesheet" href="{{url('frontend/css/flaticon/flaticon.css')}}" />
    <link rel="stylesheet" href=" {{url('frontend/css/bootstrap/bootstrap.min.css')}}" />

    <!--<link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">-->

    <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature)-->
    <link rel="stylesheet" href="{{url('frontend/css/select2/select2.css')}}" />
    <link rel="stylesheet" href="{{url('frontend/css/range-slider/ion.rangeSlider.css')}}" />
    <link rel="stylesheet" href="{{url('frontend/assets/css/owl-carousel/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{url('frontend/css/magnific-popup/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{url('frontend/css/datetimepicker/datetimepicker.min.css')}}" />
    <link rel="stylesheet" href="{{url('frontend/css/slick/slick-theme.css')}}" />


    @if (Request::segment(1) ==='ar')
      <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">
    @elseif(Request::segment(1) ==='en')
      <link rel="stylesheet" type="text/css" href="{{url('frontend/css/animate/animate.min.css')}}">
    @endif

    <!-- Template Style -->
    <link rel="stylesheet" href="{{url('frontend/css/style.css')}}" />

  </head>
  <body dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}">
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f608c6e925f2869"></script>

<!--=================================
header -->
<header class="header">
  <div class="topbar">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="d-block d-md-flex align-items-center text-center">
            <div class="mr-3 d-inline-block">
              <a href="tel:1-800-555-1234"><i class="fa fa-phone mr-2 fa fa-flip-horizontal"></i>1-800-555-1234 </a>
            </div>
            <div class="mr-auto d-inline-block">
              <span class="mr-2 text-white">Get App:</span>
              <a class="pr-1" href="#"><i class="fab fa-android"></i></a>
              <a href="#"><i class="fab fa-apple"></i></a>
            </div>
            <div class="dropdown d-inline-block pl-2 pl-md-0">
              <a class="dropdown-toggle" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Language<i class="fas fa-chevron-down pl-2"></i>
              </a>
                <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="/ar{{$url}}">Arabic</a>
                <a class="dropdown-item" href="/en{{$url}}">English</a>
                </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-light bg-white navbar-static-top navbar-expand-lg header-sticky">
      <div class="container-fluid">
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target=".navbar-collapse"><i class="fas fa-align-left"></i></button>
        <a class="navbar-brand" href="{{route('index',['lang' => $lang])}}">
          <img class="img-fluid" src="{{url('frontend/images/logo.svg')}}" alt="logo">
        </a>
        <div class="navbar-collapse collapse justify-content-center">
          <ul class="nav navbar-nav">
            @foreach ($header_pages as $key => $page)
                <li class="nav-item dropdown">
                  <a class="nav-link {{$key == 0 ? 'active' : ''}}" href="{{route('page' ,['lang' => $lang , 'slug' => $page->slug  ])}}"  @if (count($page->childs) > 0) role="button" data-toggle="dropdown"   aria-haspopup="true" aria-expanded="false"  @endif>{{$page->name[$lang]}}
                    @if (count($page->childs) > 0)
                      <i class="fas fa-chevron-down fa-xs"></i>
                    @endif
                  </a>
                  @if (count($page->childs) > 0)
                    <ul class="dropdown-menu">
                      @foreach ($page->childs as $key => $p)
                        <li>
                          <a class="dropdown-item" href="{{route('sub.page' ,['lang' => $lang , 'slug1' =>$page->slug  ,'slug2' => $p->slug ])}}">{{$p->name[$lang]}}</a>
                        </li>
                      @endforeach
                    </ul>
                  @endif
                </li> 
            @endforeach
          </ul>

        </div>
      </div>
  </nav>
</header>
<!--=================================
 header -->

@yield('content')
<!--=================================
footer-->
<footer class="footer bg-dark space-pt">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="footer-contact-info">
            <h5 class="text-primary mb-4"> @lang('app.About real villa')</h5>
          <p class="text-white mb-4"></p>
            <ul class="list-unstyled mb-0">
              @foreach ($settings as $setting)
            <li> <b> <i class="{{$setting->icon}}"></i></b><span>{{$setting->text[$lang]}}</span> </li> 
              @endforeach
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
          <div class="footer-link">
            <h5 class="text-primary mb-4"> @lang('app.links')</h5>
            <ul class="list-unstyled mb-0">
              @foreach ($footer_pages as $key => $footer_page)
                <li class="nav-item"  >
                  <a class="nav-link {{$key == 0 ? 'active' : ''}}" href="{{route('page' ,['lang' => $lang , 'slug' => $footer_page->slug  ])}}"  @if (count($footer_page->childs) > 0)  role="button" data-toggle="dropdown"   aria-haspopup="true" aria-expanded="false"  @endif>{{$footer_page->name[$lang]}}</a>     
                </li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
          <div class="footer-recent-List">
            <h5 class="text-primary mb-4">@lang('app.Recently listed properties')</h5>
            <ul class="list-unstyled mb-0">

              @foreach ($twoposts as $twopost)
              <li>
                <div class="footer-recent-list-item">
                  <?php
                  $slug1 = App\Models\Page::where('id' , $twopost->page->page_id)->value('slug'); ?>
                  <img class="img-fluid" src="{{url('storage/'.$twopost->image)}}" alt="">
                  <div class="footer-recent-list-item-info">
                    <a class="property-link" href="{{route('details.page' ,['lang' => $lang , 'slug1' => $slug1 ,'slug2' => $twopost->page->slug , 'slug3' => $twopost->slug])}}"><h6 class="text-danger ">{{$twopost->name[$lang]}}</h5></a>
                  <h5 class="text-white  font-sm">{{$twopost->address[$lang]}}</h6>
                    <span class="price text-white">EGP :{{number_format($twopost->price)}}</span>
                  </div>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
          <h5 class="text-primary mb-4">@lang('app.Subscribe us')</h5>
          <div class="footer-subscribe">
            <p class="text-white">@lang('app.Sign up to our newsletter to get the latest news and offers.')</p>
            <form action="{{route('subscripe.store')}}" method="POST">
              @csrf
              <div class="form-group">
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
                <input type="email" class="form-control"name="email" placeholder="@lang('app.Enter email')">
              </div>
              <button type="submit" class="btn btn-primary btn-sm">@lang('app.Get notified')</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-4 text-center text-md-left">
            <a href="{{route('index' ,['lang' => $lang])}}"><img class="img-fluid footer-logo" src="{{url('frontend/images/logo-light.svg')}}" alt=""> </a>
          </div>
          <div class="col-md-4 text-center my-3 mt-md-0 mb-md-0">
            <a id="back-to-top" class="back-to-top" href="#"><i class="fas fa-angle-double-up"></i> </a>
          </div>
          <div class="col-md-4 text-center text-md-right">
            <p class="mb-0 text-white"> &copy;Copyright <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span>@lang('app.Real villa All Rights Reserved') </p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--=================================
  footer-->
  
  <!--=================================
  Javascript -->
  
    <!-- JS Global Compulsory (Do not remove)-->
    <script src="{{url('frontend/assets/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{url('frontend/assets/js/popper/popper.min.js')}}"></script>
    <script src="{{url('frontend/assets/js/bootstrap/bootstrap.min.js')}}"></script>
  
    <!-- Page JS Implementing Plugins (Remove the plugin script here if site does not use that feature)-->
    <script src="{{url('frontend/assets/js/jquery.appear.js')}}"></script>
    <script src="{{url('frontend/assets/js/counter/jquery.countTo.js')}}"></script>
    <script src="{{url('frontend/assets/js/select2/select2.full.js')}}"></script>
    <script src="{{url('frontend/assets/js/range-slider/ion.rangeSlider.min.js')}}"></script>
    <script src="{{url('frontend/js/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{url('frontend/assets/js/jarallax/jarallax.min.js')}}"></script>
    <script src="{{url('frontend/assets/js/jarallax/jarallax-video.min.js')}}"></script>
    <script src="{{url('frontend/js/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    <!-- Page JS Implementing Plugins (Remove the plugin script here if site does not use that feature)-->
    <script src="{{url('frontend/assets/js/slick/slick.min.js')}}"></script>
    <script src="{{url('frontend/js/datetimepicker/moment.min.js')}}"></script>
    <script src="{{url('frontend/js/datetimepicker/datetimepicker.min.js')}}"></script>

  
    <!-- Template Scripts (Do not remove)-->
    <script src="{{url('frontend/assets/js/custom.js')}}"></script>

  
  
  </body>
  
  <!-- Mirrored from themes.potenzaglobalsolutions.com/html/real-villa/index-slider.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Feb 2020 00:15:15 GMT -->
  </html>
  