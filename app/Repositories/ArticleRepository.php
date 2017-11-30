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

        $perPage = request('per_page',20);

//        $search = [
//            'title' => 'test',
//            'tag' => 'php'
//        ];

        $model = $this->article;

        collect($search)->each(function($v,$k) use(&$model){
            $model = $model->Where($k,'like',"%{$v}%");
        });

        return $model->paginate($perPage,['id','title','tag','create_user as createUser','modifiy_user as modifiyUser','created','modified']);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getArticle($id)
    {
        return $this->article->whereId($id)->get(['id','title','content','tag','create_user as createUser','modifiy_user as modifiyUser','created','modified']);
    }
}