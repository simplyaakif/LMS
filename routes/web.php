<?php

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

//Course Routes
    Route::group(['prefix' => 'course'], function () {
        Route::get('/{id}', 'CourseController@show');
        Route::post('/', 'CourseController@store');
        Route::put('/', 'CourseController@update');
        Route::delete('/{id}', 'CourseController@delete');
    });

//Query Routes
    Route::group(['prefix' => 'query'], function () {
        Route::get('/{id}', 'QueryController@show');
        Route::post('/', 'QueryController@store');
        Route::put('/', 'QueryController@update');
        Route::delete('/{id}', 'QueryController@delete');
    });

// Students Routes
    Route::get('/student/{id}', 'StudentController@show');


//    User & Employee Routes
    Route::group(['prefix' => 'employee'], function () {
        Route::get('/{id}', 'EmployeeController@show');
        Route::post('/', 'EmployeeController@store');
        Route::put('/', 'EmployeeController@update');
        Route::delete('/', 'EmployeeController@delete');
        Route::group(['prefix' => 'user'], function () {
            Route::get('/{id}', 'EmployeeController@show_user');
            Route::post('/', 'EmployeeController@store_user');
            Route::put('/', 'EmployeeController@update_user');
            Route::delete('/', 'EmployeeController@delete_user');

        });
    });
