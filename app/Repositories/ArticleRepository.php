<?php
/**
 * Created by PhpStorm.
 * User: clk528
 * Date: 2017-11-30
 * Time: 10:09
 */

namespace App\Repositories;

use App\Entities\Article;

class ArticleRepository
{
    /**
     * @var Article
     */
    protected $article;

    /**
     * ArticleRepository constructor.
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * 获取文章翻页
     * @return mixed
     */
    public function getArticleList()
    {
        $search = request('search',[]);
        $where = request('where',[]);


        $perPage = request('per_page',20);

//        $search = [
//            'title' => 'test',
//            'tag' => 'php'
//        ];

        $model = $this->article;

        collect($search)->each(function($v,$k) use(&$model){
            $model = $model->Where($k,'like',"%{$v}%");
        });

        collect($where)->each(function($v,$k) use(&$model){
            $model = $model->Where($k,$v);
        });

        return $model->paginate($perPage,['id','title','tag','status','create_user as createUser','modify_user as modifyUser','created','modified']);
    }

    /**
     * 单独获取一片文章
     * @param int $id
     * @return mixed
     */
    public function getArticle($id)
    {
        return $this->article->whereId($id)->get(['id','title','html','tag','create_user as createUser','modify_user as modifyUser','created','modified']);
    }

    /**
     * 添加一篇文章
     * @return mixed
     */
    public function addArticle()
    {
        $article = [
            'title' => request('title'),
            'markdown' =>  request('markdown'),
            'html' =>  request('html'),
            'create_user' => \Auth::user()->user,
            'modify_user' => \Auth::user()->user
        ];

        return $this->article->create($article);
    }

    /**
     * 修改文章
     * @return bool
     */
    public function modifyArticle()
    {
        $article = $this->article->whereId(1)->first(['*']);
        if(!is_null($article)){
            return $article->update([
                'title' => '我是标题',
                'content' => '我是文章-----'.date('Y-m-d H:i:s'),
                'tag' => 'zihuan',
                'create_user' => 'admin',
                'modify_user' => 'admin'
            ]);
        }
        return false;
    }
}