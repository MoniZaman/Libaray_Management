<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookIssueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookissue',function(Blueprint $table){
            $table->increments('id');
            $table->string('student_id');
            $table->string('student_name');           
            $table->date('issue_date');
            $table->integer('total_book')->default(1);
            $table->date('submited_date')->nullable();           
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
        Schema::drop('bookissue');
    }
}
