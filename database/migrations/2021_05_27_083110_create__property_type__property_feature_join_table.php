<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyTypePropertyFeatureJoinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PropertyType_PropertyFeature_join', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_type_id');
            $table->unsignedBigInteger('property_feature_id');
            $table->timestamps();

            $table->unique(['property_type_id', 'property_feature_id'], 'PropertyTypeID_PropertyFeatureID_unique');

            $table->foreign('property_type_id')
                    ->references('property_type_id')
                    ->on('property_type')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');  

            $table->foreign('property_feature_id')
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
        Schema::dropIfExists('PropertyType_PropertyFeature_join');
    }
}
