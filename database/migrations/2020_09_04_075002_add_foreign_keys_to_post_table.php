<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post', function (Blueprint $table) {
            //
	    $table->foreign('uId', 'post_ibfk_1')->references('uId')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
	    $table->foreign('rId', 'post_ibfk_2')->references('pId')->on('post')->onUpdate('RESTRICT')->onDelete('RESTRICT'); 
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post', function (Blueprint $table) {
            //
            $table->dropForeign('post_ibfk_1');
	    $table->dropForeign('post_ibfk_2');
	});
    }
}
