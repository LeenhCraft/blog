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
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id('idposttag');
            $table->unsignedBigInteger('idpost');
            $table->unsignedBigInteger('idtag');
            $table->foreign('idpost')->references('idpost')->on('posts')->onDelete('cascade');
            $table->foreign('idtag')->references('idtag')->on('tags')->onDelete('cascade');
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
        Schema::dropIfExists('post_tag');
    }
};
