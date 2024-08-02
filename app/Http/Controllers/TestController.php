<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\classes\ChildClass;
use Exception;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __construct(){

    }
    //

    public function index(ChildClass $obj)
    {
        $cookie =  request()->cookie('cook');
        dd($cookie);
        try {
            return $obj->title();
            // $result=$this->getBook();
            // dd($result);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function getBook()
    {
        $id = 11;
        return $this->actualfinder($id);
    }
    public function  actualfinder($id)
    {
        try {
            return Book::findOrFail($id);
        } catch (Exception $e) {
            return $e;
        }
    }
}
