<?php

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
    return view('welcome');
});

Route::group(['namespace'=>'Admin'],function(){
	Route::group(['prefix'=>'login','middleware'=>'CheckLogedIn'],function(){
		Route::get('/','LoginController@getLogin');
		Route::post('/','LoginController@postLogin');
	});
	Route::get('logout','HomeController@getLogout');
	Route::group(['prefix'=>'admin','middleware'=>'CheckLogedOut'],function(){
		Route::get('/','AccountController@getList');
		
		Route::group(['prefix'=>'account'],function(){
			Route::get('/','AccountController@getList');
			Route::get('add','AccountController@getAdd');
			Route::post('add','AccountController@postAdd');
			Route::get('edit/{id}','AccountController@getEdit');
			Route::post('edit/{id}','AccountController@postEdit');
			Route::get('delete/{id}','AccountController@getDelete');
		});
		Route::group(['prefix'=>'products'],function(){
			Route::group(['prefix'=>'price'],function(){
				Route::get('home/{cate_id}/{product_id}','PriceController@getList');
				Route::post('home/{cate_id}/{product_id}','PriceController@postAdd');
				Route::get('edit/{cate_id}/{product_id}/{price_id}','PriceController@getEdit');
				Route::post('edit/{cate_id}/{product_id}/{price_id}','PriceController@postEdit');
				Route::get('delete/{price_id}','PriceController@delete');
			});
			Route::group(['prefix'=>'hosting'],function(){
				Route::get('/','HostingController@getList');
				Route::get('/cate/{id}','HostingController@getCate');
				Route::get('add','HostingController@getAdd');
				Route::post('add','HostingController@postAdd');
				Route::get('edit/{id}','HostingController@getEdit');
				Route::post('edit/{id}','HostingController@postEdit');
				Route::get('delete/{id}','HostingController@getDelete');
			});
			Route::group(['prefix'=>'email'],function(){
				Route::get('/','EmailController@getList');
				Route::get('/cate/{id}','EmailController@getCate');
				Route::get('add','EmailController@getAdd');
				Route::post('add','EmailController@postAdd');
				Route::get('edit/{id}','EmailController@getEdit');
				Route::post('edit/{id}','EmailController@postEdit');
				Route::get('delete/{id}','EmailController@getDelete');
			});
			Route::group(['prefix'=>'server'],function(){
				Route::get('/','ServerController@getList');
				Route::get('/cate/{id}','ServerController@getCate');
				Route::get('add','ServerController@getAdd');
				Route::post('add','ServerController@postAdd');
				Route::get('edit/{id}','ServerController@getEdit');
				Route::post('edit/{id}','ServerController@postEdit');
				Route::get('delete/{id}','ServerController@getDelete');
			});
			Route::group(['prefix'=>'ads'],function(){
				Route::get('/','AdsController@getList');
				Route::get('/cate/{id}','AdsController@getCate');
				Route::get('add','AdsController@getAdd');
				Route::post('add','AdsController@postAdd');
				Route::get('edit/{id}','AdsController@getEdit');
				Route::post('edit/{id}','AdsController@postEdit');
				Route::get('delete/{id}','AdsController@getDelete');
			});
			Route::group(['prefix'=>'design'],function(){
				Route::get('/','DesignController@getList');
				Route::get('add','DesignController@getAdd');
				Route::post('add','DesignController@postAdd');
				Route::get('edit/{id}','DesignController@getEdit');
				Route::post('edit/{id}','DesignController@postEdit');
				Route::get('delete/{id}','DesignController@getDelete');
			});
			Route::group(['prefix'=>'software'],function(){
				Route::get('/','SoftwareController@getList');
				Route::get('/cate/{id}','SoftwareController@getCate');
				Route::get('add','SoftwareController@getAdd');
				Route::post('add','SoftwareController@postAdd');
				Route::get('edit/{id}','SoftwareController@getEdit');
				Route::post('edit/{id}','SoftwareController@postEdit');
				Route::get('delete/{id}','SoftwareController@getDelete');
			});
			Route::group(['prefix'=>'bonus'],function(){
				Route::get('/','BonusController@getList');
				Route::get('add','BonusController@getAdd');
				Route::post('add','BonusController@postAdd');
				Route::get('edit/{id}','BonusController@getEdit');
				Route::post('edit/{id}','BonusController@postEdit');
				Route::get('delete/{id}','BonusController@getDelete');
			});
			Route::group(['prefix'=>'catehosting'],function(){
				Route::get('/','CateHostingController@getList');
				Route::post('/','CateHostingController@addCate');
				Route::get('edit/{id}','CateHostingController@getEditCate');
				Route::post('edit/{id}','CateHostingController@postEditCate');
				Route::get('delete/{id}','CateHostingController@deleteCate');
			});
			Route::group(['prefix'=>'cateemail'],function(){
				Route::get('/','CateEmailController@getList');
				Route::post('/','CateEmailController@addCate');
				Route::get('edit/{id}','CateEmailController@getEditCate');
				Route::post('edit/{id}','CateEmailController@postEditCate');
				Route::get('delete/{id}','CateEmailController@deleteCate');
			});
			Route::group(['prefix'=>'cateserver'],function(){
				Route::get('/','CateServerController@getList');
				Route::post('/','CateServerController@addCate');
				Route::get('edit/{id}','CateServerController@getEditCate');
				Route::post('edit/{id}','CateServerController@postEditCate');
				Route::get('delete/{id}','CateServerController@deleteCate');
			});
			Route::group(['prefix'=>'cateads'],function(){
				Route::get('/','CateAdsController@getList');
				Route::post('/','CateAdsController@addCate');
				Route::get('edit/{id}','CateAdsController@getEditCate');
				Route::post('edit/{id}','CateAdsController@postEditCate');
				Route::get('delete/{id}','CateAdsController@deleteCate');
			});
			Route::group(['prefix'=>'catesoft'],function(){
				Route::get('/','CateSoftController@getList');
				Route::post('/','CateSoftController@addCate');
				Route::get('edit/{id}','CateSoftController@getEditCate');
				Route::post('edit/{id}','CateSoftController@postEditCate');
				Route::get('delete/{id}','CateSoftController@deleteCate');
			});
		});

		Route::group(['prefix'=>'order'],function(){
			Route::get('/','OrderController@getList');
			Route::get('detail/{id}','OrderController@getDetail');
			Route::get('yes/{id}','OrderController@yesOrder');
			Route::get('no/{id}','OrderController@noOrder');
			
		});
		Route::group(['prefix'=>'news'],function(){
			Route::get('/','NewsController@getList');
			Route::get('add','NewsController@getAdd');
			Route::post('add','NewsController@postAdd');
			Route::get('edit/{id}','NewsController@getEdit');
			Route::post('edit/{id}','NewsController@postEdit');
			Route::get('delete/{id}','NewsController@getDelete');
		});
		Route::group(['prefix'=>'ques'],function(){
			Route::get('/','QuesController@getList');
			Route::get('add','QuesController@getAdd');
			Route::post('add','QuesController@postAdd');
			Route::get('edit/{id}','QuesController@getEdit');
			Route::post('edit/{id}','QuesController@postEdit');
			Route::get('delete/{id}','QuesController@getDelete');
		});
	});
});
Route::group(['namespace'=>'Frontend'],function(){
	Route::group(['prefix'=>'cart'],function(){
		Route::get('add/{id}','CartController@getAddCart');
		Route::get('show', 'CartController@getShowCart');
		Route::get('delete/{id}', 'CartController@getDeleteCart');
		Route::get('update', 'CartController@getUpdateCart');
		Route::post('show', 'CartController@postComplete');
		Route::get('complete', 'CartController@getComplete');

	});
});
