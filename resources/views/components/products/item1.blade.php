
    <div class="col-md-3 col-sm-6 col-12 p-2 px-5" data-aos="{{$fade_arr[array_rand($fade_arr)]}}">
        
        <div class="product-grid6 ">
            <a href="{{route('product',$item->slug)}}">
            <div class="product-image">
                {{-- @if ($product->isnew==='new')
                    <span class="isnew">New</span>
                @endif --}}
                @if(json_decode($item->images) != null )
                
                
                    <img class=" mx-auto d-block my-2" src="{{asset('storage/'.json_decode($item->images)[0])}}">
                
                @endif

            </div>
            </a>
            <div class="product-content mx-auto">
                <h5 class=" f-bold text-black text-center">{{$item->name}}</h5>
            
                <div class="product-price text-center">
                    <span class="  text-grey"><small class=" text-lth">{{$item->price}} SDG </small> <span class="mx-2 f-bold  text-gold"> {{$item->offer}} SDG</span></span>

                </div>
                
            </div>
            <div class="buttons mx-auto row mt-2 text-center">
                <a href="" class="btn bg-gold text-white px-3 radius-10"><span class="fa fa-shopping-cart mx-1"></span>Add To Cart</a>
                <a href="" class="btn bg-black text-gold  radius-10 mx-2"><span class="fa fa-heart-o "></span></a>
            </div>
        </div>
    </div>

