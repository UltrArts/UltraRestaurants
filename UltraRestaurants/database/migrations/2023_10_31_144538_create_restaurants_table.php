<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->double('min_price');
            $table->double('max_price');
            $table->integer('rate')->default(0);
            $table->string('address');
            $table->string('cover')->nullable();
            $table->time('open_time', $precision = 0);
            $table->time('close_time', $precision = 0);
            $table->unsignedBigInteger('kitchen_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            
            
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));


             // Relationship
             $table->foreign('kitchen_id')->references('id')->on('kitchen_types')->onDelete('cascade');
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('restaurants', function(Blueprint $table){
            $table->dropSoftDeletes();
            $table->dropForeign('restaurants_kitchen_id_foreign');
            $table->dropForeign('restaurants_user_id_foreign');
        });
        Schema::dropIfExists('restaurants');
    }
};
