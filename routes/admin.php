<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SiteConfigurationController;
use App\Http\Controllers\Admin\EmailTemplatesController;
use App\Http\Controllers\Admin\GoogleOCRController;
use App\Http\Controllers\Admin\TallyController;

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
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Site Configuration
    Route::get('site-configuration', [SiteConfigurationController::class, 'index'])->name('site-configuration');
    Route::post('site_configurations/update', [SiteConfigurationController::class, 'updateSiteConfiguration'])->name('site-configuration.update');

    //Email Templates
    Route::get('email-template', [EmailTemplatesController::class, 'index'])->name('email-template');
    Route::get('email-template/create', [EmailTemplatesController::class, 'create'])->name('email-template.create');
    Route::post('email-template/store', [EmailTemplatesController::class, 'store'])->name('email-template.store');
    Route::get('email-template/edit/{id}', [EmailTemplatesController::class, 'edit'])->name('email-template.edit');
    Route::post('email-template/update/{id}', [EmailTemplatesController::class, 'update'])->name('email-template.update');
    Route::get('email-template/delete/{id}', [EmailTemplatesController::class, 'delete'])->name('email-template.delete');

    //Add Group & Items
    Route::get('groups-items',[TallyController::class, 'getGroupItems'])->name('getGroupItems');
    Route::post('store-stocks-groups',[TallyController::class, 'addGroupItems'])->name('storeGroupStocks');

    //Add Ledger Account
    Route::get('ledger-account', [TallyController::class, 'getLedgerAccount'])->name('getLedgerAccount');
    Route::get('ledger-account-details', [TallyController::class, 'getLedgerAccountList'])->name('getLedgerAccountLists');
    Route::post('store-ledger-account', [TallyController::class, 'addLedgerAccount'])->name('storeLedgerAccount');

});

