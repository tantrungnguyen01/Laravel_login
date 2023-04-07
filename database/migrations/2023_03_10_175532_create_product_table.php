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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price')->default(10000);
            $table->text('intro')->nullable();
            $table->longText('content')->nullable();
            $table->tinyInteger('status')->default(1)->comment("1:Act, 2:UnAct");
            $table->string('image');
            $table->string('director');
            $table->string('writer')->nullable();
            $table->string('producer');
            $table->string('website');
            $table->string('trailer');
            $table->string('review');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->index(['name','status','category_id']);
            $table->foreign('category_id')->references('id')->on('category');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
