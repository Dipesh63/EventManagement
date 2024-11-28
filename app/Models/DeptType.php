<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeptType extends Model
{
    use HasFactory;

    protected $table = 'dept_types';
    protected $fillable = ['name', 'status'];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
