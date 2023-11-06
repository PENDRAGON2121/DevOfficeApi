<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office_tags extends Model
{
    use HasFactory;

    protected $fillable = [
        'office_id',
        'tag_id',
    ];
}
