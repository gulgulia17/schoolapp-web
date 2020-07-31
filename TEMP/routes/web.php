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

Route::get('/', 'PagesController@index');
Route::get('/index', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');
Route::get('/purchase', 'PagesController@purchase')->name('purchase');
Route::get('complaint', 'PagesController@complaint')->name('complaint');

Auth::routes();
/**
 * POST Routes 
 * 1. Contact
 */

Route::POST('/contact', 'PagesController@storeContact')->name('contact');
Route::POST('/disctrict', 'PagesController@disctrict')->name('disctrict');
Route::POST('/purchase', 'PagesController@storePurchase');
Route::POST('complaint', 'PagesController@postComplaint');
Route::POST('sendmessage', 'MessageController@store');


Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['web', 'auth',]], function () {
    Route::get('admin', 'HomeController@index');
    Route::get('admin/inquiry', 'Admin\InquiryController@index')->name('inquiry');
    Route::get('admin/purchaserequest', 'Admin\PurchaseRequestController@index')->name('purchaseRequest');
    Route::get('admin/usercomplaint', 'Admin\UserComplaintController@index')->name('usercomplaint');
    Route::get('admin/pages/about', 'Admin\AboutController@index')->name('admin.pages.about');
    Route::get('admin/pages/contact', 'Admin\ContactDetailController@index')->name('admin.pages.contact');
    Route::get('admin/pages/gretting', 'Admin\GrettingController@index')->name('admin.pages.gretting');
    
    Route::post('admin/pages/about', 'Admin\AboutController@store');
    Route::post('admin/pages/contact', 'Admin\ContactDetailController@store');
    Route::post('admin/pages/gretting', 'Admin\GrettingController@store');

    Route::resource('sociallinks', 'Admin\SocialLinksController', ['except' => ['show']]);
    Route::resource('testimonial', 'Admin\TestimonialController', ['except' => ['show']]);
    Route::resource('newfeatures', 'Admin\NewfeaturesController', ['except' => ['show']]);
    Route::resource('herosection', 'Admin\HeroController', ['except' => ['show']]);
    Route::resource('topfeatures', 'Admin\TopFeaturesController', ['except' => ['show']]);
    Route::resource('counter', 'Admin\CounterController', ['except' => ['show', 'delete']]);
    Route::resource('botmessage', 'Admin\BotMessageController', ['except' => ['show']]);
    Route::get('message', 'MessageController@index')->name('message');
    Route::post('/cleartable', 'MessageController@cleartable');
});
