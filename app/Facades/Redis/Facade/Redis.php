<?php
namespace App\Facades\Redis\Facade;

use Illuminate\Support\Facades\Facade;

class Redis extends Facade{


      public static function getFacadeAccessor()
      {
          return 'opRedis';
      }
}