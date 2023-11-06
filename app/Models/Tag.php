<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public $table = 'tags';
    protected $fillable = [
        'name',
        'description',

    ];

    public function office(){
        return $this->belongsToMany(Office::class, 'office_tags');
    }

}
