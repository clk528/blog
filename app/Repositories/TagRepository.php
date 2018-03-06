<?php
/**
 * Created by PhpStorm.
 * User: clk528
 * Date: 2017-12-13
 * Time: 14:47
 */

namespace App\Repositories;

use App\Entities\Tag;

class TagRepository
{
    /**
     * @var Tag
     */
    protected $tag;

    /**
     * TagRepository constructor.
     * @param Tag $tag
     */
    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    /**
     * 获取标签
     * @param $where
     * @return array
     */
    function getTag($where)
    {
        if($where){
            $model = $this->tag;

            collect($where)->map(function($v,$k)use(&$model){
                if($k =='with' && is_array($v)){
                    if($v['case'] == 'in'){
                        $model = $model->WhereIn($v['key'],$v['value']);
                    }
                }else{
                    $model = $model->Where($k,$v);
                }
            });

            return $model->get(['id','name'])->toArray();
        }
        return $this->tag->all(['id','name'])->toArray();
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getTagList()
    {
        $search = request('search',[]);
        $where = request('where',[]);

        $perPage = request('per_page',20);

        $model = $this->tag;

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
     * @param $name
     * @return bool
     */
    public function addTag($name)
    {
        $result = $this->tag->whereName($name)->first();

        if( is_null($result) ){
            $user = \Auth::user()->user;

            $data = [
                'name' => $name,
                'create_user' => $user,
                'modify_user' => $user,
                'created' => time(),
                'modified' => time()
            ];
            return $this->tag->create( $data );
        }

        return false;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteTag($id)
    {
        return $this->tag->whereId($id)->delete();
    }

    /**
     * @param $id
     * @param $name
     * @return bool
     */
    public function updateTag($id,$name)
    {
        $result = $this->tag->whereId($id)->first();

        if( !is_null($result) ){

            if(!is_null($this->tag->whereName($name)->first())){
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