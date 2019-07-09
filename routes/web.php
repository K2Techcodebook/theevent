<?php
use App\Models\About;
use App\Models\Service;
use App\Models\upevent;
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

Route::get('/', function () {

  $data = About::all();
  $data3 = upevent::all();
  $data2 = Service::all();
  return view('welcome', compact('data',$data,'data2',$data2,'data3',$data3));
});
// Route::get('/', 'HomeController@welcomehome')->name('/');

Auth::routes();

Route::get('/home', 'HomeController@home')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/clear-cache', function() {
   $exitCode =  Illuminate\Support\Facades\Artisan::call('cache:clear');
    $exitCode = Illuminate\Support\Facades\Artisan::call('route:clear');
    $exitCode = Illuminate\Support\Facades\Artisan::call('config:clear');
    return $exitCode;
    // return what you want
});

Route::post('/register_new_user', 'Auth\RegisterController@createAffiliate')->name('register_new_user');

Route::post('/login', 'Auth\LoginController@affiliateLogin')->name('log_affiliate');



Route::group(['middleware'=>'auth'], function () {

  Route::get('/package', 'TokenPlansController@index')->name('package');
  Route::post('/UserPackage', 'TokenPlansController@createPackage')->name('UserPackage');
  Route::get('/payment', 'TokenPlansController@payment')->name('payment');
  //super admin
	Route::get('verifyUser',['middleware'=>'check-permission:superadmin','uses'=>'HomeController@verifyUser'])->name('verifyUser');
  Route::get('videoUpload',['middleware'=>'check-permission:superadmin','uses'=>'HomeController@videoUpload'])->name('videoUpload');
  Route::get('videoDelete',['middleware'=>'check-permission:superadmin','uses'=>'VideosController@index'])->name('videoDelete');
  Route::post('Update_video',['middleware'=>'check-permission:superadmin','uses'=>'HomeController@Update_video'])->name('Update_video');
  Route::get('/activate/{id?}',['middleware'=>'check-permission:superadmin','uses'=>'HomeController@activateUser'])->name('activate');
  Route::get('/deletefile/{id?}',['middleware'=>'check-permission:superadmin','uses'=>'VideosController@destroy'])->name('deletefile');
  Route::post('summernoteeditor',['middleware'=>'check-permission:superadmin','uses'=>'HomeController@postSummernoteeditor'])->name('summernoteeditor');
  	Route::get('control',['middleware'=>'check-permission:superadmin','uses'=>'HomeController@control'])->name('control');
  // Route::post('summernoteeditor',array('as'=>'summernoteeditor.post',['middleware'=>'check-permission:superadmin','uses'=>'HomeController@postSummernoteeditor']));

// super admin and validUser
	Route::get('video/{id}-{slug}',['middleware'=>'check-permission:user|admin|superadmin','uses'=>'HomeController@viewVideo'])->name('video');




Route::post('/updateProfile', 'HomeController@updateProfile')->name('updateProfile');
Route::post('/uploadItem', 'ItemsController@uploadItem')->name('uploadItem');
Route::get('/item/{name?}/{id?}', 'HomeController@load_items')->name('view_items');

    //Get
Route::get('/items', 'ItemsController@index')->name('items');
Route::get('/manage-items', 'ItemsController@manageItems')->name('manage-items');
Route::get('/add-items', 'ItemsController@addItems')->name('add-items');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/profile', 'HomeController@profile')->name('profile');


//Base on user level for now ignore

	Route::get('permissions-all-users',['middleware'=>'check-permission:user|admin|superadmin','uses'=>'HomeController@allUsers']);

	Route::get('permissions-admin-superadmin',['middleware'=>'check-permission:admin|superadmin','uses'=>'HomeController@adminSuperadmin']);

	Route::get('permissions-superadmin',['middleware'=>'check-permission:superadmin','uses'=>'HomeController@superadmin']);

	//Post
  Route::post('/Update_profile', 'HomeController@Update_profile')->name('Update_profile');
});


//Admin Middleware Only
Route::group(['middleware'=>'check-permission:admin|superadmin'], function () {
  Route::get('/Category', 'CategorysController@view')->name('Category');
  Route::post('/store_industry','CategorysController@store_industry')->name('store_industry');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
