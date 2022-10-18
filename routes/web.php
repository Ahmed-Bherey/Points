<?php

use Illuminate\Support\Facades\Auth;
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
    // Route::get('/admin/login', [\App\Http\Controllers\Admin\LoginController::class, 'getLogin'])->name('admin.login');

    // Route::group(['middleware' => 'web'], function () {
    //     Route::post('/admin/login', [\App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login.post');
    //     Route::get('/logout', [\App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('admin.logout');
    // });
Route::resource('Admin/add/roles', 'App\Http\Controllers\Admin\RolesController');
//        Route::resource('Admin/add/users', 'App\Http\Controllers\Admin\UsersController');

// Route::group(['prefix' => 'user', 'as' => 'users.'], function () {
//     Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
//         Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\UsersController@create']);
//         Route::post('/', ['as' => 'store', 'uses' => '\App\Http\Controllers\Admin\UsersController@store']);
//     });
//     //edit / update
//     Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
//         Route::get('user/{user?}', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\UsersController@edit']);
//         Route::post('user/{user?}', ['as' => 'update', 'uses' => '\App\Http\Controllers\Admin\UsersController@update']);
//     });
//     //show users
//     Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
//         Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\UsersController@index']);
//         Route::get('data', ['as' => 'data', 'uses' => '\App\Http\Controllers\Admin\UsersController@data']); //.data
//     });

//     Route::get('/{user?}', ['as' => 'delete', 'uses' => '\App\Http\Controllers\Admin\UsersController@delete']);
// });
/////////////details
// Route::group(['prefix' => 'detail', 'as' => 'details.'], function () {
//     Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
//         Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\DetailController@create']);
//         Route::post('/', ['as' => 'store', 'uses' => '\App\Http\Controllers\Admin\DetailController@store']);
//     });
//     //edit / update
//     Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
//         Route::get('detail/{detail?}', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\DetailController@edit']);
//         Route::post('detail/{detail?}', ['as' => 'update', 'uses' => '\App\Http\Controllers\Admin\DetailController@update']);
//     });
//     //show details
//     Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
//         Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\DetailController@index']);
//         Route::get('data', ['as' => 'data', 'uses' => '\App\Http\Controllers\Admin\DetailController@data']); //.data
//     });

//     Route::get('/{detail?}', ['as' => 'delete', 'uses' => '\App\Http\Controllers\Admin\DetailController@delete']);
// });
/////////////details

Route::group(['prefix' => 'companySitting', 'as' => 'companySittings.'], function () {
    Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\CompanySittingController@create']);
        Route::post('/', ['as' => 'store', 'uses' => '\App\Http\Controllers\Admin\CompanySittingController@store']);
    });
    //edit / update
    Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
        Route::get('companySitting/{companySitting?}', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\CompanySittingController@edit']);
        Route::post('companySitting/{companySitting?}', ['as' => 'update', 'uses' => '\App\Http\Controllers\Admin\CompanySittingController@update']);
    });
    //show companySittings
    Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\CompanySittingController@index']);
        Route::get('data', ['as' => 'data', 'uses' => '\App\Http\Controllers\Admin\CompanySittingController@data']); //.data
    });

    Route::get('/{companySitting?}', ['as' => 'delete', 'uses' => '\App\Http\Controllers\Admin\CompanySittingController@delete']);
});
/////////////stores
Route::group(['prefix' => 'store', 'as' => 'stores.'], function () {
    Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\StoreController@create']);
        Route::post('/', ['as' => 'store', 'uses' => '\App\Http\Controllers\Admin\StoreController@store']);
    });
    //edit / update
    Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
        Route::get('store/{store?}', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\StoreController@edit']);
        Route::post('store/{store?}', ['as' => 'update', 'uses' => '\App\Http\Controllers\Admin\StoreController@update']);
    });
    //show stores
    Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\StoreController@index']);
        Route::get('data', ['as' => 'data', 'uses' => '\App\Http\Controllers\Admin\StoreController@data']); //.data
    });
    Route::get('/{store?}', ['as' => 'delete', 'uses' => '\App\Http\Controllers\Admin\StoreController@delete']);

});

/////////////companys

Route::group(['prefix' => 'company', 'as' => 'companys.'], function () {
    Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\CompanyController@create']);
        Route::post('/', ['as' => 'store', 'uses' => '\App\Http\Controllers\Admin\CompanyController@store']);
    });
    //edit / update
    Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
        Route::get('company/{company?}', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\CompanyController@edit']);
        Route::post('company/{company?}', ['as' => 'update', 'uses' => '\App\Http\Controllers\Admin\CompanyController@update']);
    });
    //show companys
    Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\CompanyController@index']);
        Route::get('data', ['as' => 'data', 'uses' => '\App\Http\Controllers\Admin\CompanyController@data']); //.data
    });

    Route::get('/{company?}', ['as' => 'delete', 'uses' => '\App\Http\Controllers\Admin\CompanyController@delete']);
});
/////////////units

Route::group(['prefix' => 'unit', 'as' => 'units.'], function () {
    Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\UnitController@create']);
        Route::post('/', ['as' => 'store', 'uses' => '\App\Http\Controllers\Admin\UnitController@store']);
    });
    //edit / update
    Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
        Route::get('unit/{unit?}', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\UnitController@edit']);
        Route::post('unit/{unit?}', ['as' => 'update', 'uses' => '\App\Http\Controllers\Admin\UnitController@update']);
    });
    //show units
    Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\UnitController@index']);
        Route::get('data', ['as' => 'data', 'uses' => '\App\Http\Controllers\Admin\UnitController@data']); //.data
    });

    Route::get('/{unit?}', ['as' => 'delete', 'uses' => '\App\Http\Controllers\Admin\UnitController@delete']);
});
/////////////sizes

Route::group(['prefix' => 'size', 'as' => 'sizes.'], function () {
    Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\SizeController@create']);
        Route::post('/', ['as' => 'store', 'uses' => '\App\Http\Controllers\Admin\SizeController@store']);
    });
    //edit / update
    Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
        Route::get('size/{size?}', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\SizeController@edit']);
        Route::post('size/{size?}', ['as' => 'update', 'uses' => '\App\Http\Controllers\Admin\SizeController@update']);
    });
    //show sizes
    Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\SizeController@index']);
        Route::get('data', ['as' => 'data', 'uses' => '\App\Http\Controllers\Admin\SizeController@data']); //.data
    });

    Route::get('/{size?}', ['as' => 'delete', 'uses' => '\App\Http\Controllers\Admin\SizeController@delete']);
});
/////////////colors

Route::group(['prefix' => 'color', 'as' => 'colors.'], function () {
    Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\ColorController@create']);
        Route::post('/', ['as' => 'store', 'uses' => '\App\Http\Controllers\Admin\ColorController@store']);
    });
    //edit / update
    Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
        Route::get('color/{color?}', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\ColorController@edit']);
        Route::post('color/{color?}', ['as' => 'update', 'uses' => '\App\Http\Controllers\Admin\ColorController@update']);
    });
    //show colors
    Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\ColorController@index']);
        Route::get('data', ['as' => 'data', 'uses' => '\App\Http\Controllers\Admin\ColorController@data']); //.data
    });

    Route::get('/{color?}', ['as' => 'delete', 'uses' => '\App\Http\Controllers\Admin\ColorController@delete']);
});
/////////////types

Route::group(['prefix' => 'type', 'as' => 'types.'], function () {
    Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\TypeController@create']);
        Route::post('/', ['as' => 'store', 'uses' => '\App\Http\Controllers\Admin\TypeController@store']);
    });
    //edit / update
    Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
        Route::get('type/{type?}', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\TypeController@edit']);
        Route::post('type/{type?}', ['as' => 'update', 'uses' => '\App\Http\Controllers\Admin\TypeController@update']);
    });
    //show types
    Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\TypeController@index']);
        Route::get('data', ['as' => 'data', 'uses' => '\App\Http\Controllers\Admin\TypeController@data']); //.data
    });

    Route::get('/{type?}', ['as' => 'delete', 'uses' => '\App\Http\Controllers\Admin\TypeController@delete']);
});
// Route::get('/', [\App\Http\Controllers\Auth\LoginController::class, 'login']);



Auth::routes();

