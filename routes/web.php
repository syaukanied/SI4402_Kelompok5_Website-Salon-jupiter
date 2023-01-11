<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BarberController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceSubCategoryController;
use App\Http\Controllers\UserController;
use App\Models\ServiceCategory;
use App\Models\ServiceSubCategory;


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

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::post('/dashboard', [PageController::class, 'storeDashboard'])->name('storeDashboard');
Route::post('/approval', [OrderController::class, 'storeApproval'])->name('storeApproval');

Route::get('/service', [PageController::class, 'indexBookService'])->middleware('auth:web')->name('service-view');
Route::post('/service', [PageController::class, 'storeBookService'])->middleware('auth:web')->name('service-logic');
Route::prefix('service')->middleware('auth:web')->group(function () {
    Route::name('service.')->group(function () {
        Route::get('/category', [PageController::class, 'indexBookServiceCategory'])->name('category-view');
        Route::post('/category', [PageController::class, 'storeBookServiceCategory'])->name('category-logic');

        Route::get('/subcategory', [PageController::class, 'indexBookServiceSubCategory'])->name('subcategory-view');
        Route::post('/subcategory', [PageController::class, 'storeBookServiceSubCategory'])->name('subcategory-logic');

        Route::get('/order', [PageController::class, 'indexServiceBookDetail'])->name('order-view');
        Route::post('/order', [PageController::class, 'storeServiceBookDetail'])->name('order-logic');

        Route::get('/artist', [PageController::class, 'indexServiceOrderBarbers'])->name('artist-view');
        Route::post('/artist', [PageController::class, 'storeServiceOrderBarbers'])->name('artist-logic');
    });
});

Route::view('/artist', 'pages.customer.hair_artist');

Route::post('/login', [AuthenticationController::class, 'login'])->name('logic-login');
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logic-logout');
Route::post('/register', [UserController::class, 'store'])->name('logic-register-user');

Route::prefix('/user')->group(function () {
    Route::name('user.')->group(function () {
        Route::post('/profile', [UserController::class, 'update'])->name('logic-update-profile-user');
        Route::post('/profile/image', [UserController::class, 'updateImageProfile'])->name('logic-update-profile-image-user');
        Route::get('/book', [OrderController::class, 'showProfileBooking'])->name('order-user-view');
        Route::post('/book/{order}', [OrderController::class, 'delete'])->name('order-user-cancel');
    });
});

Route::name('admin')->middleware('auth:web_barber')->prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('adminorder');
    });
    Route::get('/orders', [OrderController::class, 'showBarberOrdersView'])->name('order');
    Route::get('/order/{order}/detail', [OrderController::class, 'showBarberDetailOrderView'])->name('order-detail');
    Route::post('/order/{order}/finish', [OrderController::class, 'setOrderFinish'])->name('logic-order-detail-finish');

    // update profile
    Route::post('/profile', [BarberController::class, 'updateBarberProfile'])->name('logic-update-profile');
    Route::post('/profile/image', [BarberController::class, 'updateBarberProfileImage'])->name('logic-update-profile-image');

    // crud services
    Route::get('/services', [ServiceController::class, 'showAdminServicePage'])->name('service');
    Route::get('/service', [ServiceController::class, 'showAdminAddServicePage'])->name('service-add');
    Route::post('/service', [ServiceController::class, 'store'])->name('logic-add-service');

    Route::get('/service/{service}', [ServiceController::class, 'showAdminDetailServicePage'])->name('service-detail');
    Route::post('/service/{service}', [ServiceController::class, 'update'])->name('logic-update-service');
    Route::post('/service/{service}/delete', [ServiceController::class, 'delete'])->name('logic-delete-service');

    // crud service categories
    Route::get('/service/{service}/categories', [ServiceCategoryController::class, 'showAdminServiceCategoryPage'])->name('service-category');
    Route::get('/service/{service}/category', [ServiceCategoryController::class, 'showAdminAddServiceCategoryPage'])->name('service-category-add');
    Route::post('/service/{service}/category', [ServiceCategoryController::class, 'store'])->name('logic-add-service-category');

    Route::get('/service/{service}/category/{service_category}', [ServiceCategoryController::class, 'showAdminDetailServiceCategoryPage'])->name('service-category-detail');
    Route::post('/service/{service}/category/{service_category}', [ServiceCategoryController::class, 'update'])->name('logic-update-service-category');
    Route::post('/service/{service}/category/{service_category}/delete', [ServiceCategoryController::class, 'delete'])->name('logic-delete-service-category');

    // crud service sub categories
    Route::get('/service/{service}/category/{service_category}/subcategories', [ServiceSubCategoryController::class, 'showAdminServiceSubCategoryPage'])->name('service-sub-category');
    Route::get('/service/{service}/category/{service_category}/subcategory', [ServiceSubCategoryController::class, 'showAdminAddServiceSubCategoryPage'])->name('service-sub-category-add');
    Route::post('/service/{service}/category/{service_category}/subcategory', [ServiceSubCategoryController::class, 'store'])->name('logic-add-service-sub-category');

    Route::get('/service/{service}/category/{service_category}/subcategory/{service_sub_category}', [ServiceSubCategoryController::class, 'showAdminDetailServiceSubCategoryPage'])->name('service-sub-category-detail');
    Route::post('/service/{service}/category/{service_category}/subcategory/{service_sub_category}', [ServiceSubCategoryController::class, 'update'])->name('logic-update-service-sub-category');
    Route::post('/service/{service}/category/{service_category}/subcategory/{service_sub_category}/delete', [ServiceSubCategoryController::class, 'delete'])->name('logic-delete-service-sub-category');

    // crud barbers
    Route::get('/barbers', [BarberController::class, 'showIndexBarberPage'])->name('barber');
    Route::post('/barber', [BarberController::class, 'store'])->name('logic-add-barber');

    Route::get('/barber', [BarberController::class, 'showAddBarberPage'])->name('barber-add');

    Route::get('/barber/{barber}', [BarberController::class, 'showDetailBarberPage'])->name('barber-detail');
    Route::post('/barber/{barber}', [BarberController::class, 'update'])->name('logic-update-barber');
    Route::post('/barber/{barber}/delete', [BarberController::class, 'delete'])->name('logic-delete-barber');

});