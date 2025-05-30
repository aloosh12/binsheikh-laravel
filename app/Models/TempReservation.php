<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempReservation extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $table = "temp_reservations";
    public $timestamps = false;
}
