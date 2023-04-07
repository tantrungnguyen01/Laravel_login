<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umenusv extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='users';
    
    protected $fillable=[
        'id',
        'email',
        'password',
        'fullname',
        'gender',
        'phone',
        'address',
        'level',
        'status',
        'token',
    ];
}

