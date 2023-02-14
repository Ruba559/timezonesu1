<!DOCTYPE html>
<html lang="en">

<head>
    @php
    $locale = app()->getLocale();
 
@endphp
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{isset($title) ? $title  : setting('site.title')}}</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <meta name="description" content="{{isset($desc) ? $desc  : setting('site.description')}}">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        media="screen" />

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset($locale =="ar" ? 'css/main-rtl.css' :'css/main.css' )}}">
    <link rel="stylesheet" href="{{asset('css/swiper.css')}}">
    <script src="{{asset('js/main.js')}}"></script>

    @livewireStyles

    @yield('head')
    @include('layouts.bottommenu')

    <style>
        .top-nav{
            list-style: none;
        }
        .top-nav li{
            float: left;
        }
    </style>
</head>

<body {{$locale =="ar" ? 'dir=rtl' : '' }} >
    <div  class="search-nav text-white">
        <div class="content">
            <a  class="closebtn" >&times;</a>
            @livewire('search-box')
        
        </div>
      </div>
    <div class="container-fluid px-0 fixed-top">
        <div class="row bg-white justify-content-center align-items-center">
            <div class="col-md-4 py-2">
            </div>
            <div class="col-md-4 py-2">
                <a class="d-block mx-auto " href="{{route('homepage')}}"><img class="img-fluid d-block mx-auto" width="200px"
                    src="{{asset('images/logo.png')}}" alt=""></a>
            </div>
            <div class="col-md-4 d-none d-md-block">
                <ul class="top-nav {{$locale=="ar" ? 'mr-auto' : 'ml-auto'}} mt-2 mt-lg-0">

                    <li class="nav-item"> <a class="nav-link search-icon" ><span class="fa fa-search"></span></a></li>
        
                    
                        <li class="nav-item">
                           @livewire('cart-icon')
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="#"><span class="fa fa-heart"></span></a></li>
                        
                        <li class="nav-item"> <div class="nav-link dropdown" href=""><span class="fa fa-language dropdown-toggle" type="button" data-toggle="dropdown"></span><ul class="dropdown-menu">
                            <li><a href="{{route('switchlang','ar')}}">العربية</a></li>
                            <li><a href="{{route('switchlang','en')}}">English</a></li>
                            <li><a href="{{route('switchlang','ku')}}">Kurdish</a></li>
                          </ul></div></li>
                         
                        <li class="nav-item"> <a class="nav-link" href="{{route('profile')}}"><span class="fa fa-user-circle-o"></span></a></li>
                      
                    </ul>
            </div>
        </div>
        <nav class="navbar bg-blue navbar-expand " style="height: 50px">
        
                <ul class="navbar-nav mx-auto second-nav">
                    <li class="nav-item active"><a href="{{route('homepage')}}">@lang('master.home')</a></li>
                    <li class="nav-item dropdown"> 
                            <a id="my-dropdown" class=" dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('master.brands')</a>
                            <ul class="dropdown-menu" style="z-index: 999999">
                                @foreach ($brands as $item)
                                    <a href="{{$item->slug !='' ? route('brand',$item->slug) : ''}}" class="dropdown-item">
                                        <div class="row align-items-center flex-nowrap">
                                            <img class="img-fluid"  width="50px" src="{{asset('storage/'.$item->image)}}" alt="{{$item->name}}">
                                             <p class="text-blue mx-2 mont-font  my-auto">{{$item->name}}</p>
                                        </div>
                                    </a>
                                @endforeach
            
                             </ul>
                    </li>
                    <li class="nav-item dropdown"> 
                        <a id="my-dropdown" class=" dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('master.categories')</a>
                        <ul class="dropdown-menu" style="z-index: 999999">
                            @foreach ($categories as $item)
                                <a href="{{$item->slug !='' ? route('category',$item->slug) : '' }}" class="dropdown-item">
                                    <div class="row align-items-center flex-nowrap">
                                        <img class="img-fluid"  width="50px" src="{{asset('storage/'.$item->image)}}" alt="{{$item->name}}">
                                         <p class="text-blue mx-2 mont-font  my-auto">{{$item->getTranslatedAttribute('name')}}</p>
                                    </div>
                                </a>
                            @endforeach
        
                         </ul>
                </li>
                <li class="nav-item"><a href="{{route('homepage')}}">@lang('master.big_deals')</a></li>
                </ul>
            
        </nav>
        
    </div>
   

    @yield('body')


    <footer class="container-fluid">
        <div class="row justify-content-start align-items-center">
            <div class="col-md-3 col-12 text-center p-md-2 p-5">
                <img src="{{asset('images/logo-white.png')}}" class="img-fluid" width="50%" alt="">
                <p class="mt-3">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                </p>
            </div>
            <div class="col-md-3 col-6 align-self-start">
                <ul>
                 @lang('master.quick_links')
                    <li><a href="{{route('homepage')}}">@lang('master.home')</a></li>
                    <li><a href="">@lang('master.new_arrivals')</a></li>
                    <li><a href="">@lang('master.big_deals')</a></li>
                    <li><a href="">@lang('master.categories')</a></li>
                    <li><a href="">@lang('master.top_viewed')</a></li>

                    
                </ul>
            </div>
            <div class="col-md-3 col-6 align-self-start">
                <ul>
                 @lang('master.legal')
                    <li><a href="{{route('legals')}}"> @lang('master.privacy_policy')</a></li>
                    <li><a href="">@lang('master.terms_condetions')</a></li>
                    <li><a href="">@lang('master.about_us')</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-12 ">
                <div class="text-center">
                    <p class="my-2">@lang('master.find_us')</p>
                    <div class="social-links text-white">
                        <a href=""><span class="fa fa-facebook fa-2x mx-2"></span></a>
                        <a href=""><span class="fa fa-whatsapp fa-2x mx-2"></span></a>
                        <a href=""><span class="fa fa-envelope-o fa-2x mx-2"></span></a>
                    </div>
                   

                </div>
            </div>
        <div class="col-12 " style="height: 50px">
            
        </div>
        </div>
    </footer>
    @livewireScripts
    <script src="{{asset('js/swiper.js')}}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            easing: "ease"
        });
    </script>
        @yield('script')
      
        <script type="text/javascript">
            $(document).ready(function() {
                $(".dropdown").hover(function() {
                    var dropdownMenu = 
                        $(this).children(".dropdown-menu");
                    if (dropdownMenu.is(":visible")) {
                        dropdownMenu.parent().toggleClass("open");
                    }
                });
            });
            $('.closebtn').click(function(e){
                e.preventDefault();
                $('.search-nav').removeClass('oppend');
            });
            
            $('.search-icon').click(function(e){
                e.preventDefault();
                $('.search-nav').toggleClass('oppend');
            });
           
        </script>
</body>

</html>