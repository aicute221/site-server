<?php
/**
 * Created by PhpStorm.
 * User: xiang
 * Date: 18/3/3
 * Time: 下午3:31
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\Blog;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){

    }

    public function page(Request $request, $id=''){
        return view('admin/article_page', ['id' => $id]);
    }

    public function add(Request $request){
        if (empty($request->input('title'))){
            return $this->ajax_error('标题不能为空');
        }
        if (empty($request->input('sub_title'))){
            return $this->ajax_error('副标题不能为空');
        }
        if (empty($request->input('author'))){
            return $this->ajax_error('作者不能为空');
        }
        if (empty($request->input('content'))){
            return $this->ajax_error('内容不能为空');
        }

        if (!empty($request->input('id'))){
            $blog = Blog::find($request->input('id'));
        }
        if (null == $blog){
            $blog = new Blog();
        }

        $blog->title = $request->input('title');
        $blog->sub_title = $request->input('sub_title');
        $blog->author = $request->input('author');
        $blog->content = htmlspecialchars($request->input('content'));
        $blog->summary = mb_substr(preg_replace_callback('/<.*?>/',function($match){
            return "";
        }, $request->input('content')), 0, 80);
        $blog->save();

        return $this->ajax_success(['url' => '/admin/articles']);
    }
}