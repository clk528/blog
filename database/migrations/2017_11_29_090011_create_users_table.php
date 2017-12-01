<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user', 50)->index()->unique()->comment('用户名');
            $table->string('alias', 50)->index()->unique()->comment('昵称');
            $table->string('password', 120)->comment('密码');
            $table->integer('role', false,false)->default(1)->comment('角色');
            $table->string('email', 50)->nullable()->comment('邮箱');
            $table->string('github', 50)->nullable()->comment('github');
            $table->string('weibo', 50)->nullable()->comment('微博');
            $table->string('facebook', 50)->nullable()->comment('脸书');
            $table->integer('status', false,false)->default(1)->comment('状态:1、正常，2、冻结');
            $table->rememberToken();
            $table->string('create_user',50)->index()->comment('创建者');
            $table->string('modify_user',50)->comment('修改者');
            $table->integer('created', false,false)->comment('创建时间');
            $table->integer('modified', false,false)->comment('修改时间');
            $table->integer('login_time',false,false)->nullable()->comment('登录时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
