<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\WishlistController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [FrontendController::class, 'index']);
Route::get('/collections', [FrontendController::class, 'categories']);
Route::get('/collections/{category_slug}', [FrontendController::class, 'products']);
Route::get('/collections/{category_slug}/{product_slug}', [FrontendController::class, 'productView']);
Route::middleware(['auth'])->group(function () {
    Route::get('wishlist', [WishlistController::class, 'index']);

});

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){


    // Dashboard controller
    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard','index')->name('dashboard');
    });

    //Category controller
    Route::controller(CategoryController::class)->group(function () {
        Route::get('category', 'index')->name('category.view');
        Route::get('category/create','create')->name('category.add');
        Route::post('category/store','store');
        Route::get('category/{category}/edit','edit');
        Route::put('category/{category}','update');

    });


    Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class)->name('brand.view');


    Route::controller(ProductController::class)->group(function () {
        Route::get('/products','index');
        Route::get('/products/create','create');
        Route::post('/product/store','store');
        Route::get('/products/{product_id}/edit','edit');
        Route::put('/products/{product_id}','update');
        Route::get('/products/{product_id}/destory','destroyProduct');
        Route::get('/product-image/{product_image_id}/destroy','destroyImage');

        Route::post('/product-color/{prod_color_id}','updateProdColorQty');
        Route::get('/product-color/{prod_color_id}/delete','deleteProdColorQty');
    });

    Route::controller(ColorController::class)->group(function(){
        Route::get('/colors','index')->name('color.view');
        Route::get('/colors/create','create');
        Route::post('/colors/store','store');
        Route::get('/colors/{color}/edit','edit');
        Route::put('/colors/{color_id}/update','update');
        Route::get('/colors/{color_id}/delete','delete');
    });

    Route::controller(SliderController::class)->group(function(){
        Route::get('/sliders','index');
        Route::get('/sliders/create','create');
        Route::post('/sliders/store','store');
        Route::get('/sliders/{slider}/edit','edit');
        Route::put('/sliders/{slider}','update');
        Route::get('/sliders/{slider}/delete','destroy');

    });
});
