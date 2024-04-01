<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obd2 extends Model
{
   protected $table = 'obd2';
    use HasFactory;

     protected $fillable = [
        'codigo',
        'descripcion'
        
        ];
}
