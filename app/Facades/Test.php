<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Test extends Facade{


      public static function getFacadeAccessor()
      {
          return 'tests';
      }
}