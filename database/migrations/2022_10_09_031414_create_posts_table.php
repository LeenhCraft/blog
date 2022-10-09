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
        Schema::create('posts', function (Blueprint $table) {
            $table->id('idpost');
            $table->string('pos_name');
            $table->string('pos_slug');
            $table->text('pos_extract');
            $table->longText('pos_body');
            $table->enum('pos_status', [0, 1])->default(0);
            $table->unsignedBigInteger('idcategorie');
            $table->unsignedBigInteger('user_id');
            $table->foreign('idcategorie')->references('idcategorie')->on('categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('posts');
    }
};
