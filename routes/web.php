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



Route::get('/', 'PagesController@index')->name('index');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/about-us', 'PagesController@aboutus')->name('aboutus');
Route::get('/leadership', 'PagesController@leadership')->name('leadership');

Route::get('/account', 'userController@account')->name('user.account');


Route::get('ContactUsController@index')->name('map');

Route::get('contact-us', 'ContactUsController@contactUS')->name('contact');
Route::post('contact', 'ContactUsController@send')->name('contact.store');




//user route
Route::group(['prefix'=>'/user'], function()
 {
Route::get('/token/{token}', 'VerificationController@verify')->name('user.verification');
Route::get('/dashboard', 'UsersController@dashboard')->name('user.dashboard');
Route::get('/profile', 'UsersController@profile')->name('user.profile');
Route::post('/profile/update', 'UsersController@profileUpdate')->name('user.profile.update');

Route::get('/order/history', 'UsersController@view')->name('user.view');
Route::get('/lastproduct', 'UsersController@lastproduct')->name('user.lastproduct');

Route::post('/account', 'UsersController@accountCreate')->name('user.account.create');

Route::post('/user/delete/{id}','AdminController@delete')->name('admin.user.delete');
 });

 //carts route
Route::group(['prefix'=>'/carts'], function()
{
Route::get('/}', 'CartsController@index')->name('carts');
Route::post('/store', 'CartsController@store')->name('carts.store');
Route::post('/update{id}', 'CartsController@update')->name('carts.update');
Route::post('/delete{id}', 'CartsController@destroy')->name('carts.delete');
Route::post('/checkhout', 'CartsController@checkout')->name('carts.checkouts');
});

//checkouts route
Route::group(['prefix'=>'/checkouts'], function()
{
Route::get('/}', 'CheckoutsController@index')->name('checkouts');
Route::post('/store', 'CheckoutsController@store')->name('user.checkouts.store');
Route::post('/delete', 'CHeckoutsController@destroy')->name('checkout.delete');
});

Route::group(['prefix'=>'/transaction'], function()
{

Route::post('/payment', 'TransactionController@payment');
});


 //products
Route::group(['prefix'=>'/products'], function()
{
   
   Route::get('/', 'ProductController@index')->name('products');

   Route::get('/{slug}', 'ProductController@show')->name('products.show'); 

   Route::get('/new/search', 'PagesController@search')->name('product.search'); 
   
   //category route
   Route::get('/categories', 'CategoriesController@index')->name('categories.index');
   Route::get('/category/{id}', 'CategoriesController@show')->name('categories.show');  
   Route::get('/brand/{id}', 'PagesController@show')->name('brands.show'); 
 
});




//admin route
Route::group(['prefix'=>'admin'], function()
{
   Route::get('/', 'AdminPagesController@index')->name('admin.index');
   Route::get('/profile', 'AdminController@profile')->name('admin.profile');

Route::get('/contact/show/{id}', 'AdminController@showMessege');
Route::post('/contact_reply', 'AdminController@contact_reply')->name('admin.contact_reply');
//admin login controller
Route::get('/login', 'Auth\Admin\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login/submit', 'Auth\Admin\AdminLoginController@adminlogin')->name('admin.login.submit');
Route::post('/logout/submit', 'Auth\Admin\AdminLoginController@logout')->name('admin.logout');
Route::get('admin/search','AdminController@search')->name('admin.search');



//admin Email send
Route::get('/password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/password/resetPost', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');



//admin password reet
Route::get('/password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('/password/reset', 'Auth\Admin\ResetPasswordController@reset')->name('admin.password.reset.post');
 
   //admin product

   Route::get('/product', 'AdminPagesController@manage_products')->name('admin.products'); 

   Route::get('/active_product', 'AdminPagesController@active_product')->name('admin.active.product');

   Route::get('/inactive_product', 'AdminPagesController@inactive_product')->name('admin.inactive.product');  

     

   Route::get('/product/create', 'AdminPagesController@create')->name('admin.product.create'); 

   Route::get('/product/edit/{id}', 'AdminPagesController@product_edit')->name('admin.product.edit'); 
 
   Route::post('/product/create', 'AdminPagesController@store')->name('admin.product.store'); 

   Route::post('/product/delete/{id}', 'AdminPagesController@delete')->name('admin.product.delete');

   Route::post('/product/edit/{id}', 'AdminPagesController@product_update')->name('admin.product.update'); 
   Route::post('/status/{id}', 'AdminPagesController@status')->name('admin.product.status');

   

   //admin manage user controll
Route::get('/manage-users', "AdminController@manageUsers")->name('admin.manage_users');
Route::post('/manage-users/{id}', 'AdminController@changeActiveStatus')->name('admin.user.changeActiveStatus');

Route::get('/users/{id}', 'AdminController@singleUser')->name('user.single');


 //category route 
 
 Route::group(['prefix'=>'/categories'], function()
 {
    
    Route::get('/', 'CategoryController@index')->name('admin.categories'); 
 
    Route::get('/create', 'CategoryController@create')->name('admin.category.create'); 
 
    Route::get('/edit/{id}', 'CategoryController@edit')->name('admin.category.edit'); 
  
    Route::post('/store', 'CategoryController@store')->name('admin.category.store'); 
 
    Route::post('/Category/delete/{id}', 'CategoryController@delete')->name('admin.category.delete');
 
    Route::post('/Category/edit/{id}', 'CategoryController@update')->name('admin.category.update'); 



});





//Orders route 
 
Route::group(['prefix'=>'/orders'], function()
{
   
   Route::get('/', 'OrdersController@index')->name('admin.orders'); 
   Route::post('/delete/{id}', 'OrdersController@delete')->name('admin.order.delete');
   Route::get('/view/{id}', 'OrdersController@show')->name('admin.order.show');
   Route::post('/completed/{id}', 'OrdersController@completed')->name('admin.order.completed');
   Route::post('/paid/{id}', 'OrdersController@paid')->name('admin.order.paid');
   Route::post('/search','OrdersController@search')->name('admin.orders.search');
   Route::post('/search_all','OrdersController@search_all')->name('admin.orders.search_all');

   Route::post('/charge-update/{id}', 'OrdersController@chargeUpdate')->name('admin.order.charge');
   Route::get('/invoice/{id}', 'OrdersController@generateInvoice')->name('admin.order.invoice');

   Route::get('/sales', 'OrdersController@saleOrder')->name('admin.sales');
     Route::get('/allorder', 'OrdersController@allOrderproduct')->name('admin.allorder');



   Route::get('/sales/store', 'OrdersController@salestore')->name('admin.sales.store');


});





//Brands route
Route::group(['prefix'=>'/brands'], function()
 {
    
    Route::get('/', 'BrandController@index')->name('admin.brands'); 
 
    Route::get('/create', 'BrandController@create')->name('admin.brand.create'); 
 
    Route::get('/edit/{id}', 'BrandController@edit')->name('admin.brand.edit'); 
  
    Route::post('/store', 'BrandController@store')->name('admin.brand.store'); 
 
    Route::post('/brand/delete/{id}', 'BrandController@delete')->name('admin.brand.delete');
 
    Route::post('/brand/edit/{id}', 'BrandController@update')->name('admin.brand.update'); 

});



 // Slider Routes
 Route::group(['prefix' => '/sliders'], function(){
   Route::get('/', 'SliderController@index')->name('admin.sliders');
   Route::post('/store', 'SliderController@store')->name('admin.slider.store');
   Route::post('/slider/edit/{id}', 'SliderController@update')->name('admin.slider.update');
   Route::post('/slider/delete/{id}', 'SliderController@delete')->name('admin.slider.delete');
 });


//division route
Route::group(['prefix'=>'/divisions'], function()
 {
    
    Route::get('/', 'DivisionController@index')->name('admin.divisions'); 
 
    Route::get('/create', 'DivisionController@create')->name('admin.division.create'); 
 
    Route::get('/edit/{id}', 'DivisionController@edit')->name('admin.division.edit'); 
  
    Route::post('/store', 'DivisionController@store')->name('admin.division.store'); 
 
    Route::post('/division/delete/{id}', 'DivisionController@delete')->name('admin.division.delete');
 
    Route::post('/division/edit/{id}', 'DivisionController@update')->name('admin.division.update'); 

});

//Notification read/unread
Route::get('maskAsRead',function(){
Auth()->user()->unreadNotifications->markAsRead();
return redirect()->back();
})->name('markRead');

//district route


//Payments route
Route::group(['prefix'=>'/payments'], function()
 {

    Route::get('/', 'PaymentController@index')->name('admin.payments'); 
 
    Route::get('/create', 'PaymentController@create')->name('admin.payment.create'); 
    Route::get('/view_payment', 'PaymentController@view_payment')->name('admin.payment.view_payment'); 
      Route::get('/view_cash', 'PaymentController@view_cash')->name('admin.payment.view_cash'); 
 
 
    Route::get('/edit/{id}', 'PaymentController@edit')->name('admin.payment.edit'); 
  
    Route::post('/store', 'PaymentController@store')->name('admin.payment.store'); 
 
    Route::post('/payment/delete/{id}', 'PaymentController@delete')->name('admin.payment.delete');
 
    Route::post('/payment/edit/{id}', 'PaymentController@update')->name('admin.payment.update'); 

});

Route::get('/user/orderinvoice/{id}','ProductController@viewOrderInvoice')->name('user.invoice');

Route::get('/user/downloadorderinvoice/{id}','ProductController@downloadOrderInvoice')->name('user.invoice.download');
});




Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
