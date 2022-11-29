<?php

namespace App;

use Illuminate\Database\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Evaluacion extends Model
{

    protected $table = 'evaluacion';


    protected $fillable = [
        'id', 'odescripcion', 'oseccion', 'onumpregunta', 'oanio', 'oetapa',
    ];

    public function evaluacion() {
        return $this->belongsTo(Evaluacion::class);
    }

}
