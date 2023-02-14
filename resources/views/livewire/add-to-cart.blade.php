<div>
    @if ($current == 2)
        <div class="row ">

            <a href="" wire:click.prevent="save()" class="btn bg-blue text-white radius-10 mx-2"><span
                    class="fa fa-shopping-cart"></span>@lang('product.add_to_cart')</a>

            <a href="" class="btn bg-green text-white radius-10 mx-2"><span class="fa fa-whatsapp"></span></a>
            @if ($product->favorites->isNotEmpty())
                @if ($product->favorites[0]->user_id == 1)
                    <a href="" wire:click.prevent="removeFavorite()"
                        class="btn bg-red text-white radius-10 mx-2"><span class="fa fa-heart-o"></span></a>
                @endif
            @else
                <a href="" wire:click.prevent="addToFavorite()"
                    class="btn bg-red text-white radius-10 mx-2"><span class="fa fa-heart"></span></a>
            @endif


        </div>
    @endif

    @if ($current == 1)
        <div>
            <div class="buy text-grey row">

                <a href="" wire:click.prevent="save()"><span class="fa fa-shopping-cart  mx-2"
                        wire:loading.remove.target="disable" wire:target="save"></span><span wire:loading><span
                            class="fa fa-spinner mx-2"></span></span></a>

                @if ($product->favorites->isNotEmpty() && $product->favorites[0]->user_id == 1)
                    <a href="" wire:click.prevent="removeFavorite()"><span style="color:red"
                            class="fa fa-heart  mx-2 " ></span></a>
                @else
                    <a href="" wire:click.prevent="addToFavorite()">
                        <span class="fa fa-heart-o mx-2"></span>
                    </a>
                @endif
                <a href=""> <span class="fa fa-whatsapp mx-2"></span></a>
            </div>
        </div>
    @endif
</div>
