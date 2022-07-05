<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
/* !! Admin panel */
Route::get('admin', [AdminController::class, 'index']);
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');

Route::group(['middleware' => 'admin_auth'], function(){
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    /* !! Category */
    Route::get('admin/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::get('admin/category/manage_category', [CategoryController::class, 'manage_category'])->name('admin.manage_category');
    
    Route::get('admin/category/manage_category/{id}', [CategoryController::class, 'manage_category'])->name('admin.category.edit');
    Route::post('admin/category/manage_category_process', [CategoryController::class, 'manage_category_process'])->name('category.insert');
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
    Route::get('admin/category/status/{status}/{id}', [CategoryController::class, 'destroy'])->name('category.status');

    /* !! Coupon */
    Route::get('admin/coupon', [CouponController::class, 'index'])->name('admin.coupon');
    Route::get('admin/coupon/manage_coupon', [CouponController::class, 'manage_coupon'])->name('admin.manage_coupon');
    Route::post('admin/category/manage_coupon_process', [CouponController::class, 'manage_coupon_process'])->name('coupon.insert');
    
    Route::get('admin/category/manage_coupon/{id}', [CouponController::class, 'manage_coupon'])->name('admin.coupon.edit');
    Route::get('admin/coupon/delete/{id}', [CouponController::class, 'destroy'])->name('coupon.delete');

    /* !! Sizes */
    Route::get('admin/size', [SizeController::class, 'index'])->name('admin.size');
    Route::get('admin/size/manage_size', [SizeController::class, 'create'])->name('admin.manage_size');
    Route::post('admin/size/manage_size_process', [SizeController::class, 'store'])->name('size.insert');
    
    Route::get('admin/size/manage_size/{id}', [SizeController::class, 'create'])->name('admin.size.edit');
    Route::get('admin/size/delete/{id}', [SizeController::class, 'destroy'])->name('size.delete');

    /* !! Colors. */
    Route::get('admin/colors', [ColorController::class, 'index'])->name('admin.color');
    Route::get('admin/manage_color', [ColorController::class, 'create'])->name('admin.manage_color');
    Route::post('admin/colors/manage_color_process', [ColorController::class, 'store'])->name('color.insert');
    Route::get('admin/colors/manage_color/{id}', [ColorController::class, 'create'])->name('admin.color.edit');
    Route::get('admin/colors/delete/{id}', [ColorController::class, 'destroy'])->name('color.delete');
    Route::get('admin/colors/status/{status}/{id}', [ColorController::class, 'status'])->name('color.status');

    /* !! Products. */
    Route::get('admin/products', [ProductController::class, 'index'])->name('admin.products');
    Route::get('admin/manage_product', [ProductController::class, 'create'])->name('admin.manage_product');
    Route::post('admin/products/manage_product_process', [ProductController::class, 'store'])->name('product.insert');
    Route::get('admin/products/manage_product/{id}', [ProductController::class, 'create'])->name('admin.product.edit');
    Route::get('admin/products/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
    Route::get('admin/products/status/{status}/{id}', [ProductController::class, 'status'])->name('product.status');


    /* !! Logout. */
    Route::get('admin/logout', function(){
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('error', 'Logout Successfully');
        return redirect('admin/');
    })->name('admin.logout');

});