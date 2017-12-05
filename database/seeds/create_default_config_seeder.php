<?php

use Illuminate\Database\Seeder;

class create_default_config_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $article = \App\Entities\Article::create([
            'title' => 'test',
            'markdown' => '写的非常好',
            'html' => '<p>写的非常好</p>',
            'tag' => 'test',
            'create_user' =>'admin',
            'modify_user' =>'admin',
        ]);

        \App\Entities\Comment::create([
            'cid' => 0,
            'aid' => $article->id,
            'content' => '写的非常好',
            'type' => 1,
            'create_user' =>'admin',
            'modify_user' =>'admin'
        ]);

        $role = \App\Entities\Role::create([
            'name' => '管理员',
            'description' => '这是管理员角色'
        ]);

        \App\Entities\User::create([
            'user' => 'clk',
            'alias' => 'undefined',
            'password' => bcrypt(123456),
            'role' => $role->id,
            'email' => 'clk528@qq.com',
            'github' => 'https://github.com/clk528',
            'weibo' => '归薏',
            'facebook' => '陈龙科',
            'status' => 1,
            'create_user' => 'system',
            'modify_user' => 'system',
            'login_time' => time()
        ]);
    }
}
