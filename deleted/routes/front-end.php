<?php
use App\Http\Controllers\Account\SettingsController;
use App\Http\Controllers\Documentation\ReferencesController;
use App\Http\Controllers\Logs\SystemLogsController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;

/*For Home Page*/
 Route::get('/', [FrontEndController::class, 'pageHome'])->name('front.home.index');
 Route::get('/cart', [FrontEndController::class, 'pageCart'])->name('front.page.cart');
 Route::get('/checkout', [FrontEndController::class, 'pageCheckout'])->name('front.page.checkout');
 Route::get('/thankyou', [FrontEndController::class, 'pageThankYou'])->name('front.page.thankyou');
 Route::get('/myaccount', [FrontEndController::class, 'pageMyAccount'])->name('front.page.myaccount');
 Route::get('/myorder', [FrontEndController::class, 'pageMyOrder'])->name('front.page.order');


 // Route::get('/home', [FrontEndController::class, 'pageHome'])->name('front.home.index');
 Route::get('/edit-home', [FrontEndController::class, 'pageHomeEdit'])->name('front.home.edit');


 Route::post('/home/save', [FrontEndController::class, 'pageHomeStore'])->name('front.home.store');


Route::get('/news', [FrontEndController::class, 'getNews'])->name('front.news');
Route::get('/press_release', [FrontEndController::class, 'getPressRelease'])->name('front.press_release');
Route::get('/media_resources', [FrontEndController::class, 'getMediaResources'])->name('front.media_resources');
Route::get('/job_openings', [FrontEndController::class, 'getJobOpenings'])->name('front.getJobOpenings');

Route::get('/search', [FrontEndController::class, 'getSearch'])->name('front.page.get.search');

 /*Static pages */

 Route::get('{url}', [FrontEndController::class, 'getPage'])->name('front.page.get');
 Route::get('{url}/edit', [FrontEndController::class, 'getPageEdit'])->name('front.page.edit');
 Route::post('/cms/save', [FrontEndController::class, 'pageStore'])->name('front.cms.store');


  Route::get('csr/{url}', [FrontEndController::class, 'getCSR'])->name('front.page.get.csr');


