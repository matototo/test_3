<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bouteille extends Model
{
    protected $table = 'bottles';

    protected $fillable = [

        'title',
        'price',
        'image_src',
        'saq_link',
        'country',
        'region',
        'degree_alcohol',
        'color',
        'size',
        'description',
        'designation_of_origin',
        'classification',
        'sugar_content',
        'particularity',
        'promoting_agent',
        'producer',
        'grape_variety',
        'vintage_tasted',
        'aromas',
        'created_at'
        
    ];
}



