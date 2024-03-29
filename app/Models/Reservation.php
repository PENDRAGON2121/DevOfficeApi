<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public $table = 'reservations';

    protected $fillable = [
        'office_id',
        'user_id',
        'check_in',
        'check_out',
    ];


}
