<?php
/**
 * Created by PhpStorm.
 * User: xiang
 * Date: 18/3/3
 * Time: 上午11:32
 */

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use App\Model\Blog;
use App\Model\Example;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    const TYPE_TO_URL = array(
        'js' => '/image/js.jpg',
        'css' => '/image/css3.jpg',
        'html' => '/image/h5.jpg'
    );

    public function articleList(Request $request){
        $blogs = Blog::orderBy('id', 'desc')->take(20)->get();
        $data = [];
        foreach ($blogs as $blog){
            $data[] = array(
                "id" => $blog->id,
                "title" => $blog->title,
                "sub_title" => $blog->sub_title,
                "summary" => $blog->summary,
                "author" => $blog->author,
                "time" => $blog->created_at->format('Y-m-d H:i:s')
            );
        }
        return response(array(
            "status" => 1,
            "info" => "ok",
            "data" => $data
        ));
    }

    public function exampleList(Request $request){
        $examples = Example::orderBy('id', 'desc')->take(50)->get();
        $data = [];
        foreach ($examples as $example){
            $data[] = array(
                "title" => $example->title,
                "cover_url" => self::TYPE_TO_URL[$example->e_type],
                "id" => $example->id,
                "name" => $example->name,
                "type" => $example->e_type
            );
        }
        return response(array(
            "status" => 1,
            "info" => "ok",
            "data" => $data
        ));
    }

    public function articleDetailPage($id){
        $blog = Blog::find($id);
        $title = '详细内容';
        if (!empty($blog)){
            $title = $blog->title;
        }
        return view('home.detail', ['id' => $id, 'title' => $title]);
    }

    public function articleDetail(Request $request){
        if (empty($request->input('id'))){
            return $this->ajax_return([]);
        }

        $blog = Blog::find($request->input('id'));
        if (empty($blog)){
            return $this->ajax_return([]);
        } else{
            return $this->ajax_return([
                'title' => $blog->title,
                'sub_title' => $blog->sub_title,
                'summary' => $blog->summary,
                'content' => htmlspecialchars_decode($blog->content),
                'create_time' => $blog->created_at->format('Y-m-d H:i:s'),
                'time' => $blog->created_at->format('Y.m.d'),
                'author' => $blog->author
            ]);
        }
    }

    public function example(Request $request, $name){
        return view('example/' . $name);
    }
}