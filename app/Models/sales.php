<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class sales extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['code','slug','customer_id','user_id','total','discount','tax','shipping_cost','grand_total','status'];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function User()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
    public function customer()
    {
        return $this->belongsTo(customer::class)->withTrashed();
    }
    public function itemSales()
    {
        return $this->hasMany(itemSales::class,'sale_id','id');
    }
}
