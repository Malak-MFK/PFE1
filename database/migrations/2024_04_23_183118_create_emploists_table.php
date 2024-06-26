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
        Schema::create('emploists', function (Blueprint $table) {
            $table->id();
            $table->string('emploi');
            $table ->unsignedBigInteger('formateur_id');
            $table -> foreign('formateur_id')
            -> references('id')
            -> on('formateurs')
            ->onDelete('cascade');
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
        Schema::dropIfExists('emploists');
    }
};
