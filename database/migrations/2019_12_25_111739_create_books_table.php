<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
            $table->increments('id');
            $table->string('name', 90);
            $table->string('relation_flag', 30);
            $table->string('origin_site', 80)->default('shuquge');
            $table->string('author', 50);
            $table->string('category', 50)->default(' ');
            $table->integer('category_id')->unsigned()->default(0);
            $table->integer('words')->unsigned()->default(0);
            $table->string('description', 900)->default(' ');
            $table->string('cover', 255)->default('/cover/default.jpg');
            $table->tinyInteger('is_recommend')->unsigned()->default(0);
            $table->integer('sort_weight')->unsigned()->default(0);
            $table->enum('state', ['finish', 'writing'])->default('writing');
            $table->tinyInteger('is_del')->unsigned()->default(0);
            $table->integer('update_time')->unsigned()->default(0);
            $table->integer('create_time')->unsigned();
            $table->index(['is_del', 'is_recommend', 'category_id', 'state']);
            $table->index(['relation_flag', 'origin_site']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
