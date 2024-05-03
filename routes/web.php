<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    Route::get('/', 'homeController@index')->name('home');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');
    });

    Route::get('/email/verify', function () {
        return view('auth.verify');
    })->middleware('auth')->name('verification.notice');

    Route::get('/logout', 'LogoutController@perform')->name('logout');

    Route::group(['middleware' => ['auth'], 'middleware' => ['verified']], function() {
        /**
         * Logout Routes
         */
        Route::get('/dashboard', 'homeController@dashboard')->name('dashboard');

        // Setting
        Route::name('setting.')->prefix('setting')->group(function (){
            Route::get('/', [App\Http\Controllers\settingController::class, 'index'])->name('index');
            Route::put('{id}/edit', [App\Http\Controllers\settingController::class, 'update'])->name('update');
            Route::put('{id}/image', [App\Http\Controllers\settingController::class, 'update_image'])->name('update.image');
            Route::put('{id}/ktp', [App\Http\Controllers\settingController::class, 'update_ktp'])->name('update.ktp');
            Route::put('/change-password', [App\Http\Controllers\settingController::class, 'updatePassword'])->name('update-password');
            Route::put('{id}/change-information', [App\Http\Controllers\settingController::class, 'updateInformation'])->name('update-information');
        });

        Route::name('besuk.')->prefix('besuk')->group(function (){
            Route::get('/', 'besukController@index')->name('index');
            Route::get('/tahanan', 'besukController@tahanan')->name('tahanan');
            Route::get('/create', 'besukController@create')->name('create');
            Route::post('/create', 'besukController@store')->name('store');
            Route::get('/{id}', 'besukController@show')->name('show');
            Route::get('{id}/edit', 'besukController@edit')->name('edit');
            Route::put('{id}/edit', 'besukController@update')->name('update');
            Route::delete('/{id}', 'besukController@destroy')->name('destroy');
            Route::get('/{id}/cetak_pdf', 'besukController@cetak_pdf')->name('cetak');
        });
    });
});

Route::get('/pidum', function () {
    return redirect()->route('pidum.login');
});

Route::prefix('pidum')->name('pidum.')->group(function () {
    Route::get('login', [\App\Http\Controllers\pidum\loginController::class, 'index'])->name('login');
    Route::post('login', [\App\Http\Controllers\pidum\loginController::class, 'login'])->name('login.check');

    Route::middleware('auth:pidum')->group(function () {
        Route::get('/', [\App\Http\Controllers\pidum\homeController::class, 'index'])->name('home');
        Route::get('logout', [\App\Http\Controllers\pidum\loginController::class, 'logout'])->name('logout');

        // Laporan
        Route::get('/besuk', [App\Http\Controllers\pidum\besukController::class, 'index'])->name('besuk');
        Route::prefix('besuk')->name('besuk.')->group(function (){
            Route::get('/{id}', [App\Http\Controllers\pidum\besukController::class, 'show'])->name('show');
            Route::put('{id}/edit', [App\Http\Controllers\pidum\besukController::class, 'update'])->name('update');
            Route::get('/{id}/cetak_pdf', [App\Http\Controllers\pidum\besukController::class, 'cetak_pdf'])->name('cetak');
        });

        // Master Data
        Route::get('/tahanan', [App\Http\Controllers\pidum\tahananController::class, 'index'])->name('tahanan');
        Route::prefix('tahanan')->name('tahanan.')->group(function (){
            Route::get('/create', [App\Http\Controllers\pidum\tahananController::class, 'create'])->name('create');
            Route::post('/create', [App\Http\Controllers\pidum\tahananController::class, 'store'])->name('store');
            Route::get('/{id}', [App\Http\Controllers\pidum\tahananController::class, 'show'])->name('show');
            Route::get('{id}/edit', [App\Http\Controllers\pidum\tahananController::class, 'edit'])->name('edit');
            Route::put('{id}/edit', [App\Http\Controllers\pidum\tahananController::class, 'update'])->name('update');
            Route::get('{id}/image', [App\Http\Controllers\pidum\tahananController::class, 'image'])->name('image');
            Route::put('{id}/image', [App\Http\Controllers\pidum\tahananController::class, 'update_image'])->name('update.image');
            Route::delete('/{id}', [App\Http\Controllers\pidum\tahananController::class, 'destroy'])->name('destroy');
        });

        Route::get('/user', [App\Http\Controllers\pidum\userController::class, 'index'])->name('user');
        Route::prefix('user')->name('user.')->group(function (){
            Route::get('/create', [App\Http\Controllers\pidum\userController::class, 'create'])->name('create');
            Route::post('/create', [App\Http\Controllers\pidum\userController::class, 'store'])->name('store');
            Route::get('/{id}', [App\Http\Controllers\pidum\userController::class, 'show'])->name('show');
            Route::get('{id}/edit', [App\Http\Controllers\pidum\userController::class, 'edit'])->name('edit');
            Route::put('{id}/edit', [App\Http\Controllers\pidum\userController::class, 'update'])->name('update');
            Route::get('{id}/image', [App\Http\Controllers\pidum\userController::class, 'image'])->name('image');
            Route::put('{id}/image', [App\Http\Controllers\pidum\userController::class, 'update_image'])->name('update.image');
            Route::delete('/{id}', [App\Http\Controllers\pidum\userController::class, 'destroy'])->name('destroy');
            Route::get('/{id}/login', [App\Http\Controllers\pidum\userController::class, 'user_login'])->name('login');
        });

        //Archive
        Route::name('archive.')->prefix('archive')->group(function (){
            Route::get('/user', [App\Http\Controllers\pidum\archiveController::class, 'index'])->name('user');
            Route::prefix('user')->name('user.')->group(function (){
                Route::get('/{id}', [App\Http\Controllers\pidum\archiveController::class, 'show'])->name('show');
                Route::get('{id}/restore', [App\Http\Controllers\pidum\archiveController::class, 'restore'])->name('restore');
            });

            Route::get('/besuk', [App\Http\Controllers\pidum\archiveController::class, 'besuk_index'])->name('besuk');
            Route::prefix('besuk')->name('besuk.')->group(function (){
                Route::get('/{id}', [App\Http\Controllers\pidum\archiveController::class, 'besuk_show'])->name('show');
            });
        });

        // Setting
        Route::name('setting.')->prefix('setting')->group(function (){
            Route::get('/', [App\Http\Controllers\pidum\settingController::class, 'index'])->name('index');
            Route::put('/change-password', [App\Http\Controllers\pidum\settingController::class, 'updatePassword'])->name('update-password');
            Route::put('{id}/change-information', [App\Http\Controllers\pidum\settingController::class, 'updateInformation'])->name('update-information');
        });
    });
});
