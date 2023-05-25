<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Cliente;
use App\Models\LocacaoFilme;

class Locacao extends Model
{
    use HasFactory;
    protected $fillable = [
        'data_emprestimo',
        'data_devolucao',
        'id_cliente'
    ];

    protected $guarded = [
        'id',
        'created_at',
        'update_at'
    ];
    protected $table = 'locacaos';

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function filmes()
    {
        return $this->hasMany(LocacaoFilme::class, 'id_locacao', 'id');
    }
}
