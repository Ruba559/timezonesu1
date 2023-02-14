<div>

    <div class="form-group">
        <label for="my-input">Search For</label>
        <input id="my-input" class="form-control" type="text" wire:model="search_text" wire:change="search">
        <span class="text-center spinner spinner-grow text-white" wire:loading wire:target="search"></span>
    </div>
    
    <div class="col">
        @foreach ($search_result as $item)
            <div class="row my-1">
                <div class="col-4">
                    <img class=" rounded" style="width:100px;height:100px;object-fit:cover" width="90%" src="{{asset('storage/'.json_decode($item->images)[0])}}" alt="{{$item->name}}">
                </div>
                <div class="col-8">
                    <p class="text-white mb-0"><strong >{{$item->brand!=null ? $item->brand->name :''}} <br></strong><span style="overflow: hidden;
                        text-overflow: ellipsis;
                        display: -webkit-box;
                        -webkit-line-clamp: 2; 
                                line-clamp: 2;
                        -webkit-box-orient: vertical;"> {{$item->name}}</span></p>
                    <p class="text-white my-0">{{$item->price}}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
