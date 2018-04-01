<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_assigns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('facultysubject_id')->unsigned();
            $table->string('student_id');
            $table->string('subject_code');
            $table->string('subject_title');
            $table->string('student_code');
            $table->string('name');
            $table->string('course');
            $table->string('year');
            $table->string('semester');
            $table->string('prelim');
            $table->string('midterm');
            $table->string('final');
            $table->string('average');
            $table->string('rating');
            $table->string('remarks');
            $table->timestamps();
        });

        Schema::table('student_assigns', function($table){
            $table->foreign('facultysubject_id')->references('id')->on('facultysubjects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_assigns');
    }
}
