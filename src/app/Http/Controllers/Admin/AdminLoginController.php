<?php
/**
 * Created by PhpStorm.
 * User: xiang
 * Date: 18/3/3
 * Time: 下午2:09
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function login(Request $request){
        return view('admin/index');
    }

    public function postLogin(Request $request){
        if ($request->input('name') == 'yuxiangxiang' && $request->input('password') == 'xiangxiangyu'){
            $request->session()->put(self::SESSION_ADMIN_SIGNED, 1);
            return response(array(
                "data" => array(
                    "url" => "/admin/index"
                ),
                'status' => 1,
                'info' => 'ok'
            ));
        } else{
            return response(array(
                "data" => array(
                ),
                'status' => 0,
                'info' => 'error'
            ));
        }
    }
}