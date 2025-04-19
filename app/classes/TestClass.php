<?php

namespace App\classes;

use App\classes\Fascade\TestFascade;

class TestClass extends ParentClass
{
    use traitClass;

    public int $counter = 0;

    public function __construct()
    {
        dump(
            "class construcotr"
        );
    }

    public static function test(){

        TestFascade::checkcounter();
    }

    public function checkcounter()
    {
        $this->counter++;
        dump($this->counter);
    }
    public function greet()
    {
        return "Hello,Welcome to the custom fascade";
    }

    public function check()
    {
        $this->protectedfunction();
        $this->publicfunction();
    }
}
