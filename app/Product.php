<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function images(){
        return $this->hasMany(ProductImage::class);
    }

    public function getFeaturedImageUrlAttribute(){

        $imageFeatured = $this->images()->where('featured',true)->first();

        if(!$imageFeatured){
            $imageFeatured = $this->images()->first();
        }

        if($imageFeatured){
           return $imageFeatured->image;
        }

        return '/img/products/default.png';
    }
}
