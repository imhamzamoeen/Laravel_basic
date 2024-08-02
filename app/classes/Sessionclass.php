<?php
namespace App\classes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Sessionclass extends Controller
{
    protected $cart_info;


    public function __construct(Request $request)
    {
        dump("controller");
        $this->middleware(function ($request, $next) {
            // Perform middleware logic
            
            // Access session values, if neede
            dump("constructor inside middleware");            
            // Continue to the next middleware or controller action
            return $next($request);
        });
    }

public function check(Request $request){
    // dump($this->cart_info);
    //here i am setting a value in session and will try to get that above
    // session(['middleware-check' => 'testsaifnasf']);
    dump($request->session()->get('test'));

    dd("The test function output is here");
}
}
