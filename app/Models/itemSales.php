<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class itemSales extends Model
{
    use HasFactory;
    protected $fillable=['item_id','sale_id','cost','price','qty','total','tax','discount','grand_total'];
    public function item()
    {
        return $this->belongsTo(items::class);
    }
    public function sales()
    {
        return $this->belongsTo(sales::class);
    }
}
