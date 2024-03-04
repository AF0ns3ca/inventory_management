<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Item;

class Loan extends Model
{
    //relacion uno a uno con la tabla users
    public function user(){
        return $this->belongsTo(User::class);
    }


    //Cada Loan tendrá un único item asignado, a la vez que cada item solo podrá ser prestado una única vez en un momento determinado. Esto no quiere decir que no tenga varios loans asociados desde una perspectiva histórica.
    public function item(){
        return $this->belongsTo(Item::class);
    }

    protected $fillable = [
        'user_id',
        'item_id',
        'checkout_date',
        'due_date',
        'returned_date',
    ];

    use HasFactory;
}
