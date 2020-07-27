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
Auth::routes();
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/clean', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cache, Route, Config and Views are cleared";
});

Route::post('newsletter','gls\NewsletterController@store');

Route::prefix('{lang?}')->middleware('locale')->group(function() {

    Route::get('/', 'gls\IndexController@index');
    
    Route::get('/about', 'gls\IndexController@about');
    
    Route::get('/contact', function () {
        return view('pages.contact');
    });
    
    Route::get('/services', 'gls\IndexController@services');
        
    
    Route::group(['prefix' => 'portfolio'], function() {

        Route::get('/', 'gls\IndexController@works'); 

        Route::get('/{slug}', 'gls\IndexController@work'); 
                    
    });
   
    
    Route::get('/testimonials', 'gls\IndexController@testimonials');
    
    Route::get('/team', 'gls\IndexController@teams');
    
    Route::get('/pricing', function () {
        return view('pages.pricing');
    });
    
    Route::get('/blog', function () {
        return view('pages.blog');
    });
    
    Route::get('/blog/{slug}', function () {
        return view('pages.blog-details');
    });
   
    Route::get('/home', 'HomeController@index')->name('home');
    
    
    Route::get('/terms-of-services', function () {
        return view('pages.terms');
    });
    
    Route::get('/privacy-policy', function () {
        return view('pages.privacy');
    });
});

Route::post('/contact', 'gls\ContactController@send');

