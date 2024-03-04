<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Box extends Model
{
    //relacion uno a muchos con la tabla items
    public function items(){
        return $this->hasMany(Item::class);
    }

    protected $fillable = [
        'label',
        'location',
    ];

    use HasFactory;
}
