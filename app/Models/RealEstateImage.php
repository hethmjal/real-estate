<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealEstateImage extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['real_estate_id','path'];

    public function realEstate()
    {
        return $this->belongsTo(RealEstate::class,'real_estate_id');
    }
}
