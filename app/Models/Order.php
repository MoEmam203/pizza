<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pizza(){
        return $this->belongsTo(Pizza::class);
    }


    public function getTotalAttribute(){
        $total = ($this->small_pizza_count * $this->pizza->small_pizza_price) + 
                ($this->medium_pizza_count * $this->pizza->medium_pizza_price) + 
                ($this->large_pizza_count * $this->pizza->large_pizza_price);
                
        return $total;
    }
}
