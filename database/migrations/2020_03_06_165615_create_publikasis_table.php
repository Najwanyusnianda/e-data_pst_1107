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
            $table->text('title');
            $table->string('issn')->nullable();
            $table->date('release_date')->nullable();
            $table->date('update_date')->nullable();
            $table->string('size');
            $table->unsignedInteger('n_bab')->nullable();
            $table->text('cover');
            $table->text('pdf');
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
