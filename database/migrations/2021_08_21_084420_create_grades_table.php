<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();

            $table->string('libelle_court');
            $table->string('libelle_long')->nullable();
            $table->text('description')->nullable();

            $table->timestamps();
        });

        Schema::table('agents', function (Blueprint $table) {
            $table->foreignId('grade_id')->after('prenom')->nullable();
            $table->foreign('grade_id')->references('id')->on('grades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agents', function (Blueprint $table) {
            $table->dropForeign(['grade_id']);
            $table->dropColumn('grade_id');
        });
        Schema::dropIfExists('grades');
    }
}
