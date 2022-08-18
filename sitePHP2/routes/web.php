<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\MessageController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\MainProuductController;
use App\Http\Controllers\admin\UsersActivityController;
use App\Http\Controllers\admin\CartAdminController;
use App\Mail\MailtrapExample;
use App\Mail\MyMail;

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

Route::get('/', [HomeController::class, "index"])->name("home");

Route::get('/products/get', [ProductsController::class, "get"])->name("productsGet");

Route::get('/products/{keyword?}', [ProductsController::class, "index"])->name("products");

Route::get('/show/{id}', [ProductsController::class, "show"])->name("showProduct");

Route::get('/search/{keyword}', [ProductsController::class, "search"])->name("search");

Route::get('/loginForm', [LoginController::class, "index"])->name("loginForm");

Route::post('/login', [LoginController::class, "login"])->name("login");

Route::get('/logout', [LoginController::class, "logout"])->name("logout");

Route::get('/registerForm', [RegisterController::class, "index"])->name("registerForm");

Route::post('/register', [RegisterController::class, "register"])->name("register");

Route::middleware(['loggedIn'])->group(function (){

    Route::get('/contactForm', [ContactController::class, "index"])->name("contactForm");

    Route::post('/contact', [ContactController::class, "store"])->name("contact");

    Route::get('/adminPanel', [AdminController::class, "index"])->name("adminPanel");

    Route::post('/admin/put', [AdminController::class, "put"])->name("adminPut");

    Route::get('/adminPanel/menu', [MenuController::class, "index"])->name("menuPanel");

    Route::post('/adminPanel/menu/put', [MenuController::class, "put"])->name("menuPut");

    Route::post('/adminPanel/menu/delete', [MenuController::class, "delete"])->name("menuDelete");

    Route::get('/adminPanel/category', [CategoryController::class, "index"])->name("categoryPanel");

    Route::post('/adminPanel/category/put', [CategoryController::class, "put"])->name("categoryPut");

    Route::post('/adminPanel/category/delete', [CategoryController::class, "delete"])->name("categoryDelete");

    Route::post('/adminPanel/category/store', [CategoryController::class, "store"])->name("categoryStore");

    Route::get('/adminPanel/user', [UserController::class, "index"])->name("userPanel");

    Route::post('/adminPanel/user/put', [UserController::class, "put"])->name("userPut");

    Route::post('/adminPanel/user/delete', [UserController::class, "delete"])->name("userDelete");

    Route::get('/adminPanel/role', [RoleController::class, "index"])->name("rolePanel");

    Route::post('/adminPanel/role/put', [RoleController::class, "put"])->name("rolePut");

    Route::post('/adminPanel/role/delete', [RoleController::class, "delete"])->name("roleDelete");

    Route::post('/adminPanel/role/store', [RoleController::class, "store"])->name("roleStore");

    Route::get('/adminPanel/message', [MessageController::class, "index"])->name("messagePanel");

    Route::post('/adminPanel/message/delete', [MessageController::class, "delete"])->name("messageDelete");

    Route::get('/adminPanel/product', [ProductController::class, "index"])->name("productPanel");

    Route::post('/adminPanel/product/put', [ProductController::class, "put"])->name("productPut");

    Route::post('/adminPanel/product/delete', [ProductController::class, "delete"])->name("productDelete");

    Route::post('/adminPanel/product/store', [ProductController::class, "store"])->name("productStore");

    Route::get('/adminPanel/mainProduct', [MainProuductController::class, "index"])->name("mainProductPanel");

    Route::post('/adminPanel/mainProduct/put', [MainProuductController::class, "put"])->name("mainProductPut");

    Route::get('/adminPanel/activity', [UsersActivityController::class, "index"])->name("activityPanel");

    Route::post('/adminPanel/activity/registrationFilter', [UsersActivityController::class, "registrationFilter"])->name("registrationFilter");

    Route::post('/adminPanel/activity/loginFilter', [UsersActivityController::class, "loginFilter"])->name("loginFilter");

    Route::post('/adminPanel/activity/loggedOutFilter', [UsersActivityController::class, "loggedOutFilter"])->name("loggedOutFilter");

    Route::get('/adminPanel/cart', [CartAdminController::class, "index"])->name("cartPanel");

    Route::post('/adminPanel/cart/cartFilter', [CartAdminController::class, "cartFilter"])->name("cartFilter");

    Route::get('/cart', [CartController::class, "index"])->name("cart");

    Route::post('/cart/store', [CartController::class, "store"])->name("cartInsert");
});
