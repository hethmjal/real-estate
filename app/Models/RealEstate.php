<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealEstate extends Model
{
    use HasFactory;
    protected $fillable = ['title','category_id','city','slug','user_id','address','country',
    'price','currency','space','phone','facebook','bedrooms','halls','bathrooms','street_width','floor','age','interface','kitchen','elevator','car'];


    public function images()
    {
        return $this->hasMany(RealEstateImage::class,'real_estate_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
