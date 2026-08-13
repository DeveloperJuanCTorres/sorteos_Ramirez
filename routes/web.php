<?php

use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes([
    'register' => false,
    'login' => false,
]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/tickets', [App\Http\Controllers\HomeController::class, 'tickets'])->name('tickets');
Route::get('/ganadores', [App\Http\Controllers\HomeController::class, 'ganadores'])->name('ganadores');
Route::get('/terminos-y-condiciones', [App\Http\Controllers\HomeController::class, 'terminos'])->name('terminos');

Route::get('/tickets/list', [TicketController::class, 'index'])->name('tickets.list');
Route::get('/tickets/buscar', [TicketController::class, 'buscar'])->name('tickets.buscar');
Route::post('/tickets/registrar', [TicketController::class, 'store'])->name('tickets.store');




Route::get('/fix-config', function () {

    try {
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('optimize:clear');

        return '✔ Limpieza completada correctamente.';
    } catch (\Exception $e) {
        return '❌ Error: ' . $e->getMessage();
    }

});

Route::middleware(['auth'])->group(function () {
    Route::get('/tickets/exportar', [TicketController::class, 'exportView'])->name('tickets.export.view');
    Route::get('/admin/tickets/export/excel', [TicketController::class, 'exportExcel'])->name('tickets.export.excel');
    Route::get('/admin/tickets/export/print', [TicketController::class, 'exportPrint'])->name('tickets.export.print');

    Route::get('/admin/tickets/export/thermal', [TicketController::class,'exportThermal'])->name('tickets.export.thermal');
});



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
