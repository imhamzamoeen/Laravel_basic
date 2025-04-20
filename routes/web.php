<?php

use App\classes\Fascade\TestFascade;
use App\classes\TestClass;
use App\Http\Controllers\ProfileController;
use App\Jobs\testJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('retry_function', function () {


        $result =  retry(5, function () {
            // Attempt 5 times while resting 100ms between attempts...
            // this will log attempting 5 times
            // each time it throw an exception but goes to catch after 5 times as result get exception after 5 tries
            dump('attempting');
            throw new \Exception('test');
        }, 100);
        dd($result);

});


Route::get(
    'test_class_check',
    function () {

        // the appservice provider singleton or bind dont have any impact on fascade as it will resoleve as one object
        // so for new object we can try self::clearResolvedInstance(ourClass::class); in the getfascadeaccessor method
        TestFascade::checkcounter();
        TestFascade::checkcounter();
        TestFascade::checkcounter();

        TestClass::test();


        return 1;
    }
);


Route::get('/', function () {

    return view('welcome');
});

Route::get('/dashboard', function () {
    // Session::put('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d', 2); // this will setup user 2 in the session and he will be treated as logged in user

    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



Route::get('/set-cookie', function () {
    // Get all cookies from the request
    return "afs";
    // Create a new response instance
    $response = new Response('Cookie has been set!');

    // Set the cookie using the withCookie() method
    $response->withCookie(cookie('laravel_basic', 'basic value', 60, '/',)); // setting domain to current domain i.e. the server domain
    // $response->withCookie(cookie('example_cookie', 'cookie_value', 60, '/', 'different_domain.com'));// setting to the different domain as it is supposed to be blocked by the browser

    // Return the response
    return $response;
});


Route::get('/read-cookies', function (Request $request) {
    // Get all cookies from the request
    $cookies = request()->cookie();
    // Return the cookies as JSON response
    return response()->json(['data' => $cookies]);
});
