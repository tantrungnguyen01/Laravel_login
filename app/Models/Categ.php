<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categ extends Model
{
    use HasFactory;
    public $timestamps=false;

    protected $table='category';

    protected $fillable=[
        'id',
        'name',
        'description',
        'image',
        'category_id',
        'status ',
        'user_id ',
    ];

}
