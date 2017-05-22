<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book',function(Blueprint $table){
            $table->increments('id');
            $table->string('book_name');
            $table->string('category_name');
            $table->string('author_name');
            $table->string('another_author_name');           
            $table->integer('isbn_number');
            $table->integer('price');            
            $table->rememberToken();
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
}
