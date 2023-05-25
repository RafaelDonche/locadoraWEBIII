<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genero extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'update_at'
    ];
    protected $table = 'generos';
}
