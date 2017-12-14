<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comment_id',false,false)->default(0)->comment('评论ID');
            $table->integer('article_id')->default(0)->index()->comment('文章ID');
            $table->text('content')->comment('内容');
            $table->integer('type',false,false)->comment('评论类型:1、新增，2、回复');
            $table->string('create_user',50)->comment('修改者');;
            $table->string('modify_user',50)->comment('修改人');
            $table->integer('created',false,false)->comment('创建时间');
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
        Schema::dropIfExists('comments');
    }
}
