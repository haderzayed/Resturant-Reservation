<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Enums\TableLocation;
use App\Traits\Enums\TableStatus;

class Table extends Model
{
    use HasFactory ;
    protected $fillable =[
        'name',
        'guest_number',
        'status',
        'location',
    ];
      
    protected $casts = [
        'tablelocation' => TableLocation::class,
        'tablestatus' => TableLocation::class,
    ];

    public function reservations (){
        return $this->hasMany(Reservation::class);
    }

}
