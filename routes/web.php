<?php

Route::group(['middleware' => 'locale'], function() {
    Route::get('/', 'PageController@index')->name('home');
    Route::get('/product-categories/{slug}', 'PageController@displayProductByCategory')->name('display_product');
    Route::get('/search', 'PageController@searchProduct')->name('search_product');
    Route::get('/simple-product/{slug}', 'PageController@simpleProduct')->name('simple_product');
    Route::get('/comment-product/{product_id}', 'PageController@getCommentProduct')->name('comment_product');
    Route::post('/add-to-cart', 'PageController@addToCart')->name('add_to_cart');
    Route::get('/add-to-cart/{slug}', 'PageController@addToCartDefault')->name('add_to_cart_default');
    Route::get('/shopping-cart', 'PageController@shoppingCart')->name('shopping_cart');
    Route::post('/update-cart', 'PageController@updateCart')->name('update_cart');
    Route::get('/remove-item-cart/{id}', 'PageController@removeItemCart')->name('remove_item_cart');


    Route::group(['middleware' => ['checklogin']], function () {
        Route::get('/purchase-history', 'PageController@purchaseHistory')->name('purchase_history');
        Route::get('/purchase-history-detail/{id}', 'PageController@purchaseHistoryDetail')->name('purchase_history_detail');
        Route::get('/change-password', 'PageController@showFormChangePassword')->name('form_change_password');
        Route::post('/change-password', 'PageController@updatePassword')->name('update_password');
        Route::get('/change-profile', 'PageController@showFormChangeProfile')->name('form_change_profile');
        Route::post('/change-profile', 'PageController@updateProfile')->name('update_profile');
        Route::post('/logout', 'PageController@logout')->name('logout');
    });
    Route::post('/comment-product', 'PageController@storeCommentProduct')->name('store_comment_product');
    Route::post('/comment-blog', 'PageController@storeCommentBlog')->name('store_comment_blog');
    Route::get('/confirmation/{id}', 'PageController@confirmation')->name('confirmation');
    Route::post('/checkout', 'PageController@checkout')->name('checkout');

    Route::get('/blog', 'PageController@post')->name('post');
    Route::get('/blog-search', 'PageController@postSearch')->name('post_search');
    Route::get('/post-categories/{slug}', 'PageController@displayPostByCategory')->name('display_post');
    Route::get('/tag/{slug}', 'PageController@displayPostByTag')->name('tag');
    Route::get('/simple-blog/{slug}', 'PageController@simpleBlog')->name('simple_blog');
    Route::get('/comment-blog/{slug}', 'PageController@getCommentBlog')->name('comment_blog');

    Route::get('/about', 'PageController@about')->name('about');
    Route::get('/contact', 'PageController@contact')->name('contact');
    Route::get('/login', 'PageController@showLoginForm')->name('show_form_login');
    Route::post('/login', 'PageController@login')->name('login');
    Route::get('/register', 'PageController@showRegisterForm')->name('show_form_register');
    Route::post('/register', 'PageController@register')->name('register');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Auth::routes();
});

Route::group([
        'prefix' => 'admin',
        'namespace' => 'Admin',
        'middleware' => 'checkadminlogin',
    ], function () {

    Route::resource('dashboard', 'DashboardController')->only('index');
    Route::get('statistic-revenue', 'DashboardController@statisticRevenueAjax')->name('revenue');
    Route::get('statistic-order', 'DashboardController@statisticOrderAjax')->name('revenue-order');
    Route::get('statistic-user', 'DashboardController@statisticUserAjax')->name('revenue-user');
    Route::get('/products/sales', 'ProductController@getList')->name('products_sales');
    Route::resource('products', 'ProductController');
    Route::resource('product-category', 'ProductCategoryController')->except('show');
    Route::get('/orders/purchase', 'OrderController@getList')->name('order_purchase');
    Route::resource('orders', 'OrderController')->except('create', 'store', 'edit');
    Route::resource('comment-product', 'CommentProductController')->only('index', 'destroy');
    Route::resource('comment-post', 'CommentPostController')->only('index', 'destroy');
    Route::resource('post-category', 'PostCategoryController')->except('show');
    Route::resource('posts', 'PostController')->except('show');
    Route::resource('tags', 'TagController')->except('show');
    Route::resource('users', 'UserController')->except('show');
    Route::resource('banners', 'BannerController')->only('index', 'edit', 'update');
    Route::resource('abouts', 'AboutController')->only('index', 'edit', 'update');
    Route::resource('contacts', 'ContactController')->only('index', 'edit', 'update');
});

Route::get('change-language/{language}', 'PageController@changeLanguage')->name('change_language');
