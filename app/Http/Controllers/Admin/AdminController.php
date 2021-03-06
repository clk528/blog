<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.home',['page'=>__FUNCTION__,'title'=>'-主页']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function blog()
    {
        return view('admin.blog',['page'=>__FUNCTION__,'title'=>'-文章']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function categoriesManger()
    {
        return view('admin.categoriesManger',['page'=>__FUNCTION__,'title'=>'-分类管理']);
    }
    public function tagsManger()
    {
        return view('admin.tagsManger',['page'=>__FUNCTION__,'title'=>'-标签管理']);
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile()
    {
        return view('admin.profile',['page'=>__FUNCTION__,'title'=>'-个人信息']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function forms()
    {
        return view('admin.forms',['page'=>__FUNCTION__,'title'=>'-表单']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function typography()
    {
        return view('admin.typography',['page'=>__FUNCTION__,'title'=>'-字体展示']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function bootstrapElements()
    {
        return view('admin.bootstrapElements',['page'=>__FUNCTION__,'title'=>'-Bootstrap 的样式']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function bootstrapGrid()
    {
        return view('admin.bootstrapGrid',['page'=>__FUNCTION__,'title'=>'-Bootstrap 栅格系统']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addArticle()
    {
        $category = \DB::table('categories')->get(['id','name']);
        $tag = \DB::table('tags')->get(['id','name']);

        $data = [
            'category' => $category,
            'tags' => $tag
        ];

        return view('admin.addArticle',['page'=>'blog','title'=>'-添加文章'],$data);
    }
}
