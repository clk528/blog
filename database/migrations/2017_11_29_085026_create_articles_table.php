<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id')->comment('id,文章ID');
            $table->string('title',120)->unique('UNIQUE-TITLE')->comment('标题');
            $table->string('subtitle',120)->comment('子标题');
            $table->text('markdown')->comment('markdown');
            $table->mediumText('html')->comment('html');
            $table->string('tag',50)->default('1')->comment('标签');
            $table->integer('status',false,false)->index('Index_Status')->default(0)->comment('0:待发表，1：已发表，2：已下架');
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
        Schema::dropIfExists('articles');
    }
}
