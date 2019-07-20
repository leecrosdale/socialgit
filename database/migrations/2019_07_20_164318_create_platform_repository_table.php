<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlatformRepositoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platform_repository', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('platform_id');
            $table->unsignedBigInteger('repository_id');
            $table->timestamps();

            $table->foreign('platform_id')->references('id')->on('platforms');
            $table->foreign('repository_id')->references('id')->on('repositories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('platform_repository');
    }
}
