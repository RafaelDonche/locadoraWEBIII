<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Genero;
use Illuminate\Support\Facades\File;

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

    public function src_img()
    {
        $src = '';

        if (isset($this->imagem)) {
            $path = storage_path('app/public/imagens/'.$this->imagem);

            if (File::exists($path)){
                $base64 = base64_encode(file_get_contents($path));
                $src = 'data:image/png;base64,' . $base64;
            }
        }

        return $src;
    }
}
