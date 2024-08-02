<?php

namespace App\classes;

class ParentClass
{

    public function __construct()
    {
        dump("parent class constructor called");
    }
    public function title()
    {
        echo "parent class method called ";
    }

    public static function main(){

        dd((new static()));
        return (new static())->title();
    }
}
