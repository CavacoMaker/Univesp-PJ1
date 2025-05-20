<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presenca extends Model
{
    use HasFactory;

    protected $fillable = ['aluno_id', 'data', 'presente'];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
}

