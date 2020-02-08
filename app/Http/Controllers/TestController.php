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


    public function md5Check1()
    {
        //echo 1111;
        echo "接收的数据  ：";echo '</br>';
        echo '<pre>';print_r($_POST);echo '</pre>';

        $key="1905";
        //验签
        $data=$_POST['data'];
        $sign=$_POST['sign'];

        //计算签名
        $s=md5($data.$key);
        echo "接收端计算的签名 ：".$s;echo '</br>';

        //签名对比
        if($s==$sign){
            echo "验签通过";
        }else{
            echo "验签失败";
        }
    }

    public function md5Check2()
    {
        //echo 123;die;
        echo '<pre>';print_r($_GET);echo '</pre>';
        $data=$_GET['data'];
        $sign=$_GET['sign'];
        //echo $data;echo '</br>';
        //echo $sign;echo '</br>';

        $sign_str=base64_decode($sign);
        echo "base64_decode后的数据 ：".$sign_str;echo '</br>';

        //验签
        $path=storage_path('keys/pub.key');
        $pkeyid=openssl_pkey_get_public("file://".$path);

         $d=openssl_verify($data,$sign_str,$pkeyid);
         openssl_free_key($pkeyid);
         if($d==1){
             echo "验签通过";
         }else{
             echo "验签失败";
         }   
    }

    /**
     * 对称解密
     */
    public function decrypt()
    {
        //echo 123;die;
        echo '<pre>';print_r($_GET);echo '</pre>';
        $data=$_GET['data'];
        $d=base64_decode($data);
        echo "接收的数据 ：".$data;echo '</br>';
        echo "base64_decode之后的数据 ：".$d;echo '</br>';

        //对称解密
        $method='AES-256-CBC';
        $key='1905';
        $iv='amfkjjjdsvkwdsja';
        $dec_data=openssl_decrypt($d,$method,$key,OPENSSL_RAW_DATA,$iv);
        echo "解密数据 ：".$dec_data;
    }

    /**
     * 非对称解密
     */
    public function decrypt2()
    {
        //echo 123;
        //print_r($_GET);die;
        $enc_data_str=$_GET['data'];
        echo "接收到的数据 ：".$enc_data_str;echo '</br>';
        //echo 123;die;
        $base64_decode_str=base64_decode($enc_data_str);echo '</br>';
        $pub_key=file_get_contents(storage_path('keys/pub.key'));
        openssl_public_decrypt($base64_decode_str,$dec_data,$pub_key);
        echo "解密数据 ：".$dec_data;
    }
}
