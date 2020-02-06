<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function md5Check()
    {
        //echo 11111;
        echo "接收的数据  ：";echo '</br>';
        echo '<pre>';print_r($_GET);echo '</pre>';

        $key="1905";
        //验签
        $data=$_GET['data'];
        $signature=$_GET['signature'];

        //计算签名
        $s=md5($data.$key);
        echo "接收端计算的签名 ：".$s;echo '</br>';

        //签名对比
        if($s==$signature){
            echo "验签通过";
        }else{
            echo "验签失败";
        }
    }
}
