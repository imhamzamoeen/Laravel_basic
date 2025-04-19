<?php
namespace App\classes\Fascade;

use App\classes\TestClass;
use Illuminate\Support\Facades\Facade;

class TestFascade extends Facade
{

    protected static function getFacadeAccessor()
    {
        // self::clearResolvedInstance('test'); // but what it does is that it makes a new object each time fascade is called
        return 'test';
    }
}
