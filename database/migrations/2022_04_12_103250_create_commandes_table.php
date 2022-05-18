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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('prenom');
            $table->string('email');
            $table->string('nom');
            $table->string('phone');
            $table->string('adresse');
            $table->string('ville');
            $table->string('pays');
            $table->string('code_postal');
            $table->string('total_prix');
            $table->tinyInteger('etat')->default('0');
            $table->string('tracking_no');
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
        Schema::dropIfExists('commandes');
    }
};
