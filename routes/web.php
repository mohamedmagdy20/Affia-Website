<?php

use App\Http\Controllers\About\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\City\CityController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\Country\CountryController;
use App\Http\Controllers\Entity\EntityController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\Header\HeaderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Provider\ProviderController;
use App\Http\Controllers\Services\ServicesController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Website\AuthController as WebsiteAuthController;
use App\Http\Controllers\Website\ProfileController;
use App\Http\Controllers\Website\ServiceController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'index'])->name('home');

Route::group(['middleware'=>'guest'],function(){
    Route::get('/login',[WebsiteAuthController::class,'loginView'])->name('website.login');
    Route::post('login',[WebsiteAuthController::class,'login'])->name('website.login.post');
    Route::get('register-user',[WebsiteAuthController::class,'registerUserView'])->name('register.user.view');
    Route::post('register-user',[WebsiteAuthController::class,'registerUser'])->name('register.user');
    Route::get('register-provider',[WebsiteAuthController::class,'registerProviderView'])->name('register.provider.view');
    Route::post('register-provider',[WebsiteAuthController::class,'registerProvider'])->name('register.provider');
    Route::get('verify',[WebsiteAuthController::class,'verificationView'])->name('verify.view');
    Route::post('verify',[WebsiteAuthController::class,'verification'])->name('verify');
    Route::get('resend',[WebsiteAuthController::class,'resend'])->name('resend');


    Route::get('forget-password', [ForgetPasswordController::class, 'forgetPasswordView'])->name('forget.password.get');
    Route::post('forget-password', [ForgetPasswordController::class, 'forgetPassword'])->name('forget.password.post'); 
    Route::get('reset-password/{token}', [ForgetPasswordController::class, 'ResetPasswordView'])->name('reset.password.get');
    Route::post('reset-password/{token}', [ForgetPasswordController::class, 'changePassword'])->name('reset.password.post');

});
Route::get('provider/{slug}',[HomeController::class,'show'])->name('show');
Route::get('providers',[HomeController::class,'providers'])->name('all');
Route::get('about-us',[HomeController::class,'about'])->name('about');
Route::get('contact-us',[HomeController::class,'contact'])->name('contact');

Route::group(['middleware'=>'auth'],function(){
    Route::get('logout',[WebsiteAuthController::class,'logout'])->name('website.logout');
    Route::get('dashboard',[HomeController::class,'dashboard'])->name('dashboard'); 
    Route::get('profile',[ProfileController::class,'index'])->name('profile');
    Route::post('profile',[ProfileController::class,'update'])->name('profile.update');
    Route::group(['prefix'=>'services','controller'=>ServiceController::class],function(){
        Route::get('/','index')->name('website.service.index');
        Route::get('create','create')->name('website.service.create');
        Route::get('edit/{id}','edit')->name('website.service.edit');
        Route::get('delete/{id}','delete')->name('website.service.delete');
        Route::post('store','store')->name('website.service.store');
        Route::post('update/{id}','update')->name('website.service.update');
    });

});

Route::group(['prefix'=>'admin','middleware'=>'guest:admin'],function(){
    Route::get('login',[AuthController::class,'loginView'])->name('login.view');
    Route::post('login',[AuthController::class,'login'])->name('login');

});
Route::group(['prefix'=>'admin','middleware'=>'auth:admin'],function(){
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin');
    Route::get('logout',[AuthController::class,'logout'])->name('logout');

    Route::group(['prefix'=>'manger','controller'=>AdminController::class],function(){
        Route::get('/','index')->name('admin.index');
        Route::get('create','create')->name('admin.create');
        Route::get('edit/{id}','edit')->name('admin.edit');
        Route::get('delete/{id}','delete')->name('admin.delete');
        Route::post('store','store')->name('admin.store');
        Route::post('update/{id}','update')->name('admin.update');
    });

    
    Route::group(['prefix'=>'category','controller'=>CategoryController::class],function(){
        Route::get('/','index')->name('admin.category.index');
        Route::get('create','create')->name('admin.category.create');
        Route::get('edit/{id}','edit')->name('admin.category.edit');
        Route::get('delete/{id}','delete')->name('admin.category.delete');
        Route::post('store','store')->name('admin.category.store');
        Route::post('update/{id}','update')->name('admin.category.update');
    });

    
    Route::group(['prefix'=>'user','controller'=>UserController::class],function(){
        Route::get('/','index')->name('admin.user.index');
        Route::get('create','create')->name('admin.user.create');
        Route::get('edit/{id}','edit')->name('admin.user.edit');
        Route::get('delete/{id}','delete')->name('admin.user.delete');
        Route::post('store','store')->name('admin.user.store');
        Route::post('update/{id}','update')->name('admin.user.update');
    });

    Route::group(['prefix'=>'country','controller'=>CountryController::class],function(){
        Route::get('/','index')->name('admin.country.index');
        Route::get('create','create')->name('admin.country.create');
        Route::get('edit/{id}','edit')->name('admin.country.edit');
        Route::get('delete/{id}','delete')->name('admin.country.delete');
        Route::post('store','store')->name('admin.country.store');
        Route::post('update/{id}','update')->name('admin.country.update');
        Route::post('upload-excel','uploadCountry')->name('admin.country.upload-excel');

    });


    Route::group(['prefix'=>'city','controller'=>CityController::class],function(){
        Route::get('/','index')->name('admin.city.index');
        Route::get('create','create')->name('admin.city.create');
        Route::get('edit/{id}','edit')->name('admin.city.edit');
        Route::get('delete/{id}','delete')->name('admin.city.delete');
        Route::post('store','store')->name('admin.city.store');
        Route::post('update/{id}','update')->name('admin.city.update');
        Route::post('upload-excel','uploadCountry')->name('admin.city.upload-excel');
    });

    Route::group(['prefix'=>'provider','controller'=>ProviderController::class],function(){
        Route::get('/','index')->name('admin.provider.index');
        Route::get('create','create')->name('admin.provider.create');
        Route::get('edit/{id}','edit')->name('admin.provider.edit');
        Route::get('delete/{id}','delete')->name('admin.provider.delete');
        Route::post('store','store')->name('admin.provider.store');
        Route::post('update/{id}','update')->name('admin.provider.update');
        // Route::post('upload-excel','uploadCountry')->name('admin.city.upload-excel');
    });

    
    Route::group(['prefix'=>'entity','controller'=>EntityController::class],function(){
        Route::get('/','index')->name('admin.entity.index');
        Route::get('create','create')->name('admin.entity.create');
        Route::get('edit/{id}','edit')->name('admin.entity.edit');
        Route::get('delete/{id}','delete')->name('admin.entity.delete');
        Route::post('store','store')->name('admin.entity.store');
        Route::post('update/{id}','update')->name('admin.entity.update');
        // Route::post('upload-excel','uploadCountry')->name('admin.city.upload-excel');
    });

    Route::group(['prefix'=>'service','controller'=>ServicesController::class],function(){
        Route::get('/','index')->name('admin.service.index');
        Route::get('create','create')->name('admin.service.create');
        Route::get('edit/{id}','edit')->name('admin.service.edit');
        Route::get('delete/{id}','delete')->name('admin.service.delete');
        Route::post('store','store')->name('admin.service.store');
        Route::post('update/{id}','update')->name('admin.service.update');
    });

    Route::group(['prefix'=>'about','controller'=>AboutController::class],function(){
        Route::get('/','index')->name('admin.about.index');
        Route::post('update/{id}','update')->name('admin.about.update');
    });

    Route::group(['prefix'=>'header','controller'=>HeaderController::class],function(){
        Route::get('/','index')->name('admin.header.index');
        Route::get('create','create')->name('admin.header.create');
        Route::get('edit/{id}','edit')->name('admin.header.edit');
        Route::get('delete/{id}','delete')->name('admin.header.delete');
        Route::post('store','store')->name('admin.header.store');
        Route::post('update/{id}','update')->name('admin.header.update');
    });

    
    Route::group(['prefix'=>'contact','controller'=>ContactController::class],function(){
        Route::get('/','index')->name('admin.contact.index');
        Route::post('update/{id}','update')->name('admin.contact.update');
    });
});
