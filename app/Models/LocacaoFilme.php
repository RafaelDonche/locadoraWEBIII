<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Filme;

class LocacaoFilme extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_locacao',
        'id_filme'
    ];

    protected $guarded = [
        'id',
        'created_at',
        'update_at'
    ];
    protected $table = 'locacao_filmes';

    public function filme()
    {
        return $this->belongsTo(Filme::class, 'id_filme');
    }
}
