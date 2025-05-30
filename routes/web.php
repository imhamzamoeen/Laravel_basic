<?php

use App\classes\Fascade\TestFascade;
use App\classes\TestClass;
use App\Http\Controllers\ProfileController;
use App\Jobs\testJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
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


Route::get('callback_scope', function () {

    class task
    {
        public string $name = "hamza";
        public function __construct()
        {
            dump("class"); // called when the class is instantiated
            $this->callbackmethod = function ($args) {
                dump("callback method");
                dump($this->name." is old"); // this will be the task object printing the name propoerty
                $this->name= 'srk';  // this also works. like from newRunner class i am able to change this
                dump($this->name." is new"); // this will be the task object printing the name propoerty

                return $this->name . " " . $args;
            };
        }
        public function run(callable $callback)
        {
            dump("run"); // called when the run method is called
            return  call_user_func_array($callback, [$this->name]);
            // return $callback($this->name);  // this also works
        }

        public $callbackmethod;
    }
    class newRunner
    {
        public function __construct()
        {
            dump("newRunner"); // called when the class is instantiated
        }
        public string $name = 'fisal';

        public function handle(callable $callback)
        {
            dump("newRunner handle"); // called when the class is instantiated
            return  call_user_func_array($callback, [$this->name]);
        }
    }

    $taskRunner = new task();
    $newRunner = new newRunner();
    return $newRunner->handle(callback: $taskRunner->callbackmethod); // ✅ Works too
    return 1;
    dump("after constructor called");
    $callback = function ($name) use ($taskRunner) {
        dump($taskRunner->name); // this will be the task object printing the name propoerty
        dump("callback");  // called after the creation of class instance and when the callback is called from run
        dump(var: $name); // whatever given from clsas
    };
    // Run the callback using the TaskRunner
    $result = $taskRunner->run($callback);
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


Route::get('/permist-lock1', function (Request $request) {
    DB::statement('SET TRANSACTION ISOLATION LEVEL SERIALIZABLE');

    DB::transaction(function () {
        // Set isolation level to SERIALIZABLE to block other transactions from reading or writing

        // Lock the row for update
        $user = User::where('id', 1)->lockForUpdate()->first();
        sleep(15); // Simulate some processing time
        // Perform updates
        $user->name = 'Updated Name';
        $user->save();
    });

});


Route::get('/permist-lock2', function (Request $request) {
   return $user = User::where('id', operator: 1)->sharedLock()->first();

    return User::first();
    echo $updated = User::where('id', 1)->update([
        'name' => 'ustu b new name',
    ]);
    return response()->json(['updated' => $updated]);
});
