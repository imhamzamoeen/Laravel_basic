<?php

namespace App\classes;

class ChildClass extends ParentClass
{
    // private $obj;
    // public function __construct(ParentClass $obj)
    // {
    //     $this->obj=$obj;

    //     dump("child class constructor is called ");
    // }

    public function title()
    {
        echo "child title ";
    }
    public function parenttest(){
        return (new static())->title();
    }


}
