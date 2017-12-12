<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',60)->unique()->index()->comment('类别名称');
            $table->string('create_user',50)->index()->comment('创建者');
            $table->string('modify_user',50)->comment('修改者');
            $table->integer('created', false,false)->comment('创建时间');
            $table->integer('modified', false,false)->comment('修改时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
