<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'image'
    ];

    protected $appends = [
        'has_category',
        'has_sub_category'
    ];

    public function getHasCategoryAttribute(){
        if($this->service_categories()->count() > 0){
            return true;
        }
        return false;
    }

    public function getHasSubCategoryAttribute(){
        if($this->service_sub_categories()->count() > 0){
            return true;
        }
        return false;
    }

    public function service_categories(){
        return $this->hasMany(ServiceCategory::class);
    }

    public function service_sub_categories(){
        return $this->hasManyThrough(ServiceSubCategory::class, ServiceCategory::class, 'service_id', 'service_category_id');
    }
}
