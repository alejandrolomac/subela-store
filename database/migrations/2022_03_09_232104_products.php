<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreign('user')->references('id')->on('users'); 

            $table->string('title');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->float('price')->default(0);;
            $table->float('offer')->nullable();		
            $table->integer('inventory')->default(1);;

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
