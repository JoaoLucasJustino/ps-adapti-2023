<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aluno extends Model
{
    use HasFactory;

    protected $table = 'alunos';

    protected $fillable = [
        'nome',
        'descricao',
        'contratado',
        'formado',
        'curso_id',
        'imagem',
    ];

    public function curso()
    {
        return $this->belongsTo(curso::class, 'curso_id');
    }
}
