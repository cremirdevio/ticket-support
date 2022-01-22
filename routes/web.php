<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;

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

Route::get('/about-us', function () {
    return view('about-us');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/create-ticket', [TicketController::class, 'create'])->name(
        'ticket.create'
    );
    Route::get('/tickets', [TicketController::class, 'index'])->name(
        'ticket.index'
    );
    Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name(
        'ticket.show'
    );
    Route::post('/create-ticket', [TicketController::class, 'store'])->name(
        'ticket.store'
    );

    // Route::get('admin/dashboard', function () {
    //     return view('admin.dashboard');
    // });
    // Route::get('/create-reply', [ReplyController::class, 'create'])->name(
    //     'reply.create'
    // );

    Route::post('/reply', [ReplyController::class, 'store'])->name(
        'reply.store'
    );

    Route::get('/reply/{reply}', [ReplyController::class, 'show'])->name(
        'reply.show'
    );
    Route::get('redirectTo', 'App\Http\Controllers\HomeController@index');

    Route::middleware(['auth', 'isAdmin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name(
            'dashboard'
        );
        Route::get('admin/tickets/{id}', [
            AdminController::class,
            'show',
        ])->name('admin.show');
        Route::get('admin/closed_ticket/{id}', [
            AdminController::class,
            'closed_ticket',
        ])->name('admin.closed_ticket');

        Route::get('admin/category', [
            AdminController::class,
            'showAllCategories',
        ])->name('admin.showAllCategories');
        Route::get('admin/category/{id}', [
            AdminController::class,
            'showCategory',
        ])->name('admin.showCategory');
        // Route::get('admin/category/edit/{id}', function () {
        //     return view('admin.categories.edit-category');
        // });
        Route::get('/admin/create-category', [
            CategoryController::class,
            'create',
        ])->name('category.create');

        Route::post('/', [CategoryController::class, 'store'])->name(
            'category.store'
        );
        Route::get('admin/category/edit/{id}', [
            CategoryController::class,
            'edit',
        ])->name('admin.edit');
        Route::get('admin/category/delete/{id}', [
            CategoryController::class,
            'destroy',
        ])->name('admin.destroy');
        Route::post('category/edit/{id}', [
            CategoryController::class,
            'update',
        ])->name('category.update');
    });
});
