<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToPictureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('picture', function (Blueprint $table) {
            //
	    $table->foreign('pId', 'picture_ibfk_1')->references('pId')->on('post')->onUpdate('RESTRICT')->onDelete('RESTRICT'); 
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('picture', function (Blueprint $table) {
            //
            $table->dropForeign('picture_ibfk_1');
	});
    }
}
