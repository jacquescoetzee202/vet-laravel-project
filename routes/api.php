<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\Owners;
use App\Http\Controllers\API\Animals;
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
    // GET homestead.test/api/owners show all owners
    Route::get("",[Owners::class, "index"]);
    //POST homestead.test/api/owners create an owner
    Route::post("",[Owners::class, "store"]);

    Route::group(["prefix" => "{owner}"], function(){
        // GET homestead.test/api/owners/1 show the owner based off given id
        Route::get("",[Owners::class, "show"]);
        // PUT homestead.test/api/owners/1 update specific owner
        Route::put("",[Owners::class, "update"]);
        // DELETE homestead.test/api/owners/1 delete a specific owner
        Route::delete("",[Owners::class, "destroy"]);

        Route::group(["prefix" => "animals"], function(){
            // GET homestead.test/api/owners/animals show all the animals
            Route::get("",[Animals::class, "index"]);
            Route::post("",[Animals::class, "store"]);
            
            Route::group(["prefix" => "{animal}"], function(){
                // GET homestead.test/api/owners/animals/{animal} route that shows a specific animal
                Route::get("",[Animals::class, "show"]);
                Route::delete("",[Animals::class, "destroy"]);
                Route::put("",[Animals::class, "update"]);
            });
        });
    });

});



/*

Add a GET /api/owners/{owner}/animals/{animal} route that shows a specific animal


*/