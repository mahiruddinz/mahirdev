<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->foreignId('client_id')->nullable()->references('id')->on('clients')->constrained('clients')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('leader_id')->nullable()->references('id')->on('users')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('user_tasks', function (Blueprint $table) {
            $table->foreignId('task_id')->nullable()->references('id')->on('task_projects')->constrained('task_projects')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('accounts', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('attendances', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('cashflows', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('memorandums', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foreign');
    }
}
