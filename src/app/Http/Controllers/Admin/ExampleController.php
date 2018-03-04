<?php
/**
 * Created by PhpStorm.
 * User: xiang
 * Date: 18/3/3
 * Time: 下午3:32
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\Example;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function index(){

    }

    public function page(Request $request, $id=""){
        return view('/admin/example_page', ['id' => $id]);
    }

    public function add(Request $request){
        if (empty($request->input('name'))){
            return $this->ajax_error('项目目录名不能为空');
        }
        if (empty($request->input('title'))){
            return $this->ajax_error('标题不能为空');
        }
        if (empty($request->input('type'))){
            return $this->ajax_error('类型不能为空');
        }

        $example = null;
        if ($request->input('id')){
            $example = Example::find($request->input('id'));
        }
        if (null == $example){
            $example = new Example();
        }
        $example->name = $request->input('name');
        $example->title = $request->input('title');
        $example->e_type = $request->input('type');
        $example->save();
        return $this->ajax_success(array(
            'url' => '/admin/examples'
        ));
    }

    /**
     * @param Request $request
     * @param string $id
     * @return Response json
     */
    public function detail(Request $request){
        $example = Example::find($request->input('id'));
        if(null == $example){
            return $this->ajax_error('数据不存在');
        } else{
            return $this->ajax_success(array(
                'id' => $example->id,
                'name' => $example->name,
                'title' => $example->title,
                'type' => $example->e_type
            ));
        }
    }
}