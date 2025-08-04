<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventApplication extends Model
{
    use HasFactory;

    public function event()
    {
        return $this->belongsTo(Event::class);
    }


    public function admittedUser()
    {
        return $this->belongsTo(User::class, 'admitted_user_id');
    }

    // In EventApplication model
    public function user()
    {
        return $this->belongsTo(User::class, 'admitted_user_id');
    }


    
    public function orders()
    {
        return $this->hasMany(Order::class, 'event_id');
    }
    





    protected $table = 'events_applications';
    protected $fillable = ['event_id', 'organizer_user_id', 'admitted_user_id', 'applied_date'];
}
