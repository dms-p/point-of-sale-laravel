<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itemPurchase extends Model
{
    use HasFactory;
    protected $fillable=['item_id','purchase_id','cost','qty','total','tax','discount','grand_total'];
    
    public function item()
    {
        return $this->belongsTo(items::class,'item_id');
    }
    public function purchases()
    {
        return $this->belongsTo(purchases::class);
    }
}
