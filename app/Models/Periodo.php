<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;
    protected $table = "Periodo";
    protected $primaryKey = "Id";
    public $timestamps = false;
    protected $cast =[
        'Cantidad'=> 'double'
    ];
}
