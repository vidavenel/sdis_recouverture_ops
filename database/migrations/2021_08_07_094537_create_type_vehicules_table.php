<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->timestamps();
        });

        Schema::create('centre_type_vehicule', function (Blueprint $table) {
            $table->foreignId('centre_id');
            $table->foreignId('type_vehicule_id');

            $table->primary(['centre_id', 'type_vehicule_id']);

            $table->tinyInteger('nombre')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('centre_type_vehicule');
        Schema::dropIfExists('type_vehicules');
    }
}
