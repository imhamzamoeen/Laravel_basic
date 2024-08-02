<?php
namespace App\classes\Fascade;

use Illuminate\Support\Facades\Facade;

class TestFascade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'test';
    }
}
