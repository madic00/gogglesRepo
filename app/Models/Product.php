<?php

namespace App\Models;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'description', 'category_id', 'featured', 'is_active' , 'gender_id', 'brand_id'];


    public function prices() 
    {
        return $this->hasMany(Price::class);
        // ->orderBy('created_at', 'desc');
    }

    public function images() 
    {
        return $this->hasMany(Image::class);
    }

    public function category() 
    {
        return $this->belongsTo(Category::class);
    }

    public function brand() 
    {
        return $this->belongsTo(Brand::class);
    }

}
