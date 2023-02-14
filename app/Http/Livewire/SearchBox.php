<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class SearchBox extends Component
{
    public $search_result = [];
    
    public $search_text;


    public  function mount()
    {
        $this->search_result= [];
    }
    public function search()
    {
        
        $this->search_result = Product::where('name','LIKE','%'.$this->search_text . '%')->orWhereHas('brand',function($query){
            $query->where('name','LIKE','%'.$this->search_text . '%');
        })->orWhereHas('category',function($query){
            $query->where('name','LIKE','%'.$this->search_text . '%');
        })->get();

    }
    public function render()
    {
        return view('livewire.search-box');
    }
}
