<?php
/**
 * Created by PhpStorm.
 * User: clk
 * Date: 2018/3/4 0004
 * Time: 17:21
 */

namespace App\Repositories;
use  App\Entities\Categorie;

class CategoriesRepository
{
    protected $categories;

    public function __construct(Categorie $categories)
    {
        $this->categories = $categories;
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getCategoriesList()
    {
        $search = request('search',[]);
        $where = request('where',[]);

        $perPage = request('per_page',20);

        $model = $this->categories;

        collect($search)->each(function($v,$k) use(&$model){
            $model = $model->Where($k,'like',"%{$v}%");
        });

        collect($where)->each(function($v,$k) use(&$model){
            $model = $model->Where($k,$v);
        });

        $model->orderBy('id','desc');

        return $model->paginate($perPage);
    }
    /**
     * 获取分类
     * @return array
     */
    function getCategories()
    {
        return $this->categories->all(['id','name'])->toArray();
    }

    public function addCategories($name)
    {
        $result = $this->categories->whereName($name)->first();

        if( is_null($result) ){
            $user = \Auth::user()->user;

            $data = [
                'name' => $name,
                'create_user' => $user,
                'modify_user' => $user,
                'created' => time(),
                'modified' => time()
            ];
            return $this->categories->create( $data );
        }

        return false;
    }

    public function deleteCategories($id)
    {
        return $this->categories->whereId($id)->delete();
    }

    public function updateCategories($id,$name)
    {
        $result = $this->categories->whereId($id)->first();

        if( !is_null($result) ){

            if(!is_null($this->categories->whereName($name)->first())){
                return false;
            }

            $user = \Auth::user()->user;

            return $result->update([
                'name' => $name,
                'create_user' => $user,
                'modify_user' => $user,
                'created' => time(),
                'modified' => time()
            ]);
        }
        return false;
    }
}