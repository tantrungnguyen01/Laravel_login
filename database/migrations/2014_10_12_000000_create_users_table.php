<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('fullname');
            $table->string('gender')->default(1);
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->tinyInteger('level')->default(2)->comment("1:Ad, 2:Mem");
            $table->tinyInteger('status')->default(1)->comment("1:Act, 2:UnAct");
            $table->index(['email', 'fullname', 'level']);
            $table->rememberToken();

           
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};