<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Auth\LoginController;

Auth::routes(['register' => false]);

// Ana sayfadan direk login sayfasına yönlendirilme
Route::get('/', function () {
    return redirect('/login'); 
});


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::group(['middleware' => ['auth']], function() {

    
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/admin/games', GameController::class);
    Route::resource('/admin/categories', CategoryController::class);
    Route::get('/admin/searches', [SearchController::class, 'index'])->name('searches.index');
    Route::delete('/admin/searches/{search}', [SearchController::class, 'destroy'])->name('searches.destroy');
    Route::get('/admin/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/admin/settings', [SettingController::class, 'store'])->name('settings.store');

});
