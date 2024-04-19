<?php

use App\Http\Controllers\CustomerOrders\CustomerOrdersController;
use App\Http\Controllers\Customers\CustomersController;
use App\Http\Controllers\Districts\DistrictsController;
use App\Http\Controllers\Drivers\DriversController;
use App\Http\Controllers\Serepta\SereptaController;
use App\Http\Controllers\Towns\TownsController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::any('/viewTowns', [TownsController::class, 'viewTowns']);
Route::any('/viewDistricts', [DistrictsController::class, 'viewDistricts']);
Route::any('/viewSerepta', [SereptaController::class, 'viewSerepta']);
Route::any('/viewDrivers', [DriversController::class, 'viewDrivers']);
Route::any('/viewCustomers', [CustomersController::class, 'viewCustomers']);
Route::any('/viewCustomerOrder', [CustomerOrdersController::class, 'viewCustomerOrder']);




