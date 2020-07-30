<?php

use App\NonAccordanceSources;
use Illuminate\Support\Facades\Route;

Route::post('auth/login', 'AuthController@login');
Route::post('auth/register', 'AuthController@register');
Route::get('GetNonAccordanceSource','NonAccordanceSourcesController@GetNonAccordanceSource');
Route::get('GetAccordanceProcess','AccordanceProcessController@GetAccordanceProcess');
Route::get('GetArea','AreaController@GetArea');

Route::post('NonAccordanceReport','NonAccordanceReportController@store');
Route::get('NonAccordanceReport','NonAccordanceReportController@index');
Route::get('NonAccordanceReport/{SisamNonAccordanceReport}', 'NonAccordanceReportController@show');
Route::delete('NonAccordanceReport/{SisamNonAccordanceReport}', 'NonAccordanceReportController@destroy');
Route::put('NonAccordanceReport/{SisamNonAccordanceReport}', 'NonAccordanceReportController@update');

//Route::resource('NonAccordanceReport', 'NonAccordanceReportController');


Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {

        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');


    });

