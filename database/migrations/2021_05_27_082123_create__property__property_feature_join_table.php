<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyPropertyFeatureJoinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Property_PropertyFeature_join', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('property_feature_id');
            $table->integer('number')->nullable();
            $table->timestamps();

            $table->unique(['property_id', 'property_feature_id'], 'PropertyID_PropertyFeatureID_unique');

            $table->foreign('property_id')
                    ->references('property_id')
                    ->on('property')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');  

            $table->foreign('property_feature_id', 'PropertyFeature_PropertyPropertyFeatureJoin')
                    ->references('property_feature_id')
                    ->on('property_feature')
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
        Schema::dropIfExists('Property_PropertyFeature_join');
    }
}
