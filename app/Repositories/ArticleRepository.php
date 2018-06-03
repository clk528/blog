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
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getArticleList()
    {
        $search = request('search', []);
        $where = request('where', []);

        $perPage = request('per_page', 20);

        //dd($this->article->with('category')->first(['title','id','category_id'])->toArray());

        $model = $this->article->Where('status', 1);


        collect($search)->each(function ($v, $k) use (&$model) {
            $model = $model->Where($k, 'like', "%{$v}%");
        });

        collect($where)->each(function ($v, $k) use (&$model) {
            if ($k == 'with' && is_array($v)) {
                if ($v['case'] == 'in') {
                    $model = $model->WhereIn($v['key'], $v['value']);
                }
            } else {
                $model = $model->Where($k, $v);
            }
        });

        $model->orderBy('id', 'desc');


        return $model->with(['category' => function ($query) {
            return $query->select(['id', 'name']);
        }])->paginate($perPage, ['id', 'title', 'category_id', 'subtitle', 'status', 'create_user as createUser', 'modify_user as modifyUser', 'created', 'modified']);
    }

    /**
     * 单独获取一片文章
     * @param $id
     * @param array $args
     * @return mixed
     */
    public function getArticle($id, array $args = [])
    {
        $sb = empty($args) ? ['id', 'status', 'title', 'html', 'category_id', 'create_user as createUser', 'modify_user as modifyUser', 'created', 'modified'] : $args;

        return $this->article->with(['category' => function ($query) {
            return $query->select(['id', 'name']);
        }])->whereId($id)->whereStatus(1)->first($sb);
    }

    /**
     * 添加一篇文章
     * @return mixed
     */
    public function addArticle()
    {
        $title = request('title');

        $tags = request('tags');

        $user = \Auth::user()->user;

        $article = [
            'title' => request('title'),
            'subtitle' => request('subtitle', $title),
            'markdown' => request('markdown'),
            'html' => request('html'),
            'category_id' => request('category', 1),
            'status' => 0,
            'create_user' => $user,
            'modify_user' => $user
        ];

        $result = $this->article->create($article);

        $this->article->mapping_tag_id($result, $tags);

        return $result;
    }

    /**
     * 修改文章
     * @return bool
     */
    public function modifyArticle()
    {
        $article = $this->article->whereId(1)->first(['*']);
        if (!is_null($article)) {
            return $article->update([
                'title' => '我是标题',
                'content' => '我是文章-----' . date('Y-m-d H:i:s'),
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
        $id = request('id', '');
        if (empty($id)) {
            return false;
        }
        $title = request('title', '');
        $markdown = request('markdown', '');
        $html = request('html', '');
        $subtitle = request('subtitle', '');

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