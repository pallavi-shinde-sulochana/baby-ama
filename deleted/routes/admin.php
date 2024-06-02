<?php
use App\Http\Controllers\Account\SettingsController;
use App\Http\Controllers\Documentation\ReferencesController;
use App\Http\Controllers\Logs\SystemLogsController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PressReleaseController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\MediaResourceController;
use App\Http\Controllers\CSRController;
use App\Http\Controllers\AdminController;



Route::prefix('admin')->middleware('auth')->group(function () {

	/*This routes are belongs to the news*/
	Route::get('/news', [NewsController::class, 'index'])->name('admin.news.list');
	Route::post('/news/add', [NewsController::class, 'store'])->name('admin.news.store');
	Route::get('/create/news', [NewsController::class, 'create'])->name('admin.news.create');
	Route::get('/update/{id}/news', [NewsController::class, 'edit'])->name('admin.news.update');
	Route::get('/delete/{id}/news', [NewsController::class, 'destroy'])->name('admin.news.delete');
	// Route::get('/search/news', [NewsController::class, 'search'])->name('admin.news.search');



	/*This routes belongs to the press releases*/
	Route::get('/press-release', [PressReleaseController::class, 'index'])->name('admin.press-release.list');
	Route::get('/press-release/create', [PressReleaseController::class, 'create'])->name('admin.press-release.create');
	Route::post('/press-release/store', [PressReleaseController::class, 'store'])->name('admin.press-store.store');

	Route::get('/press-release/{id}/update', [PressReleaseController::class, 'edit'])->name('admin.press-release.update');
	Route::get('press-release/{id}/delete', [PressReleaseController::class, 'destroy'])->name('admin.press-release.delete');
	


	/*This routes belongs to the careers*/
	Route::get('/careers', [CareerController::class, 'index'])->name('admin.careers.list');
	Route::get('/careers/create', [CareerController::class, 'create'])->name('admin.careers.create');
	Route::post('/careers/store', [CareerController::class, 'store'])->name('admin.careers.store');
	Route::get('/careers/{id}/update', [CareerController::class, 'edit'])->name('admin.careers.update');
	Route::get('/careers/{id}/delete', [CareerController::class, 'destroy'])->name('admin.careers.delete');



	/*This routes belongs to the Media Resource */
	Route::get('/media-resource', [MediaResourceController::class, 'index'])->name('admin.media-resource.list');
	Route::get('/create/media-resource', [MediaResourceController::class, 'create'])->name('admin.media-resource.create');
	Route::post('/media-resource/add', [MediaResourceController::class, 'store'])->name('admin.media-resource.store');
	
	Route::get('/media-resource/{id}/update', [MediaResourceController::class, 'edit'])->name('admin.media-resource.update');
	Route::get('media-resource/{id}/delete', [MediaResourceController::class, 'destroy'])->name('admin.media-resource.delete');

	/*This routes belongs to the CSR*/
	Route::get('/csr', [CSRController::class, 'index'])->name('admin.csr.list');
	Route::get('/csr/create', [CSRController::class, 'create'])->name('admin.csr.create');
	Route::post('/csr/add', [CSRController::class, 'store'])->name('admin.csr.store');
	
	Route::get('/csr/{id}/update', [CSRController::class, 'edit'])->name('admin.csr.update');
	Route::get('csr/{id}/delete', [CSRController::class, 'destroy'])->name('admin.csr.delete');


	/*This routes belongs to the Pages*/
	Route::get('/pages', [AdminController::class, 'getAllFrontEndPages'])->name('admin.pages.list');
	// Route::get('/csr/create', [CSRController::class, 'create'])->name('admin.csr.create');
	
	Route::post('/pages/add', [AdminController::class, 'postFrontPages'])->name('admin.pages.store');
	Route::get('/pages/{id}/update', [AdminController::class, 'getFrontPages'])->name('admin.pages.update');
	// Route::get('csr/{id}/delete', [CSRController::class, 'destroy'])->name('admin.csr.delete');
});
