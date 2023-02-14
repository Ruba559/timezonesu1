@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{asset('css/product-item1.css')}}">
@endsection

@section('body')
    

<div class="container-fluid p-0">

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


<div class="container-fluid bg-light p-md-5">
    <div class="row justify-content-between align-items-start">
        <div class="col-12">
            <h2 class="text-center text-black title-text mt-3">@lang('master.categories')</h2>
        </div>
    </div>
    <div class="row p-md-5 p-5 justify-content-center align-items-start my-3">
        @foreach($categories as $item)
            <div class="col-md-2 col-6">
                <p class="text-center my-2 text-grey font-wight-bold">{{$item->getTranslatedAttribute('name')}} </p>
                <a class="category-item-container" href="{{$item->slug !='' ? route('category',$item->slug) : '' }}">
                    <div class="category-item" style=" ;background-image:url('{{asset('storage/'.$item->image)}}');">
                
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>


<!-- New Arrivals -->
<div class=" container bg-white">
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