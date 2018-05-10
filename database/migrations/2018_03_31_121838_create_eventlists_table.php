<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventlists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('introduction')->nullable();
            $table->string('date')->nullable();
            $table->string('timming')->nullable();
            $table->string('venue')->nullable();
            $table->string('problem_statement')->nullable();
            $table->string('rules')->nullable();
            $table->string('procedure')->nullable();
            $table->string('contact')->nullable();
            $table->string('uploaded_by')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('eventlists');
    }
}
