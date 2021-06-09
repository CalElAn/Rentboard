<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_media', function (Blueprint $table) {
            $table->id('property_media_id');
            $table->unsignedBigInteger('property_id');
            $table->string('type'); //**should be a MIME or extension, generste from picture automatically, add other fields for more characteristics like size, etc
            $table->string('path');
            $table->timestamps();

            $table->foreign('property_id')
                    ->references('property_id')
                    ->on('property')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_media');
    }
}
