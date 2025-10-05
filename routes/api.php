<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\DeliveryMethodController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\ProductPhotoController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\StatusOrderController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\UserSettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPhotoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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




// Route::get('categories/{category}',[CategoryController::class,'show']);


Route::post('roles/assign',[RoleController::class,"assign"]);
Route::post('permissions/assign',[PermissionController::class,"assign"]);
Route::get('products/{product}/related',[ProductController::class,"related"]);

Route::apiResource('users',UserController::class);
Route::apiResource('roles',RoleController::class);
Route::apiResource('orders',OrderController::class);
Route::apiResource('reviews',ReviewController::class);
Route::apiResource('statuses',StatusController::class);
Route::apiResource('settings',SettingController::class);
Route::apiResource('products',ProductController::class);
Route::apiResource('discounts',DiscountController::class);
Route::apiResource('favorites',FavoriteController::class);
Route::apiResource('categories',CategoryController::class);
Route::apiResource('permissions',PermissionController::class);
Route::apiResource('users.photos',UserPhotoController::class);
Route::apiResource('payment-types',PaymentTypeController::class);
Route::apiResource('user-settings',UserSettingController::class);
Route::apiResource('user-addresses',UserAddressController::class);
Route::apiResource('statuses.orders',StatusOrderController::class);
Route::apiResource('products.photos',ProductPhotoController::class);
Route::apiResource('products.reviews',ProductReviewController::class);
Route::apiResource('delivery-methods',DeliveryMethodController::class);
Route::apiResource('categories.products',CategoryProductController::class);


