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
        Schema::create('tb_post_statistics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('tb_posts');
            $table->integer('views_quantity');
            $table->integer('favorites_quantity');
            $table->integer('comments_quantity');
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
        Schema::dropIfExists('tb_post_statistics');
    }
};
