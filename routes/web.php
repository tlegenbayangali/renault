<?php

use Illuminate\Support\Facades\Route;

/* Frontend */

use App\Http\Controllers\Frontend\IndexController as FrontendIndex;

/* Auth Controllers */

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LogoutController;

/* Backend */

use App\Http\Controllers\Backend\IndexController as BackendIndex;

/* Application Controller */

use App\Http\Controllers\Application\IndexController as ApplicationIndex;
use App\Http\Controllers\Application\ShowController as ApplicationShow;
use App\Http\Controllers\Application\CreateController as ApplicationCreate;
use App\Http\Controllers\Application\StoreController as ApplicationStore;
use App\Http\Controllers\Application\ChangeStatusController as ApplicationChangeStatus;

/**
 * Master Controllers
 */

use App\Http\Controllers\Backend\Master\IndexController as MasterIndex;
use App\Http\Controllers\Backend\Master\CreateController as MasterCreate;
use App\Http\Controllers\Backend\Master\StoreController as MasterStore;
use App\Http\Controllers\Backend\Master\ShowController as MasterShow;
use App\Http\Controllers\Backend\Master\EditController as MasterEdit;
use App\Http\Controllers\Backend\Master\UpdateController as MasterUpdate;
use App\Http\Controllers\Backend\Master\DestroyController as MasterDestroy;

/**
 * Service Controllers
 */

use App\Http\Controllers\Backend\Service\IndexController as ServiceIndex;
use App\Http\Controllers\Backend\Service\CreateController as ServiceCreate;
use App\Http\Controllers\Backend\Service\StoreController as ServiceStore;
use App\Http\Controllers\Backend\Service\EditController as ServiceEdit;
use App\Http\Controllers\Backend\Service\UpdateController as ServiceUpdate;
use App\Http\Controllers\Backend\Service\DestroyController as ServiceDestroy;

/**
 * Service Category Controllers
 */

use App\Http\Controllers\Backend\ServiceCategory\IndexController as ServiceCategoryIndex;
use App\Http\Controllers\Backend\ServiceCategory\CreateController as ServiceCategoryCreate;
use App\Http\Controllers\Backend\ServiceCategory\StoreController as ServiceCategoryStore;
use App\Http\Controllers\Backend\ServiceCategory\EditController as ServiceCategoryEdit;
use App\Http\Controllers\Backend\ServiceCategory\UpdateController as ServiceCategoryUpdate;
use App\Http\Controllers\Backend\ServiceCategory\DestroyController as ServiceCategoryDestroy;

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

Broadcast::routes();

/**
 * System Routes
 */

Route::group([
    'prefix' => 'system',
    'as' => 'system.',
    'middleware' => 'auth'
], function () {
    Route::get('migrate', function () {
        \Illuminate\Support\Facades\Artisan::call('migrate');
        return 'migrated successfully!';
    });
    Route::get('storage', function () {
        \Illuminate\Support\Facades\Artisan::call('storage:link');
        return 'Storage Linked!';
    });
});

Route::get('/', FrontendIndex::class)->name('frontend.index');

/* Guest Controller */

Route::group([
    'middleware' => 'guest',
], function () {
    Route::get('login', LoginController::class)->name('login');
    Route::post('auth', AuthController::class)->name('auth');
});

/* Backend Controller */

Route::group([
    'middleware' => 'auth',
    'prefix' => 'backend',
    'as' => 'backend.',
], function () {
    /*
     * Backend Index Controllers
    */
    Route::get('/', BackendIndex::class)->name('index');

    /* Logout Controller */
    Route::get('/logout', LogoutController::class)->name('logout');

    /* Applications Controller */
    Route::group([
        'prefix' => 'applications',
        'as' => 'applications.',
    ], function () {
        Route::get('/', ApplicationIndex::class)->name('index');
        Route::get('/create', ApplicationCreate::class)->name('create');
        Route::post('/', ApplicationStore::class)->name('store');
        Route::get('/{application_id}', ApplicationShow::class)->name('show');
        Route::patch('/{application_id}', ApplicationChangeStatus::class)->name('change_status');
    });

    /**
     * Master Routes
     */
    Route::group([
        'prefix' => 'masters',
        'as' => 'masters.'
    ], function () {
        Route::get('/', MasterIndex::class)->name('index');
        Route::get('create', MasterCreate::class)->name('create');
        Route::post('/', MasterStore::class)->name('store');
        Route::get('edit/{master_id}', MasterEdit::class)->name('edit');
        Route::patch('update/{master_id}', MasterUpdate::class)->name('update');
        Route::get('delete/{master_id}', MasterDestroy::class)->name('delete');
    });

    /**
     * Service Routes
     */
    Route::group([
        'prefix' => 'services',
        'as' => 'services.'
    ], function () {
        Route::get('/', ServiceIndex::class)->name('index');
        Route::get('create', ServiceCreate::class)->name('create');
        Route::post('/', ServiceStore::class)->name('store');
        Route::get('edit/{service_id}', ServiceEdit::class)->name('edit');
        Route::patch('update/{service_id}', ServiceUpdate::class)->name('update');
        Route::get('delete/{service_id}', ServiceDestroy::class)->name('delete');
    });

    /**
     * Service Category Routes
     */
    Route::group([
        'prefix' => 'service_categories',
        'as' => 'service_categories.'
    ], function () {
        Route::get('/', ServiceCategoryIndex::class)->name('index');
        Route::get('create', ServiceCategoryCreate::class)->name('create');
        Route::post('/', ServiceCategoryStore::class)->name('store');
        Route::get('edit/{service_category_id}', ServiceCategoryEdit::class)->name('edit');
        Route::patch('update/{service_category_id}', ServiceCategoryUpdate::class)->name('update');
        Route::get('delete/{service_category_id}', ServiceCategoryDestroy::class)->name('delete');
    });
});
