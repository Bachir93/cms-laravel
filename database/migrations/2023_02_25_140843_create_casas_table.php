<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casas', function (Blueprint $table) {
            //Opciones de tabla
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            //Columnas
            $table->tinyIncrements('id')->autoIncrement();
            $table->string('titulo', 50)->nullable(false)->default("");
            $table->decimal('precio', 6, 3)->concat(" €")->nullable(false);
            $table->string('dimension', 50)->nullable(false);
            $table->string('slug', 36)->nullable();
            $table->string('entradilla', 128)->nullable();
            $table->text('texto')->nullable();
            $table->tinyInteger('activo')->nullable(false)->default(0);
            $table->tinyInteger('home')->nullable(false)->default(0);
            $table->dateTime('fecha')->nullable();
            $table->string('autor', 64)->nullable();
            $table->string('imagen', 64)->nullable();

            //Columnas created_at y updated_at
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
        Schema::dropIfExists('casas');
    }
};
