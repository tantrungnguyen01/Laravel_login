<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produ  extends Model{
    use HasFactory;
    
    public $timestamps=false;
    protected $table='product';
    protected $fillable=[
        'id',
        'name',
        'price',
        'image',
        'category_id',
        'user_id',
        'director',
        'writer',
        'producer',
        'website',
        'trailer',
        'review',
    ];
}



