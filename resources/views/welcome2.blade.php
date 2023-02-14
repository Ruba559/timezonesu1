<!DOCTYPE html>
<html lang="en">

<head>
    @php
        $locale = app()->getLocale();
        $categories = \App\Models\Category::all();
        $brands = \App\Models\Brand::all();
    @endphp
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($title) ? $title : setting('site.title') }}</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <meta name="description" content="{{ isset($desc) ? $desc : setting('site.description') }}">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.slim.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        media="screen" />

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset($locale == 'ar' ? 'css/main-rtl.css' : 'css/main2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper.css') }}">
    <script src="{{ asset('js/main.js') }}"></script>

@livewireStyles

</head>

<body>
    <nav class="navbar navbar-expand-sm fixed-top {{isset($nav_bl)? 'bg-black' : ''}}">
        <div class="container-fluid">
            <a class="navbar-brand"><img class="img-fluid" width="180px" src="{{ asset('images2/logo-gold.png') }}"
                    alt="" /></a>
            <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="my-nav" class="collapse navbar-collapse mx-auto ">
                <ul class="navbar-nav first-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">HOME <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <div class="nav-link dropdown" href=""><span class=" dropdown-toggle" type="button" data-toggle="dropdown">BRANDS</span><ul class="dropdown-menu">
                           @foreach ($brands as $item)
                               <li class="dropdown-item">
                                <a class="nav-link" href="">

                                <div class="row align-items-center flex-nowrap">
                                    <img class="img-fluid" width="50px" src="{{asset('storage/'.$item->image)}}" alt="">
                                    <p class="align-self-center my-auto">{{$item->name}}</p>
                                </div>
                                </a>
                               </li>
                           @endforeach
                          </ul></div>
                       
                    </li>
                    <li class="nav-item ">
                        <div class="nav-link dropdown" href=""><span class=" dropdown-toggle" type="button" data-toggle="dropdown">CATEGORIES</span><ul class="dropdown-menu">
                           @foreach ($categories as $item)
                               <li class="dropdown-item">
                                <a class="nav-link" href="">

                                <div class="row align-items-center flex-nowrap">
                                    <img class="img-fluid" width="50px" src="{{asset('storage/'.$item->image)}}" alt="">
                                    <p class="align-self-center my-auto">{{$item->name}}</p>
                                </div>
                                </a>
                               </li>
                           @endforeach
                          </ul></div>
                       
                    </li>
                   
                    <li class="nav-item ">
                        <a class="nav-link" href="#">BIG DEALS <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <ul class="ml-auto navbar-nav"> 
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
    </nav>
    <section class=" header">
        <div class="overlay1"></div>
        <img src="{{ asset('images2/banner1.jpg') }}" alt="banner">
        <div class="caption">
            <h1>TOP WATCHES MODELS <br>
                <small>in one place</small></h1>

            <a href="#start" class="anchor-c btn"><span>EXPLORE NOW</span></a>
        </div>
        <div class="overlay2"></div>
    </section>

    <section class="container-fluid bg-white mt-5">
        <div class="row p-md-5 p-5">
            <div class="col-12">
                <div class="row justify-content-between align-items-center">
                    <h2 class="underline-text text-blue">@lang('welcome.top_brands')</h2>
                    <a class="text-grey">@lang('welcome.explore_brands')</a>
                </div>
            </div>
            <div class="col-12 p-md-5 p-2">
                <div class="swiper swiper-container brands-swiper ">
                    <div class="swiper-wrapper ">
                        @foreach ($brands as $item)
                            <div class="swiper-slide">
                                <img class="img-fluid" width="100%" src="{{ asset('storage/' . $item->image) }}"
                                    alt="{{ $item->name }}">
                                <p class="text-center blue-text font-weight-bold">{{ $item->name }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section  id="start" class="container-fluid bg-light">
        <div class="row p-md-5 p-2 justify-content-center ">
            <div class="col-md-6 col-11 ">
                <div class="for-container ">
                    <div class="overlay2"></div>
                    <img class="img-fluid" src="{{ asset('images2/men.jpg') }}" alt="">
                    <div class="caption">
                        <h3 data-aos="fade-up">WATCHES FOR HEM</h3>
                        <a data-aos="fade-left" href="" class="btn">Explore Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-11">
                <div class="for-container ">
                    <div class="overlay2"></div>
                    <img class="img-fluid" src="{{ asset('images2/women.jpg') }}" alt="">
                    <div class="caption">
                        <h3 data-aos="fade-up">WATCHES FOR HER</h3>
                        <a  data-aos="fade-left" href="" class="btn">Explore Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- New Arrivals -->
<div class=" container-fluid bg-white">
    <div class="row p-md-5 p-5">
        <div class="col-12  mb-5">
            <div class="row justify-content-between align-items-center">
                <h2 class="underline-text text-blue">@lang('welcome.new_arrivals')</h2>
                <a class="text-grey">@lang('welcome.explore_more')</a>
            </div>
        </div>
        <div class="col-12">
            <div class="row p-2">
                @foreach($newProducts as $item)
               
                @include('components.products.item1' , [$item])
                  @endforeach
                
            </div>
        </div>
    </div>
</div>
<!--End New Arrivals -->


<div class=" container-fluid bg-white">
    <div class="row p-md-5 p-5">
        <div class="col-12 mb-5">
            <div class="row justify-content-between align-items-center">
                <h2 class="underline-text text-blue">@lang('welcome.top_sales')</h2>
                <a class="text-grey">@lang('welcome.explore_more')</a>
            </div>
        </div>
        <div class="col-12">
            <div class="row p-2">
                @if($topSalesProducts)
                @foreach($topSalesProducts as $item)
                @include('components.products.item1' , ['item'=>$item->product])
                @endforeach
               @endif
               
              
            </div>
        </div>
    </div>
</div>


<footer class="container-fluid">
    <div class="row justify-content-start align-items-center">
        <div class="col-md-3 col-12 text-center p-md-2 p-5">
            <img src="{{asset('images2/logo-gold.png')}}" class="img-fluid" width="50%" alt="">
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
                <li><a href=""> @lang('master.privacy_policy')</a></li>
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
    <div class="col12 d-block d-md-none d-sm-block" style="height: 50px">
        
    </div>
    </div>
</footer>







    <script src="{{ asset('js/swiper.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('js/hash.js') }}"></script>
    <script>
        $(document).ready(function() {
            checkscroll();
            $(window).scroll(function() {
                checkscroll();
            });
            $('.fa-heart-o').parent().click(function(e){
                e.preventDefault();
                $(this).find('span').toggleClass('fa-heart-o');
                $(this).find('span').toggleClass('fa-heart');
            });

        });

        function checkscroll() {
            var scroll = $(window).scrollTop();
            var wwidth = $(window).width();


            if (scroll > 100) {
                $('.navbar').addClass('bg-black border-gold');
            } else {
                $('.navbar').removeClass('bg-black border-gold');
            }

        };
    </script>
      <script>
        AOS.init({
            easing: "ease-out"
        });
    </script>
    @livewireScripts
</body>

</html>
