<?php

namespace App\Http\Controllers;

use App\Dto\UserDto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
    //
    public function index()
    {
        // its like apiresource::collections()
        return UserDto::collect(User::all());
    }

    public function show(User $user)
    {
        // return $user->getData(); //  by adding withdata trait to model, request and defining method like data:class we can get dto
        // we can create a dto from any thing like array collect model etc
        return UserDto::from($user);
    }


    public function store(UserDto $data)
    {
        return UserDto::from($data);

        dd($data->toArray());
    }
}
