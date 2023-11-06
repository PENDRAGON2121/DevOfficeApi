<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office_state extends Model
{
    use HasFactory;

    public $table = 'office_states';

    protected $fillable = ['name'];
}
