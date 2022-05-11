<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stockOut extends Model
{
    use HasFactory;
    protected $fillable=['item_id','qty','date','note'];
    public function item()
    {
        return $this->belongsTo(items::class);
    }
}
