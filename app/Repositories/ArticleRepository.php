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

        //dd($this->article->with('category')->first(['title','id','category_id'])->toArray());

        $model = $this->article;

        collect($search)->each(function($v,$k) use(&$model){
            $model = $model->Where($k,'like',"%{$v}%");
        });

        collect($where)->each(function($v,$k) use(&$model){
            $model = $model->Where($k,$v);
        });


        return $model->with('category')->paginate($perPage,['id','title','category_id','subtitle','status','create_user as createUser','modify_user as modifyUser','created','modified']);
    }

    /**
     * 单独获取一片文章
     * @param $id
     * @param array $args
     * @return mixed
     */
    public function getArticle($id,array $args = [])
    {
        $sb = empty($args) ? ['id','title','html','category_id','create_user as createUser','modify_user as modifyUser','created','modified'] : $args;

        return $this->article->whereId($id)->first($sb);
    }

    /**
     * 添加一篇文章
     * @return mixed
     */
    public function addArticle()
    {
        $title = request('title');
        $article = [
            'title' => request('title'),
            'subtitle' =>  request('subtitle',$title),
            'markdown' =>  request('markdown'),
            'html' => request('html'),
            'status' => 0,
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
    /**
     * 上线一篇文章
     * @param $id
     * @return mixed
     */
    public function upArticle($id)
    {
        return $this->article->whereId($id)->update([
            'status' => 1
        ]);
    }
    /**
     * 下线一篇文章
     * @param integer $id
     * @return mixed
     */
    public function downArticle($id)
    {
        return $this->article->whereId($id)->update([
            'status' => 2
        ]);
    }
    /**
     * 删除文章
     * @param $id
     * @return mixed
     */
    public function deleteArticle($id)
    {
        return $this->article->whereId($id)->delete();
    }

    /**
     * 更新文章
     * @return bool
     */
    public function saveEditArticle()
    {
        $id = request('id','');
        if(empty($id)){
            return false;
        }
        $title = request('title','');
        $markdown = request('markdown','');
        $html = request('html','');
        $subtitle = request('subtitle','');

        return $this->article->whereId($id)->update([
            'status' => 0,
            'title' => $title,
            'markdown' => $markdown,
            'html' => $html,
            'subtitle' => $subtitle,
            'modified' => time(),
            'modify_user' => \Auth::user()->user
        ]);
    }
}