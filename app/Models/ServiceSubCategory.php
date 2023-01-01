<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'service_category_id'
    ];

    public function service_category(){
        return $this->belongsTo(ServiceCategory::class);
    }
}
