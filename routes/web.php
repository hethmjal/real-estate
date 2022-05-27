<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\RealEstateController as DashboardRealEstateController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\RealEstateController;
use App\Http\Controllers\Front\SearchController;

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



Route::get('/dashboard', function () {
    return view('admin.dashboard.index');
})->middleware(['auth','checkUserType'])->name('dashboard');


Route::prefix('/dashboard')->middleware(['auth','checkUserType'])->group(function ()
    {
        Route::get('category/',[CategoryController::class,'manage_category'])->name('category.manage');
        Route::get('category/add_category',[CategoryController::class,'add'])->name('category.add');
        Route::post('category/stor_category}',[CategoryController::class,'store'])->name('category.store');
        Route::get('category/edit_category/{id}',[CategoryController::class,'edit'])->name('category.edit');
        Route::post('category/update_category/{id}',[CategoryController::class,'update'])->name('category.update');
        Route::get('category/destroy_category/{id}',[CategoryController::class,'destroy'])->name('category.destroy');

        Route::get('/realEstates',[DashboardRealEstateController::class,'index'])->name('dashboard.reales');
        Route::get('/realEstate/add',[DashboardRealEstateController::class,'add'])->name('dashboard.reales.add');
        Route::post('/realEstate/store',[DashboardRealEstateController::class,'store'])->name('dashboard.reales.store');
        Route::get('/realEstate/edit/{slug}',[DashboardRealEstateController::class,'edit'])->name('dashboard.reales.edit');
        Route::post('/realEstate/update/{slug}',[DashboardRealEstateController::class,'update'])->name('dashboard.reales.update');
        Route::get('/realEstate/destroy/{slug}',[DashboardRealEstateController::class,'destroy'])->name('dashboard.reales.destroy');

        Route::get('/users',[UserController::class,'index'])->name('dashboard.users');
        Route::get('/user  /destroy/{id}',[UserController::class,'destroy'])->name('dashboard.users.destroy');

    }
);

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('عرض-العقار/{slug}',[RealEstateController::class,'show'])->name('real.show');
Route::get('/الأقسام/{slug}',[HomeController::class,'showReales'])->name('showAllReales');


Route::get('البحث/',[SearchController::class,'index'])->name('search');


Route::prefix('/العقارات')->middleware(['auth'])->group(function ()
    {
        Route::get('العقارات-الخاصة-بك',[RealEstateController::class,'index'])->name('reales');
        Route::get('اضافة-عقار',[RealEstateController::class,'add'])->name('real.add');
        Route::post('تخزين-عقار}',[RealEstateController::class,'store'])->name('real.store');
        Route::get('تعديل-عقار/{slug}',[RealEstateController::class,'edit'])->name('real.edit');
        Route::post('تعديل/{slug}',[RealEstateController::class,'update'])->name('real.update');
        Route::get('حذف-عقار/{slug}',[RealEstateController::class,'destroy'])->name('real.destroy');
        Route::get('delete-image',[RealEstateController::class,'destroyImage'])->name('real.destroyImage');

    }
);
require __DIR__.'/auth.php';
