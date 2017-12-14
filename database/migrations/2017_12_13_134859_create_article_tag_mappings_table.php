<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTagMappingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_tag_mappings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id',false,false)->comment('文章id');
            $table->integer('tag_id',false,false)->comment('标签id');
            $table->string('create_user',50)->index()->comment('创建者');
            $table->string('modify_user',50)->comment('修改者');
            $table->integer('created',false,false)->comment('创建日期');
            $table->integer('modified',false,false)->comment('修改日期');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_tag_mappings');
    }
}
