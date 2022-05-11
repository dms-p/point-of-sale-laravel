<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class supplier extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['name','phone','email','address'];
    public function items()
    {
        return $this->hasMany(items::class);
    }
    public function purchases()
    {
        return $this->hasMany(purchase::class);
    }
}