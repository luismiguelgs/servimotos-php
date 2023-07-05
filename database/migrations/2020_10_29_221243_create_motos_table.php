<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motos', function (Blueprint $table) {
            $table->id();
            $table->string('placa',10)->unique();
            $table->date('fecha_ultimo_afina');
            $table->unsignedMediumInteger('recorre_dia');
            $table->unsignedInteger('kilometraje');
            $table->bigInteger('marca_id')->unsigned();
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->bigInteger('modelo_id')->unsigned();
            $table->foreign('modelo_id')->references('id')->on('modelos');
            $table->date('fecha_afinamiento');
            $table->date('fecha_soat');
            $table->string('doi',15);
            $table->string('nombre_apellido',100);
            $table->string('celular',15);
            $table->string('whatsapp',15);
            $table->bigInteger('distrito_id')->unsigned();
            $table->foreign('distrito_id')->references('id')->on('distritos');
            $table->string('email',100);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motos');
    }
}
