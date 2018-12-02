<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018/11/29
 * Time: 3:08 PM
 */



class test{

    public function __construct()
    {
        echo 1;
    }
}



$func = function(){
    exit('Hello world!!');
};

$func;