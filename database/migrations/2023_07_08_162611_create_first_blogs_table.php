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
        Schema::create('first_blogs', function (Blueprint $table) {
            $table->id();
            $table->uuid('blog_uuid')->unique();
            $table->string('heading1')->nullable();
            $table->string('heading2')->nullable();
            $table->longText('description1')->nullable();
            $table->longText('description2')->nullable();
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
        Schema::dropIfExists('first_blogs');
    }
};
