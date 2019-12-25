<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
            $table->increments('id');
            $table->integer('book_id')->unsigned()->default(0);
            $table->string('parent_flag', 50);
            $table->string('relation_flag', 50);
            $table->string('origin_site', 80)->default('shuquge');
            $table->string('title', 50);
            $table->text('content');
            $table->integer('sort_weight')->unsigned()->default(0);
            $table->tinyInteger('is_del')->unsigned()->default(0);
            $table->integer('create_time')->unsigned();
            $table->index(['is_del', 'book_id']);
            $table->index(['parent_flag', 'relation_flag', 'origin_site']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
