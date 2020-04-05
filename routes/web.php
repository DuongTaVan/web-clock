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
Route::group(['prefix'=>'account'],function(){
    Route::get('','Account\AdminController@index')->name('admin.account.index');
    Route::post('postLogin','Account\AdminController@postLogin');
    Route::get('getLogoutAdmin','Account\AdminController@getLogoutAdmin')->name('admin.account.getLogoutAdmin');
});


 Route::group(['prefix' => 'laravel-filemanager','middleware'=>'checkLogin'], function () {
 \UniSharp\LaravelFilemanager\Lfm::routes();
});


//BACKEND
Route::group(['prefix'=>'admin','middleware'=>'checkLogin'],function(){
	Route::get('/',function(){
		return view('admin.index');
	});

	Route::group(['prefix' => 'category'], function(){
        Route::get('','Admin\AdminCategoryController@index')->name('admin.category.index');
        Route::get('create','Admin\AdminCategoryController@create')->name('admin.category.create');
        Route::post('createe','Admin\AdminCategoryController@store');

        Route::get('update/{id}','Admin\AdminCategoryController@edit')->name('admin.category.update');
        Route::post('update/{id}','Admin\AdminCategoryController@update');

        Route::get('active/{id}','Admin\AdminCategoryController@active')->name('admin.category.active');
        Route::get('hot/{id}','Admin\AdminCategoryController@hot')->name('admin.category.hot');
        Route::get('delete/{id}','Admin\AdminCategoryController@delete')->name('admin.category.delete');
    });

    Route::group(['prefix' => 'menu'], function(){
        Route::get('','Admin\AdminMenuController@index')->name('admin.menu.index');
        Route::get('create','Admin\AdminMenuController@create')->name('admin.menu.create');
        Route::post('createe','Admin\AdminMenuController@store');

        Route::get('update/{id}','Admin\AdminMenuController@edit')->name('admin.menu.update');
        Route::post('update/{id}','Admin\AdminMenuController@update');

        Route::get('active/{id}','Admin\AdminMenuController@active')->name('admin.menu.active');
        Route::get('hot/{id}','Admin\AdminMenuController@hot')->name('admin.menu.hot');
        Route::get('delete/{id}','Admin\AdminMenuController@delete')->name('admin.menu.delete');
    });

    Route::group(['prefix' => 'article'], function(){
        Route::get('','Admin\AdminArticleController@index')->name('admin.article.index');
        Route::get('create','Admin\AdminArticleController@create')->name('admin.article.create');
        Route::post('create','Admin\AdminArticleController@store');

        Route::get('update/{id}','Admin\AdminArticleController@edit')->name('admin.article.update');
        Route::post('update/{id}','Admin\AdminArticleController@update');

        Route::get('active/{id}','Admin\AdminArticleController@active')->name('admin.article.active');
        Route::get('hot/{id}','Admin\AdminArticleController@hot')->name('admin.article.hot');
        Route::get('delete/{id}','Admin\AdminArticleController@delete')->name('admin.article.delete');
    });

    Route::group(['prefix' => 'keyword'], function(){
        Route::get('','Admin\AdminKeywordController@index')->name('admin.keyword.index');
        Route::get('create','Admin\AdminKeywordController@create')->name('admin.keyword.create');
        Route::post('createe','Admin\AdminKeywordController@store');

        Route::get('update/{id}','Admin\AdminKeywordController@edit')->name('admin.keyword.update');
        Route::post('update/{id}','Admin\AdminKeywordController@update');
        
        Route::get('hot/{id}','Admin\AdminKeywordController@hot')->name('admin.keyword.hot');
        Route::get('delete/{id}','Admin\AdminKeywordController@delete')->name('admin.keyword.delete');
    });

    Route::group(['prefix' => 'transaction'], function(){
        Route::get('','Admin\AdminTransactionController@index')->name('admin.transaction.index');
        Route::get('delete/{id}','Admin\AdminTransactionController@delete')->name('admin.transaction.delete');
        Route::get('view-transaction/{id}','Admin\AdminTransactionController@getTransactionDetail')->name('ajax.admin.transaction.detail');
        Route::get('delete-order/{id}','Admin\AdminTransactionController@delete_order')->name('ajax.admin.transaction.delete_order');
        Route::get('action/{active}/{id}','Admin\AdminTransactionController@active')->name('admin.transaction.active');
    });


    Route::group(['prefix' => 'product'], function(){
        Route::get('','Admin\AdminProductController@index')->name('admin.product.index');
        Route::get('create','Admin\AdminProductController@create')->name('admin.product.create');
        Route::post('create','Admin\AdminProductController@store');

        Route::get('update/{id}','Admin\AdminProductController@edit')->name('admin.product.update');
        Route::post('update/{id}','Admin\AdminProductController@update');
        
        Route::get('hot/{id}','Admin\AdminProductController@hot')->name('admin.product.hot');
        Route::get('active/{id}','Admin\AdminProductController@active')->name('admin.product.active');
        Route::get('delete/{id}','Admin\AdminProductController@delete')->name('admin.product.delete');
        
    });

    Route::group(['prefix' => 'attribute'], function(){
        Route::get('','Admin\AdminAttributeController@index')->name('admin.attribute.index');
        Route::get('create','Admin\AdminAttributeController@create')->name('admin.attribute.create');
        Route::post('createe','Admin\AdminAttributeController@store');

        Route::get('update/{id}','Admin\AdminAttributeController@edit')->name('admin.attribute.update');
        Route::post('update/{id}','Admin\AdminAttributeController@update');
        
        Route::get('hot/{id}','Admin\AdminAttributeController@hot')->name('admin.attribute.hot');
        Route::get('delete/{id}','Admin\AdminAttributeController@delete')->name('admin.attribute.delete');
    });

    Route::group(['prefix' => 'user'], function(){
        Route::get('','Admin\AdminUserController@index')->name('admin.user.index');
        Route::get('create','Admin\AdminUserController@create')->name('admin.user.create');
        Route::post('createe','Admin\AdminUserController@store');

        Route::get('update/{id}','Admin\AdminUserController@edit')->name('admin.user.update');
        Route::post('update/{id}','Admin\AdminUserController@update');
        
        
        Route::get('delete/{id}','Admin\AdminUserController@delete')->name('admin.user.delete');
    });
    
});

//  FRONT END
Route::group(['prefix'=>'frontend'], function(){
    
    Route::get('home','Frontend\FrontendHomeController@index')->name('frontend.home.index');
    Route::get('san-pham','Frontend\FrontendProductController@index')->name('frontend.product.index');
    Route::get('san-pham/{slug}','Frontend\FrontendDetailController@index')->name('frontend.detail.index');
    Route::get('bai-viet','Frontend\BlogController@index')->name('frontend.blog.index');
    Route::get('bai-viet/{slug}','Frontend\ArticleDetailController@index')->name('frontend.blog_detail.index');
    Route::group(['prefix'=>'account'], function(){
    
        Route::get('register','Account\RegisterController@index')->name('frontend.account.register.index');
        Route::post('register','Account\RegisterController@create');
        Route::get('login','Account\RegisterController@Login')->name('frontend.account.login.index');
        Route::post('login','Account\RegisterController@PostLogin');
         Route::get('logout','Account\RegisterController@Logout')->name('frontend.account.logout.index');
    
    });

    Route::group(['prefix'=>'article'], function(){
    
        Route::get('','Frontend\FrontendArticleController@index')->name('frontend.article.index');
       
        Route::get('login','Frontend\FrontendArticalController@Login')->name('frontend.account.login.index');
       
        Route::get('logout','Frontend\FrontendArticalController@Logout')->name('frontend.account.logout.index');
    
    });

    // cart
    Route::get('don-hang','Frontend\ShoppingCartController@index')->name('frontend.shopping.index');
    Route::group(['prefix'=>'shopping'], function(){
    
        Route::get('add/{id}','Frontend\ShoppingCartController@add')->name('frontend.shopping.add');
        
        Route::get('delete/{id}','Frontend\ShoppingCartController@delete')->name('frontend.shopping.delete');
       
        Route::get('update/{id}','Frontend\ShoppingCartController@update')->name('frontend.shopping.update');

        Route::post('pay','Frontend\ShoppingCartController@postpay');
    
    });
});
//Account

