<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventApplication extends Model
{
    use HasFactory;

    public function event(){
        return $this->belongsTo(Event::class);
    }

    protected $table = 'events_applications';
    protected $fillable = ['event_id','organizer_user_id','admitted_user_id','applied_date'];

} 
