<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $table = 'activity';

    protected $fillable = [
        'description',
        'hours',
        'tecnician_id',
        'type_activity_id',
    ];

    public function technician()
    {
    return $this->belongsTo(Technician::class, 'tecnician_id');
    }

    public function typeActivity()
    {
    return $this->belongsTo(TypeActivity::class, 'type_activity_id');   
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);  
        //return $this->belongsToMany(OrderActivity::class, 'order_activity', 'activity_id', 'order_id');
    }
}