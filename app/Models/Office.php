<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    public $table = 'offices';
    protected $fillable = [
        'name',
        'description',
        'price',
        'user_id',
        'office_state_id',
        'image'
    ];

    //tags
    public function tags()//muchos a muchos
    {
        return $this->belongsToMany(Tag::class, 'office_tags'); //relacion de office-tag con tabla pivot
    }
    //reviews
    public function reviews()//uno a muchos
    {
        return $this->hasMany(Review::class, 'office_id');
    }

}
