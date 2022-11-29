<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocenteEvalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_eval', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_alumno_usr')->nullable(true);
            $table->integer('id_docente')->nullable(true);
            $table->integer('op1')->default(0)->nullable(true);
            $table->integer('op2')->default(0)->nullable(true);
            $table->integer('op3')->default(0)->nullable(true);
            $table->integer('op4')->default(0)->nullable(true);
            $table->integer('op5')->default(0)->nullable(true);
            $table->integer('op6')->default(0)->nullable(true);
            $table->integer('op7')->default(0)->nullable(true);
            $table->integer('op8')->default(0)->nullable(true);
            $table->integer('op9')->default(0)->nullable(true);
            $table->integer('op10')->default(0)->nullable(true);
            $table->integer('op11')->default(0)->nullable(true);
            $table->integer('op12')->default(0)->nullable(true);
            $table->integer('op13')->default(0)->nullable(true);
            $table->integer('op14')->default(0)->nullable(true);
            $table->integer('op15')->default(0)->nullable(true);
            $table->integer('op16')->default(0)->nullable(true);
            $table->integer('op17')->default(0)->nullable(true);
            $table->integer('op18')->default(0)->nullable(true);
            $table->integer('op19')->default(0)->nullable(true);
            $table->integer('op20')->default(0)->nullable(true);
            $table->integer('op21')->default(0)->nullable(true);
            $table->integer('op22')->default(0)->nullable(true);
            $table->integer('op23')->default(0)->nullable(true);
            $table->integer('op24')->default(0)->nullable(true);
            $table->integer('op25')->default(0)->nullable(true);
            $table->integer('op26')->default(0)->nullable(true);
            $table->integer('op27')->default(0)->nullable(true);
            $table->integer('op28')->default(0)->nullable(true);
            $table->integer('op29')->default(0)->nullable(true);
            $table->integer('op30')->default(0)->nullable(true);
            $table->integer('op31')->default(0)->nullable(true);
            $table->integer('op32')->default(0)->nullable(true);
            $table->integer('op33')->default(0)->nullable(true);
            $table->integer('op34')->default(0)->nullable(true);
            $table->integer('op35')->default(0)->nullable(true);
            $table->integer('oban_fin')->nullable(true);
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
        Schema::dropIfExists('docente_eval');
    }
}
