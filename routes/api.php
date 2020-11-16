<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\Owners;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(["prefix" => "owners"], function() {
    // GET homestead.test/api/owners show all articles
    Route::get("",[Owners::class, "index"]);
    //POST homestead.test/api/owners create an article
    Route::post("",[Owners::class, "store"]);

    Route::group(["prefix" => "{owner}"], function(){
        // GET homestead.test/api/owners/1 show the article based off given id
        Route::get("",[Owners::class, "show"]);
        // PUT homestead.test/api/owners/1 update specific article
        Route::put("",[Owners::class, "update"]);
        // DELETE homestead.test/api/owners/1 delete a specific article
        Route::delete("",[Owners::class, "destroy"]);
    });

});



