<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoDocenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_docente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_user')->nullable(true);
            $table->string('onombre');
            $table->string('osede');
            $table->string('osubsede');
            $table->string('omatricula');
            $table->string('ofolio');
            $table->string('ogrado');
            $table->string('ogrupo');
            $table->string('oprograma');
            $table->string('oasignatura');
            $table->string('odocente');
            $table->string('omodalidad')->nullable(true);
            $table->integer('oanio');
            $table->integer('oetapa');
            $table->integer('oban_fin')->default(0)->nullable(true);
            $table->string('ocorreo')->nullable(true);
            $table->integer('oenvio')->nullable(true);
            $table->string('ofechaenvio')->nullable(true);
            $table->char('status', 1)->default('A')->nullable(true);
            $table->string('iusrins')->default('DesSis')->nullable(true);
            $table->string('iusrmod')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno_docente');
    }
}
