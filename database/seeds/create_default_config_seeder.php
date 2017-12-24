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
        //角色
        $role = \App\Entities\Role::create([
            'name' => '管理员',
            'description' => '这是管理员角色'
        ]);
        //用户
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
        //类别
        $category = \App\Entities\Categorie::create([
            'name' => '测试',
            'create_user' => $user->user,
            'modify_user' => $user->user
        ]);

        $category2 = \App\Entities\Categorie::create([
            'name' => 'php',
            'create_user' => $user->user,
            'modify_user' => $user->user
        ]);

        $category3 = \App\Entities\Categorie::create([
            'name' => 'linux',
            'create_user' => $user->user,
            'modify_user' => $user->user
        ]);

        //文章
        $article1 = \App\Entities\Article::create([
            'title' => 'test',
            'subtitle' => '测试子标题',
            'markdown' => file_get_contents(base_path()."/tests/test.md"),
            'html' => file_get_contents(base_path()."/tests/test.html"),
            'category_id' => $category->id,
            'status' => 1,
            'create_user' => $user->create_user,
            'modify_user' => $user->create_user,
        ]);
        $article2 = \App\Entities\Article::create([
            'title' => 'PHP读取Excel的几种方式',
            'subtitle' => 'php读取Excel',
            'markdown' => file_get_contents(base_path()."/tests/test2.md"),
            'html' => file_get_contents(base_path()."/tests/test2.html"),
            'category_id' => $category2->id,
            'status' => 1,
            'create_user' => $user->create_user,
            'modify_user' => $user->create_user,
        ]);
        $article3 = \App\Entities\Article::create([
            'title' => 'CentOS之——CentOS7安装iptables防火墙',
            'subtitle' => 'CentOS7安装iptables防火墙',
            'markdown' => file_get_contents(base_path()."/tests/test3.md"),
            'html' => file_get_contents(base_path()."/tests/test3.html"),
            'category_id' => $category3->id,
            'status' => 1,
            'create_user' => $user->create_user,
            'modify_user' => $user->create_user,
        ]);
        //评论
        \App\Entities\Comment::create([
            'comment_id' => 0,
            'article_id' => $article1->id,
            'content' => '写的非常好',
            'type' => 1,
            'create_user' => $user->create_user,
            'modify_user' => $user->create_user
        ]);
        \App\Entities\Comment::create([
            'comment_id' => 0,
            'article_id' => $article2->id,
            'content' => '写的非常好',
            'type' => 1,
            'create_user' => $user->create_user,
            'modify_user' => $user->create_user
        ]);
        //标签
        $tag1 = \App\Entities\Tag::create([
            'name' => 'php',
            'create_user' => $user->user,
            'modify_user' => $user->user
        ]);
        $tag2 = \App\Entities\Tag::create([
            'name' => 'test',
            'create_user' => $user->user,
            'modify_user' => $user->user
        ]);
        $tag3 = \App\Entities\Tag::create([
            'name' => 'xls',
            'create_user' => $user->user,
            'modify_user' => $user->user
        ]);
        $tag4 = \App\Entities\Tag::create([
            'name' => 'linux',
            'create_user' => $user->user,
            'modify_user' => $user->user
        ]);
        //标签印射
        \App\Entities\ArticleTagMapping::insert([
            [
                'article_id' => $article1->id,
                'tag_id' => $tag1->id,
                'create_user' => $user->user,
                'modify_user' => $user->user,
                'created' => time(),
                'modified' => time()
            ],
            [
                'article_id' => $article2->id,
                'tag_id' => $tag1->id,
                'create_user' => $user->user,
                'modify_user' => $user->user,
                'created' => time(),
                'modified' => time()
            ],
            [
                'article_id' => $article2->id,
                'tag_id' => $tag2->id,
                'create_user' => $user->user,
                'modify_user' => $user->user,
                'created' => time(),
                'modified' => time()
            ],
            [
                'article_id' => $article2->id,
                'tag_id' => $tag3->id,
                'create_user' => $user->user,
                'modify_user' => $user->user,
                'created' => time(),
                'modified' => time()
            ],
            [
                'article_id' => $article3->id,
                'tag_id' => $tag4->id,
                'create_user' => $user->user,
                'modify_user' => $user->user,
                'created' => time(),
                'modified' => time()
            ]
        ]);
    }
}
