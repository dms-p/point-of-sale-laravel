<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class purchase extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['code','slug','supplier_id','user_id','total','discount','tax','status','grand_total','date_required','shipping_cost','note'];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function User()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
    public function supplier()
    {
        return $this->belongsTo(supplier::class)->withTrashed();
    }
    public function itemPurchases()
    {
        return $this->hasMany(itemPurchase::class,'purchase_id','id');
    }
}
