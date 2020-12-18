<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//api
Route::get("admin/ac", "Admin\Article@_all_article");
Route::get("admin/ac/{id}", "Admin\Article@_article");

//search keyword
Route::get("admin/ac/s/{keyword}", "Admin\Article@_article_keyword");

Route::get("admin/ac/cat/{id}", "Admin\Article@_article_cat");

//get related article
Route::get("admin/ac/cat/rel/{cat}/{id}", "Admin\Article@_article_cat_relate");

//get banner front
Route::get("admin/banner/front", "Admin\Article@_front_banner");

Route::post("admin/ac/{id}", "Admin\Article@_update_article");
Route::delete("admin/ac/{id}", "Admin\Article@_delete_article");

Route::get("admin/cat", "Admin\Article@_all_category");
