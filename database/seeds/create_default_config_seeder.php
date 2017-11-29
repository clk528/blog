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
            'content' => '今天是:' . date('Y-m-d H:i:s') ,
            'tag' => 'test',
            'create_user' =>'admin',
            'modifiy_user' =>'admin',
        ]);

        \App\Entities\Comment::create([
            'cid' => 0,
            'aid' => $article->id,
            'content' => '写的非常好',
            'type' => 1,
            'create_user' =>'admin',
            'modifiy_user' =>'admin'
        ]);

        $role = \App\Entities\Role::create([
            'name' => '管理员',
            'description' => '这是管理员角色'
        ]);

        \App\Entities\User::create([
            'user' => 'admin',
            'alias' => 'undefined',
            'password' => md5('555454654465s4dfsd6f4sdfssf4974sdfs'),
            'role' => $role->id,
            'email' => 'clk528@qq.com',
            'github' => 'https://github.com/clk528',
            'weibo' => '归薏',
            'facebook' => '陈龙科',
            'status' => 1,
            'create_user' => 'system',
            'modifiy_user' => 'system',
            'login_time' => time()
        ]);
    }
}
