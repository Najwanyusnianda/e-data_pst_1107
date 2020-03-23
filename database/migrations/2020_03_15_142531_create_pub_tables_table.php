<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePubTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pub_tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pub_id');
            $table->string('title');
            $table->string('pdf')->nullable();
            $table->unsignedInteger('hal_pdf_first')->nullable();
            $table->unsignedInteger('hal_pdf_last')->nullable();
            $table->string('csv')->nullable();
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
        Schema::dropIfExists('pub_tables');
    }
}
