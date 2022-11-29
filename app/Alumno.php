<?php

namespace App;

use Illuminate\Database\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumno_docente';


    protected $fillable = ['id','id_user','onombre','osede','osubsede','omatricula','ofolio','ogrado','ogrupo','oprograma','oasignatura','odocente','omodalidad',
                            'oanio','oetapa','ban_fin'];


    public function alumno() {
        return $this->belongsTo(Alumno::class);
    }
    
}
