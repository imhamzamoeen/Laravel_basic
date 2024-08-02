<?php
namespace App\isop;
use Illuminate\Support\Facades\Facade;
class isopfacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'isop';
    }
}
