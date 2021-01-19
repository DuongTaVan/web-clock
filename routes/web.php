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
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
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
    Route::group(['prefix'=>'profile'], function(){
        Route::get('profile/{id}','Account\AdminController@getProfile')->name('profile.list');
        Route::post('profile/{id}','Account\AdminController@postProfile')->name('profile.update');
    });

    Route::group(['prefix'=>'admin'],function(){
        //list user
        Route::get('','RolePermission\AdminController@getIndex')->name('user.list')->middleware('checkAcl:admin-list');
        //create user
        Route::get('create','RolePermission\AdminController@create')->name('user.add')->middleware('checkAcl:admin-add');;
        Route::post('create','RolePermission\AdminController@store')->name('user.postadd')->middleware('checkAcl:admin-add');;
        Route::get('edit/{id}','RolePermission\AdminController@edit')->name('user.edit')->middleware('checkAcl:admin-edit');;
        Route::post('postedit/{id}','RolePermission\AdminController@postedit')->name('user.postedit')->middleware('checkAcl:admin-edit');;
        Route::get('delete/{id}','RolePermission\AdminController@delete')->name('user.delete')->middleware('checkAcl:admin-delete');
    });
    //Role
    Route::group(['prefix'=>'roles'],function(){
        //list user
        Route::get('','RolePermission\RoleController@getIndex')->name('role.list')->middleware('checkAcl:role-list');
        //create user
        Route::get('create','RolePermission\RoleController@create')->name('role.add')->middleware('checkAcl:role-add');;
        Route::post('create','RolePermission\RoleController@store')->name('role.postadd')->middleware('checkAcl:role-add');;
        Route::get('edit/{id}','RolePermission\RoleController@edit')->name('role.edit')->middleware('checkAcl:role-edit');
        Route::post('postedit/{id}','RolePermission\RoleController@postedit')->name('role.postedit')->middleware('checkAcl:role-edit');;
        Route::get('delete/{id}','RolePermission\RoleController@delete')->name('role.delete')->middleware('checkAcl:role-delete')->middleware('checkAcl:role-delete');
    });
    //Permission
    Route::group(['prefix'=>'permission','middleware'=>'checkAcl:permission'],function(){
        //list user
        Route::get('','RolePermission\PermissionController@getIndex')->name('permission.list');
        //create user
        Route::get('create','RolePermission\PermissionController@create')->name('permission.add');
        Route::post('create','RolePermission\PermissionController@store')->name('permission.postadd');
        Route::get('edit/{id}','RolePermission\PermissionController@edit')->name('permission.edit');
        Route::post('postedit/{id}','RolePermission\PermissionController@postedit')->name('permission.postedit');
        Route::get('delete/{id}','RolePermission\PermissionController@delete')->name('permission.delete');
    });





	Route::group(['prefix' => 'category','middleware'=>'checkAcl:category'], function(){
        Route::get('','Admin\AdminCategoryController@index')->name('admin.category.index');
        Route::get('create','Admin\AdminCategoryController@create')->name('admin.category.create');
        Route::post('createe','Admin\AdminCategoryController@store');

        Route::get('update/{id}','Admin\AdminCategoryController@edit')->name('admin.category.update');
        Route::post('update/{id}','Admin\AdminCategoryController@update');

        Route::get('active/{id}','Admin\AdminCategoryController@active')->name('admin.category.active');
        Route::get('hot/{id}','Admin\AdminCategoryController@hot')->name('admin.category.hot');
        Route::get('delete/{id}','Admin\AdminCategoryController@delete')->name('admin.category.delete');
    });
    Route::group(['prefix'=>'statistical','middleware'=>'checkAcl:statistical'], function(){
        Route::get('','Admin\AdminStatisticalController@index')->name('admin.statistical.index');
    });
    Route::group(['prefix'=>'warehouse','middleware'=>'checkAcl:warehouse'], function(){
        Route::get('','Admin\AdminWareHouseController@index')->name('admin.warehouse.index');
    });

    Route::group(['prefix' => 'menu','middleware'=>'checkAcl:menu'], function(){
        Route::get('','Admin\AdminMenuController@index')->name('admin.menu.index');
        Route::get('create','Admin\AdminMenuController@create')->name('admin.menu.create');
        Route::post('createe','Admin\AdminMenuController@store');

        Route::get('update/{id}','Admin\AdminMenuController@edit')->name('admin.menu.update');
        Route::post('update/{id}','Admin\AdminMenuController@update');

        Route::get('active/{id}','Admin\AdminMenuController@active')->name('admin.menu.active');
        Route::get('hot/{id}','Admin\AdminMenuController@hot')->name('admin.menu.hot');
        Route::get('delete/{id}','Admin\AdminMenuController@delete')->name('admin.menu.delete');
    });

    Route::group(['prefix' => 'article','middleware'=>'checkAcl:write-blog'], function(){
        Route::get('','Admin\AdminArticleController@index')->name('admin.article.index');
        Route::get('create','Admin\AdminArticleController@create')->name('admin.article.create');
        Route::post('create','Admin\AdminArticleController@store');

        Route::get('update/{id}','Admin\AdminArticleController@edit')->name('admin.article.update');
        Route::post('update/{id}','Admin\AdminArticleController@update');

        Route::get('active/{id}','Admin\AdminArticleController@active')->name('admin.article.active');
        Route::get('hot/{id}','Admin\AdminArticleController@hot')->name('admin.article.hot');
        Route::get('delete/{id}','Admin\AdminArticleController@delete')->name('admin.article.delete');
    });

    Route::group(['prefix' => 'keyword','middleware'=>'checkAcl:key'], function(){
        Route::get('','Admin\AdminKeywordController@index')->name('admin.keyword.index');
        Route::get('create','Admin\AdminKeywordController@create')->name('admin.keyword.create');
        Route::post('createe','Admin\AdminKeywordController@store');

        Route::get('update/{id}','Admin\AdminKeywordController@edit')->name('admin.keyword.update');
        Route::post('update/{id}','Admin\AdminKeywordController@update');
        
        Route::get('hot/{id}','Admin\AdminKeywordController@hot')->name('admin.keyword.hot');
        Route::get('delete/{id}','Admin\AdminKeywordController@delete')->name('admin.keyword.delete');
    });

    Route::group(['prefix' => 'transaction','middleware'=>'checkAcl:transport'], function(){
        Route::get('','Admin\AdminTransactionController@index')->name('admin.transaction.index')->middleware('checkAcl:transport');
        Route::get('delete/{id}','Admin\AdminTransactionController@delete')->name('admin.transaction.delete')->middleware('checkAcl:transport');
        Route::get('view-transaction/{id}','Admin\AdminTransactionController@getTransactionDetail')->name('ajax.admin.transaction.detail')->middleware('checkAcl:transport');
        Route::get('delete-order/{id}','Admin\AdminTransactionController@delete_order')->name('ajax.admin.transaction.delete_order')->middleware('checkAcl:transport');
        Route::get('action/{active}/{id}','Admin\AdminTransactionController@active')->name('admin.transaction.active')->middleware('checkAcl:transport');
    });


    Route::group(['prefix' => 'product','middleware'=>'checkAcl:product'], function(){
        Route::get('','Admin\AdminProductController@index')->name('admin.product.index');
        Route::get('create','Admin\AdminProductController@create')->name('admin.product.create');
        Route::post('create','Admin\AdminProductController@store');

        Route::get('update/{id}','Admin\AdminProductController@edit')->name('admin.product.update');
        Route::post('update/{id}','Admin\AdminProductController@update');
        
        Route::get('hot/{id}','Admin\AdminProductController@hot')->name('admin.product.hot');
        Route::get('active/{id}','Admin\AdminProductController@active')->name('admin.product.active');
        Route::get('delete/{id}','Admin\AdminProductController@delete')->name('admin.product.delete');
        Route::get('delete-image/{id}','Admin\AdminProductController@deleteImage')->name('admin.product.delete_image');
        
    });

    Route::group(['prefix' => 'attribute','middleware'=>'checkAcl:attribute'], function(){
        Route::get('','Admin\AdminAttributeController@index')->name('admin.attribute.index');
        Route::get('create','Admin\AdminAttributeController@create')->name('admin.attribute.create');
        Route::post('createe','Admin\AdminAttributeController@store');

        Route::get('update/{id}','Admin\AdminAttributeController@edit')->name('admin.attribute.update');
        Route::post('update/{id}','Admin\AdminAttributeController@update');
        
        Route::get('hot/{id}','Admin\AdminAttributeController@hot')->name('admin.attribute.hot');
        Route::get('delete/{id}','Admin\AdminAttributeController@delete')->name('admin.attribute.delete');
    });

    Route::group(['prefix' => 'user','middleware'=>'checkAcl:user'], function(){
        Route::get('','Admin\AdminUserController@index')->name('admin.user.index');

        Route::get('delete/{id}','Admin\AdminUserController@delete')->name('admin.user.delete');
    });
    Route::group(['prefix' => 'rating','middleware'=>'checkAcl:rating'], function(){
        Route::get('','Admin\RatingController@index')->name('admin.rating.index');
        Route::get('delete/{id}','Admin\RatingController@delete')->name('admin.rating.delete');
    });

    Route::group(['prefix' => 'trademark','middleware'=>'checkAcl:trademark'], function(){
        Route::get('','Admin\AdminTrademarkController@index')->name('admin.trademark.index');
        Route::get('create','Admin\AdminTrademarkController@create')->name('admin.trademark.create');
        Route::post('createe','Admin\AdminTrademarkController@store');

        Route::get('update/{id}','Admin\AdminTrademarkController@edit')->name('admin.trademark.update');
        Route::post('update/{id}','Admin\AdminTrademarkController@update');
        Route::get('hot/{id}','Admin\AdminTrademarkController@hot')->name('admin.trademark.hot');
        Route::get('active/{id}','Admin\AdminTrademarkController@active')->name('admin.trademark.active');
        
        Route::get('delete/{id}','Admin\AdminTrademarkController@delete')->name('admin.trademark.delete');
    });

    Route::group(['prefix' => 'event','middleware'=>'checkAcl:event'], function(){
        Route::get('','Admin\AdminEventController@index')->name('admin.event.index');
        Route::get('create','Admin\AdminEventController@create')->name('admin.event.create');
        Route::post('createe','Admin\AdminEventController@store');

        Route::get('update/{id}','Admin\AdminEventController@edit')->name('admin.event.update');
        Route::post('update/{id}','Admin\AdminEventController@update');
        Route::get('hot/{id}','Admin\AdminEventController@hot')->name('admin.event.hot');
        Route::get('active/{id}','Admin\AdminEventController@active')->name('admin.event.active');
        Route::get('hot/{id}','Admin\AdminEventController@hot')->name('admin.event.hot');
        Route::get('delete/{id}','Admin\AdminEventController@delete')->name('admin.event.delete');
    });
    Route::group(['prefix' => 'slide','middleware'=>'checkAcl:slide'], function(){
        Route::get('','Admin\AdminSlideController@index')->name('admin.slide.index');
        Route::get('create','Admin\AdminSlideController@create')->name('admin.slide.create');
        Route::post('createe','Admin\AdminSlideController@store');
        Route::get('hot/{id}','Admin\AdminSlideController@hot')->name('admin.slide.hot');
        Route::get('active/{id}','Admin\AdminSlideController@active')->name('admin.slide.active');

        Route::get('update/{id}','Admin\AdminSlideController@edit')->name('admin.slide.update');
        Route::post('update/{id}','Admin\AdminSlideController@update');
        
       
        Route::get('delete/{id}','Admin\AdminSlideController@delete')->name('admin.slide.delete');
    });
});

//  FRONT END
Route::group(['prefix'=>'frontend'], function(){
    
    Route::get('home','Frontend\FrontendHomeController@index')->name('frontend.home.index');
    Route::get('san-pham','Frontend\FrontendProductController@index')->name('frontend.product.index');
    Route::get('danh-muc-san-pham/{slug}.html','Frontend\FrontendProductController@productCate')->name('frontend.product.category');
    Route::get('danh-muc-san-pham-search/{slug}.html','Frontend\FrontendProductController@productCateSearch')->name('frontend.product.cate_search');
    Route::get('san-pham/{slug}.html','Frontend\FrontendDetailController@index')->name('frontend.detail.index');
    Route::get('san-pham/{slug}/danh-gia.html','Frontend\FrontendDetailController@getRating')->name('frontend.detail.rating');
    Route::get('bai-viet','Frontend\BlogController@index')->name('frontend.blog.index');
    Route::get('bai-viet/{slug}.html','Frontend\ArticleDetailController@index')->name('frontend.blog_detail.index');
    Route::get('thuong-hieu/{slug}.html','Frontend\FrontendTrademarkController@index')->name('frontend.thuong-hieu.index');
    Route::group(['prefix'=>'account'], function(){
    
        Route::get('register','Account\RegisterController@index')->name('frontend.account.register.index');
        Route::post('register','Account\RegisterController@create');
        Route::get('login','Account\RegisterController@Login')->name('frontend.account.login.index');
        Route::post('login','Account\RegisterController@PostLogin');
        Route::get('logout','Account\RegisterController@Logout')->name('frontend.account.logout.index');

        Route::get('reset-password','Account\ResetPasswordController@index')->name('frontend.account.reset_password.index');
        Route::post('reset-password','Account\ResetPasswordController@checkEmailResetPassword');
        Route::get('new-password','Account\ResetPasswordController@newPassword')->name('get.new_password');
        Route::post('new-password','Account\ResetPasswordController@savePassword');
    
    });

    Route::group(['prefix'=>'user'], function(){
        Route::get('dashboard', 'Account\DashboardController@index')->name('frontend.account.dashboard');
        Route::get('log_login', 'Account\LoginUserController@index')->name('frontend.account.login');
        Route::get('update-info', 'Account\DashboardController@edit')->name('frontend.account.edit');
        Route::post('update-info/{id}.html', 'Account\DashboardController@update')->name('frontend.account.update');
        Route::get('transaction', 'Account\DashboardController@transaction')->name('frontend.account.transaction');
        Route::post('ajax-favorite/{id}','Account\FavoriteController@addFavorite')->name('ajax_get.user.add_favorite');
        Route::get('favorite', 'Account\FavoriteController@favorite')->name('frontend.account.favorite');
        Route::post('ajax_rating','User\RatingController@ajaxRating')->name('user.ajax_rating');
        Route::post('ajax_comment','User\CommentController@ajaxComment')->name('get_ajax_comment');
        Route::post('ajax_rep_comment','User\CommentController@ajaxRepComment')->name('get_ajax_rep_comment');
        //method route là post mà em gửi ajax là get
        Route::post('ajax_like','User\RatingController@ajaxLike')->name('user.ajax_like');
        
    });


     Route::group(['prefix'=>'article'], function(){
    
        Route::get('','Frontend\FrontendArticleController@index')->name('frontend.article.index');
       
        Route::get('login','Frontend\FrontendArticalController@Login');
       
        Route::get('logout','Frontend\FrontendArticalController@Logout');
    
    });
    // cart
    Route::get('don-hang','Frontend\ShoppingCartController@index')->name('frontend.shopping.index');
    Route::group(['prefix'=>'shopping'], function(){
    
        Route::get('add/{id}.html','Frontend\ShoppingCartController@add')->name('frontend.shopping.add');
        
        Route::get('delete/{id}.html','Frontend\ShoppingCartController@delete')->name('frontend.shopping.delete');
       
        Route::get('update/{id}.html','Frontend\ShoppingCartController@update')->name('frontend.shopping.update');

        Route::post('pay','Frontend\ShoppingCartController@postpay');
        Route::get('update/{id}/{rowId}/{qty}','Frontend\ShoppingCartController@update')->name('frontend.shopping.update');
    
    });
});
//Account

