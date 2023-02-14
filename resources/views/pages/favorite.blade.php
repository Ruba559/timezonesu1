@extends('layouts.master',['title'=>'Time Zone | '.Lang::get('master.favorite'),"nav_bl"=>true])


@section('head')
  
@endsection

@section('body')
    
<div class="container-fluid my-5">
    
        <div class="row p-md-5 p-2 bg-white">
            <div class="col-12 mb-5">
                <h4 class="underline-text text-blue d-inline">@lang('master.favorite')</h4>
            </div>
            @foreach ($products as $item)
            @include('components.product-item' , [$item])
            @endforeach
        </div>
        
</div>
@endsection