<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'date',
        'price',
        'user_id',
        'service_id',
        'service_category_id',
        'service_sub_category_id',
        'barber_id'
    ];

    protected $appens = [
        'readable_date'
    ];

    public function getReadableDateAttribute(){
        return Carbon::parse($this->date)->format('D, d M Y H:i A');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function service_category(){
        return $this->belongsTo(ServiceCategory::class);
    }

    public function service_sub_category(){
        return $this->belongsTo(ServiceSubCategory::class);
    }

    public function barber(){
        return $this->belongsTo(Barber::class);
    }
}