<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videoupload extends Model
{
    protected $table='video';
    protected $primaryKey='id';
    protected $fillable=['event_id','tittle','description','videofile'];
    use HasFactory;
}
