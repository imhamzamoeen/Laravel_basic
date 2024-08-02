<?php
namespace App\classes;
class TestClass extends ParentClass
{
    use traitClass;

    public function __construct(){
        dump(
            "class construcotr"
        );
    }
    public function greet()
    {
        return "Hello,Welcome to the custom fascade";
    }

    public function check(){
        $this->protectedfunction();
        $this->publicfunction();

    }

}
