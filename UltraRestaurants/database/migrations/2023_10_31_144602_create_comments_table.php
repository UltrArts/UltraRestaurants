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
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->text('comment');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('rest_id')->nullable();

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

                $table->softDeletes();
                // Relationship
                $table->foreign('rest_id')->references('id')->on('restaurants')->onDelete('cascade');
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function(Blueprint $table){
            $table->dropSoftDeletes();
            $table->dropForeign('comments_rest_id_foreign');
            $table->dropForeign('comments_user_id_foreign');
        });

        
        Schema::dropIfExists('comments');
    }
};
