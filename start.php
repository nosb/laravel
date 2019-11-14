<?php
/**
 * run with command
 * php start.php start
 */

ini_set('display_errors', 'on');
use Workerman\Worker;

if(strpos(strtolower(PHP_OS), 'win') === 0)
{
    exit("start.php not support windows, please use start_for_win.bat\n");
}

// 检查扩展
if(!extension_loaded('pcntl'))
{
    exit("Please install pcntl extension. See http://doc3.workerman.net/appendices/install-extension.html\n");
}

if(!extension_loaded('posix'))
{
    exit("Please install posix extension. See http://doc3.workerman.net/appendices/install-extension.html\n");
}

// 标记是全局启动
define('GLOBAL_START', 1);

require_once __DIR__ . '/vendor/autoload.php';



// 加载所有Applications/*/start.php，以便启动所有服务
foreach(glob(__DIR__.'/app/WorkerMan/start*.php') as $start_file)
{
    require_once $start_file;
}

start();
// 运行所有服务
Worker::runAll();

function start(){

	echo "初始: ".memory_get_usage()." 字节 \n";
	define('LARAVEL_START', microtime(true));
	require __DIR__.'/vendor/autoload.php';
	$app = require_once __DIR__.'/bootstrap/app.php';
	$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
	$response = $kernel->handle(
		$request = Illuminate\Http\Request::capture()
	);

	//$response->send();
	$kernel->terminate($request, $response);
	echo "内存总量: ".memory_get_peak_usage()." 字节 \n";
	echo "最终: ".memory_get_usage()." 字节 \n";
}

