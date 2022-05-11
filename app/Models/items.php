<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class items extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['name','code','slug','qty','cost','price','category_id','brand_id','uom_id','supplier_id','discontinue','description'];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function brand()
    {
        return $this->belongsTo(brand::class)->withTrashed();
    }
    public function category()
    {
        return $this->belongsTo(category::class)->withTrashed();
    }
    public function supplier()
    {
        return $this->belongsTo(supplier::class)->withTrashed();
    }
    public function uom()
    {
        return $this->belongsTo(uom::class)->withTrashed();
    }
    public function itemSales()
    {
        return $this->hasMany(itemSales::class);
    }
}

