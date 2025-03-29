<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCateoryController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MediaController;

use UniSharp\LaravelFilemanager\Controllers\LfmController;

use App\Http\Controllers\DrawingController;

use App\Http\Controllers\InvoiceController;



Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () 
{
    Route::get('/dashboard',[ProfileController::class,'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::middleware(['role:admin'])->group(function()
    {
        Route::resource('user',UserController::class);
        Route::resource('role',RoleController::class);
        Route::resource('permission',PermissionController::class);
        Route::resource('category',CategoryController::class);
        Route::resource('subcategory',SubCateoryController::class);
        Route::resource('collection',CollectionController::class);
        Route::resource('product',ProductController::class);
        Route::get('/get/subcategory',[ProductController::class,'getsubcategory'])->name('getsubcategory');
        Route::get('/remove-external-img/{id}',[ProductController::class,'removeImage'])->name('remove.image');


        Route::resource('customers', CustomerController::class);
        Route::resource('media', MediaController::class); //->except(['edit', 'update', 'show']);



        Route::resource('drawings', DrawingController::class);

        Route::resource('invoices', InvoiceController::class);

    });
});


Route::prefix('laravel-filemanager')->group(function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::post('/customers', [CustomerController::class, 'store']);
Route::get('/customers/{id}/files', [CustomerController::class, 'showFiles']);





