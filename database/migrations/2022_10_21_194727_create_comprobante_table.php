<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprobanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comprobante', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('encabezado')->nullable(true);
            $table->string('p1')->nullable(true);
            $table->string('p2')->nullable(true);
            $table->string('p3')->nullable(true);
            $table->string('c1')->nullable(true);
            $table->string('c2')->nullable(true);
            $table->string('c3')->nullable(true);
            $table->string('c4')->nullable(true);
            $table->string('pie')->nullable(true);
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
        Schema::dropIfExists('comprobante');
    }
}
