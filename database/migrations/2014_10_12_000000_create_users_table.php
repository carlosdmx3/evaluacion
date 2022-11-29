<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('rol_usr')->default(0);
            $table->string('name');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('omatricula')->nullable(true);
            $table->string('ofolio')->nullable(true);
            $table->integer('oanio')->nullable(true);
            $table->integer('oetapa')->nullable(true);
            
            $table->integer('oban_fin')->nullable(true);
            $table->string('ocorreo')->nullable(true);
            $table->integer('oenvio')->nullable(true);
            $table->string('ofechaenvio')->nullable(true);

            $table->char('status', 1)->default('A')->nullable(true);
            $table->string('iusrins')->default('DesSis')->nullable(true);
            $table->string('iusrmod')->nullable(true);
            
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
