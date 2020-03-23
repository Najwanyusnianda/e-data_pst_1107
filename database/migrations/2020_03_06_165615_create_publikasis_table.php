<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublikasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publikasis', function (Blueprint $table) {
            $table->string('pub_id')->primary();
            $table->string('title');
            $table->string('issn')->default('tidak ada');
            $table->date('release_date')->nullable();
            $table->date('update_date')->nullable();
            $table->string('size');
            $table->unsignedInteger('n_bab')->nullable();
            $table->string('cover');
            $table->string('pdf');
            $table->boolean('isTableComplete')->default(0);


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
        Schema::dropIfExists('publikasis');
    }
}
