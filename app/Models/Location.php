<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;



class Location extends Model
{
    use HasFactory;

    protected $table = 'location';
    protected $fillable = ['versity_name'];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}