<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Advert extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $translatable = ['title' , 'subtitle'];
}
