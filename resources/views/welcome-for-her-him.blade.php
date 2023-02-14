@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{asset('css/product-item1.css')}}">
@endsection

@section('body')
    

<div class="container-fluid p-0">
    <h1>HI there</h1>
    <div class="swiper swiper-container banners-swiper">
        <div class="swiper-wrapper ">

          @foreach($banners as $item)
          @if($item->type == 'dynamic')
            <div class="swiper-slide banner-item">
                <div class="banner-bg"></div>
                <img data-aos="zoom-in" class="img-fluid floating-image" height="90%"
                    src="images/watches/watch.png" alt="">
                <div class="caption">

                    <h2 data-aos="fade-up">{{$item->title}}</h2>
                    <p data-aos="fade-down">{{$item->subtitle}}</p>
                    <div class="button-link" data-aos="fade-left">
                        <a href="{{$item->button_url}}">{{$item->button_text}}</a>
                    </div>

                </div>
            </div>
           @else
            <div class="swiper-slide banner-item">
                <img class="img-fluid full-image" width="100%" src="{{asset('storage/'.$item->static_image)}}" alt="">
            </div>

            @endif
            @endforeach

        </div>
        <div class="swiper-pagination swiper-pagination-banners"></div>
    </div>
</div>
<div class="container bg-white">
    <div class="row p-md-5 p-5">
        <div class="col-12">
            <div class="row justify-content-between align-items-start">
                <h2 class="underline-text text-blue">@lang('welcome.top_brands')</h2>
                <a  href="{{route('brands')}}" class="text-grey">@lang('welcome.explore_brands')</a>
            </div>
        </div>
      <div class="col-12">
            <div class="swiper swiper-container brands-swiper ">
                <div class="swiper-wrapper ">
                    @foreach($brands as $item)
                    <div class="swiper-slide">
                    <a href="{{route('brand' , $item->slug)}}">
                        <img class="img-fluid" width="100%" src="{{asset('storage/'.$item->image)}}" alt="{{$item->name}}">
                        <p class="text-center d-sm-block d-none text-grey ">{{$item->name}}</p>
                    </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
<div class="container-fluid p-0 bg-white">
    <div class="row p-0">
        <div class="col-md-6 col-12 fixed-container  p-0 bg-red">

            <div class=" fixed-image"
                style="background-image: url('images/for-her.png');background-position: 0 0;">

            </div>
            <div class="fixed-red-rect"></div>
            <div class="caption">
                <h5 data-aos="fade-up">@lang('welcome.WATCHES_FOR_HER')</h5>
                <div data-aos="fade-right">
                    <a class="btn bg-red" href="{{route('forHer')}}"><span>@lang('welcome.explore_now')</span></a>
                </div>

            </div>
        </div>

        <div class="col-md-6 col-12 ">
            <div class="row p-2">
                @foreach($womanProducts as $item)
               
                @include('components.product-item-for-gender' , [$item])
                @endforeach
            </div>
        </div>
    </div>
    <div class="row p-0 bg-bg-white">
        <div class="col-md-6 col-12 ">
            <div class="row p-2">
            @foreach($manProducts as $item)
            @include('components.product-item-for-gender' , [$item])
                @endforeach
               

            </div>
        </div>
        <div class="col-md-6 col-12 fixed-container  p-0 bg-blue">
            <div class="fixed-image"
                style="background-image: url('images/for-him.png');background-position: 100% 0">


            </div>
            <div class="fixed-blue-rect"></div>
            <div class="caption">
                <h5 data-aos="fade-up">@lang('welcome.WATCHES_FOR_HIM')</h5>
                <div data-aos="fade-right">
                    <a class="btn bg-blue"  href="{{route('forHim')}}"><span>@lang('welcome.explore_now')</span></a>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- New Arrivals -->
<div class=" container bg-light">
    <div class="row p-md-5 p-5">
        <div class="col-12  mb-5">
            <div class="row justify-content-between  align-items-start">
                <h2 class="underline-text text-blue">@lang('welcome.new_arrivals')</h2>
                <a href="{{route('newArrivals')}}" class="text-grey">@lang('welcome.explore_more')</a>
            </div>
        </div>
        <div class="col-12">
            <div class="row p-2">
                @foreach($newProducts as $item)
               
                @include('components.product-item' , [$item])
                  @endforeach
                
            </div>
        </div>
    </div>
</div>
<!--End New Arrivals -->


<!-- Top Sales -->
<div class=" container bg-white">
    <div class="row p-md-5 p-5">
        <div class="col-12 mb-5">
            <div class="row justify-content-between  align-items-start">
                <h2 class="underline-text text-blue">@lang('welcome.top_sales')</h2>
                <a href="{{route('topSales')}}" class="text-grey">@lang('welcome.explore_more')</a>
            </div>
        </div>
        <div class="col-12">
            <div class="row p-2">
                @if($topSalesProducts)
                @foreach($topSalesProducts as $item)
                @include('components.product-item' , ['item'=>$item->product])
                @endforeach
               @endif
               
              
            </div>
        </div>
    </div>
</div>
<!--End Top Sales -->





@endsection