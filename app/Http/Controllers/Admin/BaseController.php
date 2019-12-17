<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public $_sidebar;
    public function __construct(){

    }
    protected function render($view, $data = null){
        $_data = ['sidebar' => $this->_sidebar];
        if($data){
            $_data = array_merge($data, $_data);
        }
        return view($view, $_data);
    }
}
