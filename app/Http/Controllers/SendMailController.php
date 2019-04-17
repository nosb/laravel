<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


//发送邮件案例
class SendMailController extends Controller
{
    public function index(){
     /*   $flag= Mail::raw('你好，我是PHP程序！',function($message) {
            $to='125534732@qq.com';
            $message->to($to)->subject('纯文本信息邮件测试');
        });
        dd($flag);*/

        $data = ['email'=>'125534732@qq.com', 'name'=>'这是一个测试邮件', 'uid'=>888888, 'activationcode'=>'ndy'];
        Mail::send('sendMail', $data, function($message) use($data)
        {
            $message->to($data['email'], $data['name'])->subject('欢迎注册我们的网站，请激活您的账号！');
        });
    }

    public function active(){
        echo 1;
    }
}
