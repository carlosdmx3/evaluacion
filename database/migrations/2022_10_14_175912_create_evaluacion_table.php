<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('odescripcion');
            $table->string('oseccion');
            $table->integer('onumpregunta');
            $table->integer('oanio');
            $table->integer('oetapa');
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
        Schema::dropIfExists('evaluacion');
    }
}
