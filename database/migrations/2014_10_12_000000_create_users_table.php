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
            $table->id();
            $table->unsignedInteger('carrera_id')->constrained('carreras')
            ->onUpdate('cascade')
            ->onDelete('cascade')->nullable();
            $table->unsignedInteger('depto_id')->constrained('deptos')
            ->onUpdate('cascade')
            ->onDelete('cascade')->nullable();
            $table->string('name');
            $table->string('cuenta')->unique()->nullable();
            $table->string('tel')->unique()->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('residencia')->default('');
            $table->integer('horas_requeridas')->default(0)->nullable();
            $table->string('image')->nullable();
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
