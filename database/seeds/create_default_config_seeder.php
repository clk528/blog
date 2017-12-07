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
        $role = \App\Entities\Role::create([
            'name' => '管理员',
            'description' => '这是管理员角色'
        ]);

        $user = \App\Entities\User::create([
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

        $article1 = \App\Entities\Article::create([
            'title' => 'test',
            'subtitle' => '测试子标题',
            'markdown' => file_get_contents(base_path()."/tests/test.md"),
            'html' => file_get_contents(base_path()."/tests/test.html"),
            'tag' => 'test',
            'create_user' => $user->create_user,
            'modify_user' => $user->create_user,
        ]);

        \App\Entities\Comment::create([
            'cid' => 0,
            'aid' => $article1->id,
            'content' => '写的非常好',
            'type' => 1,
            'create_user' => $user->create_user,
            'modify_user' => $user->create_user
        ]);


        $article2 = \App\Entities\Article::create([
            'title' => '恢复git reset后的commit',
            'subtitle' => 'git 恢复',
            'markdown' => file_get_contents(base_path()."/tests/test2.md"),
            'html' => file_get_contents(base_path()."/tests/test2.html"),
            'tag' => 'git',
            'create_user' => $user->create_user,
            'modify_user' => $user->create_user,
        ]);

        \App\Entities\Comment::create([
            'cid' => 0,
            'aid' => $article2->id,
            'content' => '写的非常好',
            'type' => 1,
            'create_user' => $user->create_user,
            'modify_user' => $user->create_user
        ]);
    }
}
