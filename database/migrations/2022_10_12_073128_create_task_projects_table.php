<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_projects', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->string('name');
            $table->string('target');
            $table->string('platform');
            $table->integer('amount');
            $table->text('description');
            $table->datetime('start_time');
            $table->datetime('due_time');
            $table->text('link_report');
            $table->string('status');
            $table->datetime('completed_time')->nullable();
            $table->enum('is_approved', ['0', '1']);
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
        Schema::dropIfExists('task_projects');
    }
}
