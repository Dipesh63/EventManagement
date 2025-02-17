<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function deptType()
    {
        return $this->belongsTo(DeptType::class);
    }
    // public function deptType()
    // {
    //     return $this->belongsTo(Depttype::class, 'dept_type_id');
    // }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
