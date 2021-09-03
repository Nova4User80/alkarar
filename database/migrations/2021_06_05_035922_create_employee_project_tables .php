<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeProjectTables extends Migration
{
    public function up()
    {
        Schema::create('employee_project', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('fid');
            $table->bigInteger('employee_id')->unsigned();
            $table->bigInteger('project_id')->unsigned();
            $table->unique(['project_id', 'employee_id', 'fid']);
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('project_id')->references('id')->on('projects');

          //  $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
      //      $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');/*;*/
        });
    }

    public function down()
    {
        Schema::drop('employee_project');
    }
}
