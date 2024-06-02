<?php

use App\Http\Controllers\Account\SettingsController;
use App\Http\Controllers\Documentation\ReferencesController;
use App\Http\Controllers\Logs\SystemLogsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminController;
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
//     return redirect('index');
// });

Route::get('/', function () {
    // return redirect('admin/index');
    return view('pages.front-end.home');
})->name('application.index');
// Route::get('/index', [AdminController::class, 'dashboard']);

$menu = theme()->getMenu();
array_walk($menu, function ($val) {
    if (isset($val['path'])) {
        // $route = Route::get($val['path'], [PagesController::class, 'index']);

        // Exclude documentation from auth middleware
        // if (!Str::contains($val['path'], 'documentation')) {
        //     $route->middleware('auth');
        // }
    }
});

// Documentations pages
Route::prefix('documentation')->group(function () {
    Route::get('getting-started/references', [ReferencesController::class, 'index']);
    Route::get('getting-started/changelog', [PagesController::class, 'index']);
});

// Account pages
Route::prefix('account')->middleware('auth')->group(function () {
    Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');
});

// Logs pages
Route::prefix('log')->name('log.')->group(function () {
    Route::resource('system', SystemLogsController::class);
});

Route::get('web-booking',function(){
    return view('pages.front-end.patient.web-booking');
})->name('patient.webbooking');

Route::get('doctor-test',function(){
    return view('pages.doctor.test');
});

Route::get('doctor-test',function(){
    return view('pages.doctor.test');
});


Route::get('test', [PagesController::class, 'test']);
Route::view('/powergrid', 'powergrid-demo');


require __DIR__.'/admin.php';
require __DIR__.'/front-end.php';
require __DIR__.'/doctor.php';
require __DIR__.'/pharmacy.php';
require __DIR__.'/auth.php';
