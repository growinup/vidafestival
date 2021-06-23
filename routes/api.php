<?php

use Illuminate\Support\Str;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Setup CORS */
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::post('login', 'Auth\LoginController@ApiLogin');
Route::post('login', function (Request $request) {
    
    if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
        // Authentication passed...
        $user = auth()->user();
        $user->api_token = Str::random(64);
        $user->save();
        return response()->json([
            'OK' => 'Success',
            'data' => $user,
            'statuscode' => 200,
            'test' => 'OK'
        ], 200);
    }
    
    return response()->json([
        'error' => 'Usuario sin autenticar',
        'code' => 401,
    ], 401);
});

Route::middleware('auth:api')->post('logout', function (Request $request) {
    
    if (auth()->user()) {
        $user = auth()->user();
        $user->api_token = null; // clear api token
        $user->save();

        return response()->json([
            'message' => 'Gracias por usa appcess',
        ]);
    }
    
    return response()->json([
        'error' => 'No ha sido posible cerrar sesión',
        'code' => 401,
    ], 401);
});


// Route::post('contacts','ContactsController@store');
// Route::get('contacts/{contact}','ContactsController@show');