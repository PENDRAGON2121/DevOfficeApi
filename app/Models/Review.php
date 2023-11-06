<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public $table = "reviews";

    protected $fillable = [
        'review',
        'user_id',
        'office_id'
    ];
}
