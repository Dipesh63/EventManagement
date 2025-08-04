<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['name', 'email','phone','amount','address','status','transaction_id','currency','event_id','payer_id'];
}
