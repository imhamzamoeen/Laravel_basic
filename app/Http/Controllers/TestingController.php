<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class TestingController extends Controller
{
    //
    public function index(TestRequest $request):View
    {
        $old_array=['first'=>'new','second'=>'old'];
        ['first'=>$first,'second'=>$second]=$old_array;
        dd($first);
    //     $user=User::find(1);
    //        if ($user->can('viewAny',User::class)) {
    //         dd("gia");
    //         } else {
    //         dd("nhe gia");
    //       }

        return view('js');
    }
}
