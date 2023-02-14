@extends('layouts.master',['title'=>'Time Zone | '.$category->name,"nav_bl"=>true])


@section('head')
  
@endsection

@section('body')

<div class="container-fluid" style=" height:300px;background-image:url('{{asset("storage/".$category->image)}}');background-size:cover;background-position:center;background-attachment:fixed">
    
</div>>
<div class="container-fluid mb-5">
    
        <div class="row p-md-5 p-2 bg-white">
            <div class="col-12 mb-5">
                <h4 class="underline-text text-blue d-inline">{{$category->name}}</h4>
            </div>
            @foreach ($products as $item)
            @include('components.product-item' , [$item])
            @endforeach
        </div>
        
</div>
@endsection