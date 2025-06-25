<?php


use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/links/create', [LinkController::class, 'create'])->name('links.create');
    Route::post('/links', [LinkController::class, 'store'])->name('links.store');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware('can:delete,link')->delete('/links/{link}', [LinkController::class, 'destroy'])->name('links.destroy');

    Route::middleware('can:update,link')->get('/links/{link}/edit', [LinkController::class, 'edit'])->name('links.edit');
    Route::middleware('can:update,link')->put('/links/{link}', [LinkController::class, 'update'])->name('links.update');

});

require __DIR__.'/auth.php';
