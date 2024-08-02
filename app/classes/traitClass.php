<?php
namespace App\classes;
trait traitClass {

    public function __construct(){
        dump(
            "trait construcotr"
        );
    }

    public function title()
    {
        echo "trait  class method title called ";
    }

    protected function  protectedfunction(){
        dump("protected function");
    }

    public function  publicfunction(){
        dump("public function");
    }
}
