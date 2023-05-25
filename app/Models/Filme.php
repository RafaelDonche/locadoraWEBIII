<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Genero;

class Filme extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'ano_lancamento',
        'diretor',
        'valor',
        'imagem',
        'id_genero'
    ];

    protected $guarded = [
        'id',
        'created_at',
        'update_at'
    ];
    protected $table = 'filmes';

    public function genero()
    {
        return $this->belongsTo(Genero::class, 'id_genero');
    }
}
