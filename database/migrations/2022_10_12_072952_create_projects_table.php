<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id')->length(110)->unsigned();
            $table->string('name');
            $table->enum('type', ['Aksi', 'Bulanan', 'Outsourcing', 'Endorse', 'KOL', 'Press Release', 'Takedown', 'Verified', 'Etc']);
            $table->string('platform');
            $table->dateTime('start_date');
            $table->dateTime('due_date');
            $table->integer('client_by')->length(110)->unsigned();
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
        Schema::dropIfExists('projects');
    }
}