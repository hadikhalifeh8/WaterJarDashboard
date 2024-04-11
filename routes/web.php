<?php

use App\Http\Controllers\CustomerOrders\CustomerOrdersController;
use App\Http\Controllers\Customers\CustomersController;
use App\Http\Controllers\Districts\DistrictsController;
use App\Http\Controllers\Drivers\DriversController;
use App\Http\Controllers\productontroller;
use App\Http\Controllers\Serepta\SereptaController;
use App\Http\Controllers\Tannourine\TannourineController;
use App\Http\Controllers\Towns\TownsController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

// إذا كنت فتح الموقع باللغه العربيه وسكرت بس إرجع إفتح بكون محفظ أخر مره قبل ما يسكر فيها وبيرجع بيفتح باللغه العربيه
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:sanctum', 'verified']
    ], function(){


        // HomePage
        Route::get('/', function()
        {
            return view('empty');
        });

        Route::resource('Towns', TownsController::class);
        Route::resource('Districts', DistrictsController::class);
        Route::resource('Serepta', SereptaController::class);
        Route::resource('Tannourine', TannourineController::class);
        Route::resource('Customers', CustomersController::class);
        Route::resource('Drivers', DriversController::class);
        Route::resource('CustomerOrders', CustomerOrdersController::class);

        


        


        //Get Districts Directly When Choose a Town. 
        Route::get('/Get_district/{id}', [CustomersController::class, 'getdistrict']);
        

        //Get Customers Directly When Choose a Driver. 
        Route::get('/Get_customer/{id}', [CustomerOrdersController::class, 'getcustomer']);
        
        //Get Customers Directly When Choose a Driver.
        Route::get('/Get_town/{id}', [CustomerOrdersController::class, 'gettown']);

        //Get Customers Directly When Choose a Driver.
        Route::get('/Get_district_s/{id}', [CustomerOrdersController::class, 'get_district_s']);



        Route::get('/Get_tannourine_price_Lira/{id}', [CustomerOrdersController::class, 'getTannourinePriceLira']);
        Route::get('/Get_tannourine_price_Dollar/{id}', [CustomerOrdersController::class, 'getTannourinePriceDollar']);


        Route::get('/Get_Serepta_price_Lira/{id}', [CustomerOrdersController::class, 'getSereptaPriceLira']);
        Route::get('/Get_Serepta_price_Dollar/{id}', [CustomerOrdersController::class, 'getSereptaPriceDollar']);








        




    });
