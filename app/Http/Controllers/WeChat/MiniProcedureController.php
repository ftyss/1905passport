<?php

namespace App\Http\Controllers\WeChat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MiniProcedureController extends Controller
{
    /**
     * 轮播图请求passport
     */
    public function images()
    {
        $arr=[
            ['image'=>'/images/1.jpg','text'=>"火龙果"],
            ['image'=>'/images/2.jpg','text'=>"橙子"],
            ['image'=>'/images/3.jpg','text'=>"草莓"]
        ];

        echo json_encode($arr);
    }
}
