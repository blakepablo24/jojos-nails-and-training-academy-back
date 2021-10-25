<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageOrientationToFrontPageImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('front_page_images', function (Blueprint $table) {
            $table->string('orientation')->default("portrait");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('front_page_images', function (Blueprint $table) {
            $table->string('orientation')->default("portrait");
        });
    }
}
