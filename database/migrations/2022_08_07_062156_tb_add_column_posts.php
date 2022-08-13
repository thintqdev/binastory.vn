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
        Schema::table('tb_posts', function (Blueprint $table) {
            $table->addColumn('tinyInteger', 'is_actived')->after('topic_id')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_posts', function (Blueprint $table) {
            $table->dropColumn('is_actived');
        });
    }
};
