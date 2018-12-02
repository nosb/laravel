<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018/11/29
 * Time: 3:08 PM
 */


// 代码【2】


class Bar
{
    private $bim;



    public function doSomething()
    {
        $this->bim->doSomething();
        echo __METHOD__, '|';
    }
}

class Foo
{
    private $bar;

    public function __construct(Bar $bar)
    {
        var_dump($bar);exit;
        $this->bar = $bar;
    }

    public function doSomething()
    {
        $this->bar->doSomething();
        echo __METHOD__;
    }
}

$foo = new Foo(new Bar);
$foo->doSomething(); // Bim::doSomething|Bar::doSomething|Foo::doSomething

