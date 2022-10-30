<?php

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::prefix('/admin')
    // ->middleware(['auth'])
    ->group(function() {
    Route::get('/',function() {
        return view('backend.dashboard');
    });

    Route::get('/position',App\Http\Livewire\Admin\Position\PositionListPage::class)->name('position.list.page');
    Route::get('/department',App\Http\Livewire\Admin\Department\DepartmentListPage::class)->name('department.list.page');
    Route::get('/province',App\Http\Livewire\Admin\Province\ProvinceListPage::class)->name('province.list.page');
});
