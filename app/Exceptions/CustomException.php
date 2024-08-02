<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class CustomException extends Exception
{
    //
    public function report(){

    }

    public function render($request){
     return response()->json([
        'message'=>$this->message,
        'status'=>$this->getLine(),
     ]);
    }
}
