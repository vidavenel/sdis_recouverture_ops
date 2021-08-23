<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competences', function (Blueprint $table) {
            $table->id();

            $table->string('libelle')->unique();
            $table->text('description')->nullable();

            $table->timestamps();
        });

        Schema::create('agent_competence', function (Blueprint $table) {
            $table->foreignId('agent_id');
            $table->foreignId('competence_id');

            $table->foreign('agent_id')->references('id')->on('agents');
            $table->foreign('competence_id')->references('id')->on('competences');

            $table->primary(['agent_id', 'competence_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_competence');
        Schema::dropIfExists('competences');
    }
}
