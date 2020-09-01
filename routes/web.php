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

Auth::routes(['verify' => true]);

// User Auth
Route::get('/logout','UserController@LogOut')->name('logout.user');
Route::post('/user/login', 'Auth\LoginController@user_login')->name('user.login');
Route::get('/my-account/change/password', 'UserController@changePassword')->name('user.change.password');
Route::post('/my-account/update/password', 'UserController@updatePassword')->name('update.password');

//Frontend
Route::get('/', 'PublicController@index')->name('frontent.home');

Route::get('/my-account', 'HomeController@index')->name('myaccount');
Route::get('/my-account/order/{order_id}/view', 'HomeController@orderView')->name('user.order.view');

// Admin Routes
Route::get('/admin/dashboard', 'Admin\AdminController@index')->name('admin.dashboard');
Route::get('/admin/dashboard/logout', 'Admin\AdminController@adminLogOut')->name('admin.logout');
Route::get('/admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin', 'Admin\LoginController@login');
Route::get('/admin/change/password', 'Admin\AdminController@ChangePassword')->name('admin.change.password');
Route::put('/admin/change/password', 'Admin\AdminController@UpdatePassword')->name('admin.update.password');


// Backend Routes
Route::middleware('auth:admin')->namespace('Admin\Category')->group(function (){
    // Category
    Route::get('/admin/categories', 'CategoryController@index')->name('admin.categories');
    Route::post('/admin/categories', 'CategoryController@store')->name('admin.category.store');
    Route::get('/admin/delete/category/{id}', 'CategoryController@destroy')->name('admin.delete.category');
    Route::get('/admin/edit/category/{id}', 'CategoryController@edit')->name('admin.edit.category');
    Route::put('/admin/edit/category/{id}', 'CategoryController@update')->name('admin.category.update');

    // Sub Category
    Route::get('/admin/category/sub-category', 'SubCategoryController@index')->name('subcategory.list');
    Route::post('/admin/category/sub-category', 'SubCategoryController@store')->name('subcategory.store');
    Route::get('/admin/category/edit/sub-category/{id}', 'SubCategoryController@edit')->name('subcategory.edit');
    Route::put('/admin/category/update/sub-category/{id}', 'SubCategoryController@update')->name('subcategory.update');
    Route::get('/admin/category/delete/sub-category/{id}', 'SubCategoryController@destroy')->name('subcategory.delete');


    // Brands
    Route::get('/admin/brands', 'BrandController@index')->name('brands');
    Route::post('/admin/brands', 'BrandController@store')->name('brands.store');
    Route::get('/admin/delete/brand/{id}', 'BrandController@destroy')->name('delete.brand');
    Route::get('/admin/edit/brand/{id}', 'BrandController@edit')->name('edit.brand');
    Route::put('/admin/edit/brand/{id}', 'BrandController@update')->name('update.brand');

    // Coupons
    Route::get('/admin/coupons', 'CouponController@index')->name('coupons.list');
    Route::post('/admin/coupons', 'CouponController@store')->name('coupons.store');
    Route::get('/admin/coupons/edit/{id}', 'CouponController@edit')->name('coupons.edit');
    Route::put('/admin/coupons/edit/{id}', 'CouponController@update')->name('coupons.update');
    Route::get('/admin/delete/coupon/{id}', 'CouponController@destroy')->name('coupons.destroy');

});

Route::middleware('auth:admin')->namespace('Admin')->group(function (){

    // Newsletters
    Route::get('/admin/newsletters/', 'NewletterController@index')->name('admin.newsletter');
    Route::get('/admin/newsletters/{id}', 'NewletterController@destroy')->name('admin.newsletter.delete');

});

// Backend All Products Routes
Route::middleware('auth:admin')->namespace('Admin\Product')->group(function (){

    Route::get('/admin/product/all', 'ProductController@index')->name('admin.product.all');
    Route::get('/admin/product/new', 'ProductController@create')->name('admin.create.product');
    Route::post('/admin/product/store', 'ProductController@store')->name('admin.product.store');
    Route::get('/admin/product/view/{id}', 'ProductController@show')->name('admin.product.show');
    Route::get('/admin/product/edit/{id}', 'ProductController@edit')->name('admin.product.edit');
    Route::put('/admin/product/edit/{id}', 'ProductController@update')->name('admin.product.update');
    Route::get('/admin/product/delete/{id}', 'ProductController@destroy')->name('admin.product.destroy');

    // Product Active Button
    Route::get('/admin/product/active/{id}', 'ProductController@active_product')->name('product.active');
    // Product Inactive Button
    Route::get('/admin/product/inactive/{id}', 'ProductController@inactive_product')->name('product.inactive');
    // Get Subcategory AJAX
    Route::get('/admin/get/subcategory/{category_id}', 'ProductController@getSubcategory')->name('get.subcategories');

});

// Backend Post & Post Category
Route::middleware('auth:admin')->namespace('Admin')->group(function (){

    // Post
    Route::get('/admin/blog/all', 'PostController@index')->name('admin.blog.list');
    Route::get('/admin/blog/post/add', 'PostController@create')->name('admin.post.create');
    Route::post('/admin/blog/post/store', 'PostController@store')->name('admin.post.store');
    Route::get('/admin/blog/post/edit/{id}', 'PostController@edit')->name('admin.post.edit');
    Route::put('/admin/blog/post/edit/{id}', 'PostController@update')->name('admin.post.update');
    Route::get('/admin/blog/post/delete/{id}', 'PostController@destroy')->name('admin.post.destroy');

    // Category
    Route::get('/admin/blog/category/all', 'PostCategoryController@index')->name('admin.blog.category.list');
    Route::post('/admin/blog/category/store', 'PostCategoryController@store')->name('admin.blog.category.store');
    Route::get('/admin/blog/category/edit/{id}', 'PostCategoryController@edit')->name('admin.blog.category.edit');
    Route::put('/admin/blog/category/edit/{id}', 'PostCategoryController@update')->name('admin.blog.category.update');
    Route::get('/admin/blog/category/delete/{id}', 'PostCategoryController@destroy')->name('admin.blog.category.destroy');

    // Order Report Routes
    Route::get('/admin/today/order', 'ReportController@todayReport')->name('today.report');
    Route::get('/admin/today/delivery', 'ReportController@todayDelivery')->name('today.delivery');
    Route::get('/admin/report/this-month', 'ReportController@thisMonth')->name('this.month');
    Route::get('/admin/report/search', 'ReportController@searchReport')->name('search.report');
    Route::post('/admin/report/search/year', 'ReportController@searchByYear')->name('search.by.year');
    Route::post('/admin/report/search/month', 'ReportController@searchByMonth')->name('search.by.month');
    Route::post('/admin/report/search/date', 'ReportController@searchByDate')->name('date.by.search');

    // Admin All Users Routes
    Route::get('admin/users/all', 'AdminRoleController@adminAllUsers')->name('admin.all.users');
    Route::get('admin/create/user', 'AdminRoleController@adminCreateUser')->name('admin.create.user');
    Route::post('admin/create/user/store', 'AdminRoleController@adminUserStore')->name('admin.create.stored');
    Route::get('admin/create/user/edit/{id}', 'AdminRoleController@adminUserEdit')->name('admin.user.edit');
    Route::put('admin/create/user/edit/{id}/update', 'AdminRoleController@adminUserUpdate')->name('admin.user.updates');
    Route::get('admin/create/user/{id}/destroy', 'AdminRoleController@adminUserDestroy')->name('admin.users.destroy');

    // Site Setting
    Route::get('admin/site/setting', 'SitesettingController@siteSetting')->name('admin.site.setting');
    Route::put('admin/site/setting/update', 'SitesettingController@siteSettingUpdate')->name('sitesetting.update');

    // Return Order Routes
    Route::get('admin/order/return/request', 'ReturnOrderController@orderReturnRequests')->name('admin.return.orders');
    Route::get('admin/order/{id}/return/request/approve', 'ReturnOrderController@approveReturnOrder')->name('approve.return.order');
    Route::get('admin/order/return/all', 'ReturnOrderController@returnOrderAll')->name('admin.all.order.return');

});

// Backend Order Routes
Route::middleware('auth:admin')->namespace('Admin\Order')->group(function (){
    Route::get('admin/pending/order/all', 'OrderController@pendingOrder')->name('pending.order');
    Route::get('admin/order/{id}/view', 'OrderController@viewOrder')->name('view.order');
    Route::get('admin/payment/{id}/accept', 'OrderController@PaymentAccept')->name('order.accept');
    Route::get('admin/payment/{id}/cancel', 'OrderController@PaymentCancel')->name('order.cancel');
    Route::get('admin/order/payment/accept/all', 'OrderController@acceptedOrder')->name('payment.accept');
    Route::get('admin/order/processing/all', 'OrderController@processDelivery')->name('process.delivery');
    Route::get('admin/cancel/order/all', 'OrderController@cancelOrder')->name('cancel.order');
    Route::get('admin/order/delivered/all', 'OrderController@deliveredOrder')->name('delivered.order');
    Route::get('admin/order/{id}/process/delivery', 'OrderController@orderProcessDelivery')->name('order.process.delivery');
    Route::get('admin/order/{id}/delivery/success', 'OrderController@orderDeliverySuccess')->name('order.delivery.success');
});

// SEO Setting for Admin Panel
Route::get('admin/seo', 'SeoController@seoSetting')->name('seo.admin');
Route::put('admin/update/seo', 'SeoController@seoUpdate')->name('update.seo');


// ALL FRONTEND ROUTES
Route::namespace('Frontend')->group(function (){

    Route::post('/subcriber', 'NewsletterController@Store')->name('subscriber.store');
//    Route::get('/category', 'NewsletterController@categories')->name('subscriber.store');

});

// Add Wishlist
Route::get('/add/wishlist/{id}', 'WishlistController@addWishlist')->name('add.wishlist');
Route::get('/showwishlist', 'WishlistController@showWishlist')->name('show.wishlist');
Route::get('/my-account/wishlist', 'WishlistController@wishListPage')->name('user.wishlist');
Route::get('/my-account/wishlist/remove/{id}', 'WishlistController@removeWishlist')->name('user.remove.wishlist');

// Add to Cart
Route::get('/addtocart/{id}', 'CartController@AddtoCart')->name('add.cart');
Route::get('/product/cart','CartController@showCart')->name('show.cart');
Route::get('/product/remove/cart/{id}', 'CartController@removeCart')->name('remove.cart');
Route::post('/product/update/cart/','CartController@UpdateCart')->name('update.cart');
Route::get('/view/cart/product/{id}','CartController@ViewCartProduct')->name('view.cart.product');
Route::post('/addtocart/product/insert', 'CartController@addCartInsertProduct')->name('add.cart.insert.product');
Route::get('/checkout', 'CartController@checkOut')->name('user.checkout');
// Payment Route
Route::get('/checkout/payment', 'CartController@paymentMethod')->name('payment.method');
// Single Product page Add To cart
Route::post('/addtocart/singleproduct/{id}', 'CartController@addCartSigleProductPage')->name('single.product.addcart');
// check at to cart testing
Route::get('/checkcart', 'CartController@checkCart')->name('check.cart');
// Count cart Menu
Route::get('/cartcount', 'CartController@countCart')->name('count.cart');

// Payment Process Route
Route::post('/payment/proccess', 'PaymentController@paymentProccess')->name('payment.success');
Route::post('/payment/stripe/success', 'PaymentController@stripePayment')->name('stripe.payment');

// Product Details Page
Route::get('/product/details/{id}/{product_name}', 'ProductController@productDetail')->name('product.details');


// Coupon
Route::post('/checkout/apply/coupon/','CouponController@appplyCouponCheckout')->name('checkout.apply.coupon');
Route::get('/checkout/remove/coupon', 'CouponController@removeCoupon')->name('remove.coupon');

// Multi-Language Routes
Route::get('/language/english', 'LanguageController@englishLanguge')->name('language.english');
Route::get('/language/hindi', 'LanguageController@hindiLanguage')->name('language.hindi');

// Frontend Blog Post Routes
Route::get('blog','PostController@index')->name('blog.post');
Route::get('blog/{id}/post','PostController@show')->name('single.post');

// Category wise products page
Route::get('/category/{id}/product/all','CategorywiseproductController@CategoryProducts')->name('category.products');
// Subcategory wise products Page
Route::get('/subcategory/{id}/product/all', 'SubcategorywiseproductController@SubcategoryProducts')->name('subcategory.products');

// Tracking Order
Route::post('/order/tracking', 'PublicController@orderTracking')->name('order.tracking');

// Customer Return Order Routes
Route::get('/my-account/return/orders', 'ReturnOrderController@viewReturnOrder')->name('customer.return.order');
Route::get('/my-account/return/order/{id}/request', 'ReturnOrderController@returnOrderRequest')->name('return.order.request');

