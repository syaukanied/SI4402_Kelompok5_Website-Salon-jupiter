<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'image',
        'service_id'
    ];

    protected $appends = [
        'has_sub_category'
    ];

    public function getHasSubCategoryAttribute(){
        if($this->service_sub_categories()->count() > 0){
            return true;
        }
        return false;
    }

    public function service_sub_categories(){
        return $this->hasMany(ServiceSubCategory::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }
}
