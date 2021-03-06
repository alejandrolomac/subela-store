<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('products', function(Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->nullable()->onDelete('cascade');

            $table->string('title');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->float('price')->default(0);
            $table->float('offer')->nullable();		
            $table->integer('inventory')->nullable()->default(1);

            $table->timestamps();
        });
    }

    public function down()
    {
    }
};
