<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->id();

            $table->string('matricule')->unique();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();

            $table->timestamps();
        });

        Schema::create('agent_centre', function (Blueprint $table) {
            $table->foreignId('agent_id');
            $table->foreignId('centre_id');

            $table->foreign('agent_id')->references('id')->on('agents');
            $table->foreign('centre_id')->references('id')->on('centres');

            $table->primary(['agent_id', 'centre_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_centre');
        Schema::dropIfExists('agents');
    }
}
