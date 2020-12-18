<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get("/", "Front\Home@home");
Route::get("home", "Front\Home@home");
Route::get("post/{params?}", "Front\Home@post")->where('params', '(.*)');;
Route::get("category/{id_category}", "Front\Home@category");
Route::get("category", "Front\Home@categories");
Route::post("submitComment", "Front\Home@submitComment");
Route::post("subscribe", "Front\Home@subscribe");


Route::get("search", "Front\Search@search");
Route::get("/{custom_page}", "Front\Home@page");



###### Admin Panel ######
//Login
Route::get("admin/login", "Admin\Home@login");
Route::post("admin/login_action", "Admin\Home@login_action");
Route::get("admin/home", "Admin\Home@home");
Route::get("admin/logout", "Admin\Home@logout");

//category
Route::get("admin/list_category", "Admin\Category@list_category");
Route::get("admin/add_category", "Admin\Category@add_category");
Route::post("admin/add_category_action", "Admin\Category@add_category_action");
Route::get("admin/edit_category/{id_category}", "Admin\Category@edit_category");
Route::post("admin/edit_category_action", "Admin\Category@edit_category_action");
Route::get("admin/delete_category/{id_category}", "Admin\Category@delete_category");
Route::post("admin/delete_category_action", "Admin\Category@delete_category_action");

//subcategory
Route::get("admin/list_sub_category", "Admin\Category@list_sub_category");
Route::get("admin/add_sub_category", "Admin\Category@add_sub_category");
Route::post("admin/add_sub_category_action", "Admin\Category@add_sub_category_action");
Route::get("admin/edit_sub_category/{id_sub_category}", "Admin\Category@edit_sub_category");
Route::post("admin/edit_sub_category_action", "Admin\Category@edit_sub_category_action");
Route::get("admin/delete_sub_category/{id_sub_category}", "Admin\Category@delete_sub_category");
Route::post("admin/delete_sub_category_action", "Admin\Category@delete_sub_category_action");

//article
Route::get("admin/list_article", "Admin\Article@list_article");
Route::get("admin/list_writer_article", "Admin\Article@list_writer_article");
Route::get("admin/view_article_writer/{id_writer}", "Admin\Article@view_article_writer");
Route::get("admin/add_article", "Admin\Article@add_article");
Route::post("admin/add_article_action", "Admin\Article@add_article_action");
Route::get("admin/edit_article/{id_article}", "Admin\Article@edit_article");
Route::post("admin/edit_article_action", "Admin\Article@edit_article_action");
Route::get("admin/delete_article/{id_article}", "Admin\Article@delete_article");
Route::post("admin/delete_article_action", "Admin\Article@delete_article_action");
Route::post("admin/reload_status_headline", "Admin\Article@reload_status_headline");

//comment
Route::get("admin/list_comment", "Admin\Comment@list_comment");
Route::get("admin/view_comment/{id_comment}", "Admin\Comment@view_comment");
Route::get("admin/delete_comment/{id_comment}", "Admin\Comment@delete_comment");
Route::post("admin/delete_comment_action", "Admin\Comment@delete_comment_action");
Route::post("admin/reload_status_comment", "Admin\Comment@reload_status_comment");

//custom pages
Route::get("admin/list_page", "Admin\Pages@list_page");
Route::get("admin/edit_page/{id_page}", "Admin\Pages@edit_page");
Route::post("admin/edit_page_action", "Admin\Pages@edit_page_action");

//subscriber
Route::get("admin/list_subscriber", "Admin\Subscriber@list_subscriber");
Route::post("admin/reload_status_subscriber", "Admin\Subscriber@reload_status_subscriber");

//admin
Route::get("admin/list_admin", "Admin\Admin@list_admin");
Route::get("admin/edit_admin/{id_admin}", "Admin\Admin@edit_admin");
Route::post("admin/edit_admin_action", "Admin\Admin@edit_admin_action");
Route::get("admin/add_admin", "Admin\Admin@add_admin");
Route::post("admin/add_admin_action", "Admin\Admin@add_admin_action");

//user
Route::get("admin/list_user", "Admin\User@list_user");
Route::get("admin/edit_user/{id_user}", "Admin\User@edit_user");
Route::post("admin/edit_user_action", "Admin\User@edit_user_action");
Route::get("admin/add_user", "Admin\User@add_user");
Route::post("admin/add_user_action", "Admin\User@add_user_action");

//editing
Route::get("admin/list_editing", "Admin\Editing@list_editing");
Route::get("admin/edit_editing/{id_article}", "Admin\Editing@edit_editing");
Route::post("admin/edit_editing_action", "Admin\Editing@edit_editing_action");
Route::get("admin/add_payment", "Admin\Editing@add_payment");
Route::post("admin/add_payment_action", "Admin\Editing@add_payment_action");

//payment
Route::get("admin/list_writer", "Admin\Payment@list_writer");
Route::get("admin/writer_article/{id_admin}", "Admin\Payment@writer_article");
Route::get("admin/list_payment", "Admin\Payment@list_payment");
Route::get("admin/edit_payment/{id_payment}", "Admin\Payment@edit_payment");
Route::post("admin/edit_payment_action", "Admin\Payment@edit_payment_action");
Route::get("admin/add_payment", "Admin\Payment@add_payment");
Route::post("admin/add_payment_action", "Admin\Payment@add_payment_action");

//role name
Route::get("admin/list_role", "Admin\Role@list_role");
Route::post("admin/add_new_role", "Admin\Role@add_new_role");
Route::post("admin/delete_role", "Admin\Role@delete_role");
Route::post("admin/edit_role_name_action", "Admin\Role@edit_role_name_action");
Route::post("admin/get_role_name", "Admin\Role@get_role_name");

//role menu
Route::post("admin/get_role_menu", "Admin\Role@get_role_menu");
Route::post("admin/update_status_role", "Admin\Role@update_status_role");

//menu
Route::get("admin/list_menu", "Admin\Role@list_menu");
Route::post("admin/get_data_menu", "Admin\Role@get_data_menu");
Route::post("admin/add_new_menu", "Admin\Role@add_new_menu");
Route::post("admin/delete_menu", "Admin\Role@delete_menu");
Route::post("admin/edit_menu", "Admin\Role@edit_menu");

//settings
Route::get("admin/edit_general_settings", "Admin\Settings@edit_general_settings");
Route::post("admin/edit_general_settings_action", "Admin\Settings@edit_general_settings_action");

Route::get("admin/edit_banner_main", "Admin\Settings@edit_banner_main");
Route::post("admin/edit_banner_main_action", "Admin\Settings@edit_banner_main_action");

Route::get("admin/upload_settings", "Admin\Settings@upload_settings");
Route::post("admin/upload_settings_action", "Admin\Settings@upload_settings_action");

Route::get("show_all_article", "Article@show_all_article");
Route::get("get_article_by_id", "Article@get_article_by_id");
Route::get("add_article", "Article@add_article");
Route::get("edit_article", "Article@edit_article");
Route::get("delete_article", "Article@delete_article");

//editing
Route::get("admin/editing", "Admin\Editing@editing");
