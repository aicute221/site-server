<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const SESSION_ADMIN_SIGNED = 'admin_signed';

    protected function ajax_success($data){
        return $this->ajax_return($data);
    }

    protected function ajax_error($message){
        return $this->ajax_return([], 0, $message);
    }

    protected function ajax_return($data, $status=1, $info="ok"){
        return response(json_encode(array(
            'data' => $data,
            'status' => $status,
            'info' => $info
        )));
    }
}
