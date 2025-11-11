<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use \Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
class Aluno extends Model
{
    use SoftDeletes;

    public function curso()
    {
        return $this->belongsTo('\App\Models\Curso');
    }



    use HasFactory;
}
