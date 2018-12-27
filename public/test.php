<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018/11/29
 * Time: 3:08 PM
 */
/*function myException($exception)
{
    echo "<b>Exception:</b> " , $exception->getMessage();
}

set_exception_handler('myException');
throw new Exception('Uncaught Exception occurred');

myException();*/

/*$exception = new Exception('Danger, Will Robinson!', 100);

echo $exception->getCode();
echo  $exception->getMessage();*/
// /usr/local/Cellar/php/7.2.12/pecl/20170718/
//phpinfo();

function string($n){
    return $n.'-';

}$input = array("Neo", "Morpheus", "Trinity", "Cypher", "Tank");
$b = array_map('string',$input);
print_r($b);