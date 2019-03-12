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


/*nir test rough*/

use Illuminate\Support\Facades\Route;


//Route::get('testforurl','PersonalInfoController@test_get_method')->name("test_get_method");
Route::get('testforurl', 'ProductController@getPath')->name("getPath");


Route::get('/test', 'QueryController@test_rough');

Route::get('/test2', function () {
    echo substr("Hello world", 0, 30);


});
//Route::get('/inbox/{id}', 'MessageController@singleMessage_test');

/*nir test rough*/




Route::post('/find', 'IndexController@open')->name('find');

Route::post('/event-coordinator', 'MailController@postContact');

// Route::post('/save','IndexController@savePhone')->name('savePhone');

Route::post('/save-phn', 'IndexController@onlyphn')->name('login.save');


Route::get('login/{service}', 'Auth\LoginController@redirectToProvider_all');
Route::get('login/{service}/callback', 'Auth\LoginController@handleProviderCallback_all');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');


Route::get('/how-it-works', function () {
    return view('pages.how-it-works');
});

Route::get('/partners', function () {
    return view('pages.partner');
})->name('partners');
Route::post('/partners', 'IndexController@savePartner')->name('savePartner');

// Route::get('/our-services', function(){
//   return view('pages.our-services');
// });
// Route::get('/our-services','OurServices@show')->name('our-service');

Route::get('/services/{catagory}', 'OurServices@CatProducts')->name('CatProducts');
Route::get('/services/{catagory}/{product}', 'OurServices@Services')->name('Services');

Route::get('/vendors/{catagory}', 'VendorServices@Services')->name('Vendors');
Route::get('/vendors/{catagory}/{vendor}', 'VendorServices@vendor')->name('single-vendor');

/*all vendors*/
Route::get('/all_vendors', 'VendorServices@all_vendors')->name('all_vendors');

// Route::get('/vendors/{catagory}/{vendor}','VendorServices@getAddToQuery')->name('query-vendor');

Route::get('/event-coordinator', function () {
    return view('pages.event-coordinator');
});

// Route::get('/vendors/{catagory}/{vendor}','VendorServices@getAddToQuery')->name('query-vendor');

Route::get('/event-coordinator', function () {
    return view('pages.event-coordinator');
});


Route::get('/about-us', function () {
    return view('pages.about-us');
});

//Route::get('/query-cart', function(){ return view('pages.query-cart'); });

Route::get('/terms-condition', function () {
    return view('pages.terms-condition');
})->name('terms-condition');

Route::get('/privacy', function () {
    return view('pages.privacy');
})->name('privacy');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/my-account', function () {
        return view('user.my-account');
    })->name('my-account');

    // Route::get('/query-cart', 'QueryController@index')->name('my-query-cart');
    // Route::delete('/query-cart/{id}', 'QueryController@destroy')->name('query-delete');

    Route::get('/query-cart/sendquery', 'QueryController@send')->name('send-query');

    Route::post('/query-send/{id}/{item}', 'MailController@queryMail')->name('query-send');

    Route::get('/confirm-query', 'QueryController@show')->name('confirm-query');
    Route::post('/confirm-query/{id}', 'QueryController@confirmOne')->name('confirm-query-id');
    Route::post('/query-delete/{id}', 'QueryController@deleteOne')->name('query-delete');
    Route::post('/delete-all/{id}', 'QueryController@deleteAll')->name('clear-query');

    //Route::get('/cart', function(){ return view('user.cart'); })->name('my-cart');

    // Route::get('/wishlist', function(){ return view('user.wishlist'); })->name('my-wishlist');

    Route::post('/vendors/{catagory}/{vendor}', 'VendorServices@vendorQuery');
    Route::post('/services/{catagory}/{product}', 'OurServices@product');

    // Route::get('/checkout', 'CheckoutController@show')->name('check1');
    // Route::post('/checkout', 'CheckoutController@address')->name('check2');
    //
    // Route::get('/shipping', 'CheckoutController@shippingShow')->name('shipping');
    // Route::post('/shipping', 'CheckoutController@shippingAdd')->name('shippingAdd');
    //
    //Route::get('/payment-method', 'CheckoutController@paymentShow')->name('payment-method');
    //Route::post('/payment-method', 'CheckoutController@paymentAdd')->name('paymentAdd');

    /*Payments code*/
    //Route::get('/payment-method', 'CheckoutController@paymentShow')->name('payment-method');
    Route::post('/payment-method', 'CheckoutController@paymentShow')->name('payment-method');
    Route::post('/payment-method/bkash', 'CheckoutController@paymentAdd')->name('paymentAdd');

    // SSLCOMMERZ Start
    Route::POST('/pay', 'PublicSslCommerzPaymentController@index')->name('sslpay');
    Route::POST('/success', 'PublicSslCommerzPaymentController@success');
    Route::POST('/fail', 'PublicSslCommerzPaymentController@fail');
    Route::POST('/cancel', 'PublicSslCommerzPaymentController@cancel');
    Route::POST('/ipn', 'PublicSslCommerzPaymentController@ipn');
    //SSLCOMMERZ END
    Route::POST('/success-checkout', 'CheckoutController@paidOnline')->name('checkout');

    Route::get('/payment/success/','OrderController@paySuccess')->name('paySuccess');
    Route::get('/payment/fail/','OrderController@payFail');
    Route::get('/payment/cancel/','OrderController@payCancel');
    /*End of  Payments code*/

    Route::resource('/wishlist', 'WishlistController', ['except' => ['create', 'edit', 'show', 'update']]);

    // Route::resource('/address', 'AddressController');

    Route::resource('/personal-info', 'PersonalInfoController', ['except' => ['index', 'show', 'destroy', 'create', 'store']]);

    // Route::resource('/cart', 'CartController');

    Route::get('/order', 'MailController@orderMail')->name('confirm-purchase');
    Route::get('/order/{user}', 'OrderController@ClientOrder')->name('client-orderlist');

    Route::get('/inbox', 'MessageController@myMessage')->name('User.Message');
    Route::get('/inbox/{id}', 'MessageController@singleMessage')->name('User.SingleMess');

    /*
   * Nir Edit for user inbox
   * */

    Route::post('/inbox/sendMessage', 'MessageController@sendMessage')->name('User.SendMessage');

    /* End of
     * Nir Edit for user inbox
     * */

    // Route::get('/add-address', function(){ return view('user.add-address'); })->name('add-address');


    // Planning Tools "My Checklist"
    Route::get('/my-checklist/{id}', 'ChecklistController@show')->name('mychecklist');
    Route::post('/my-checklist/addNewSection', 'ChecklistController@addNew')->name('addNew');
    Route::post('/my-checklist/deleteChecklist/{id}', 'ChecklistController@deleteChecklist')->name('deleteChecklist');
    Route::post('/my-checklist/checkChecklist/', 'ChecklistController@checkChecklist')->name('checkChecklist');
    // Planing Tools "My Checklist" Ends

    // Planning Tools "My Vendor"
    Route::get('/my-vendors/{id}', 'OrderController@myvendors')->name('myvendors');
    Route::post('my-vendors/create', 'OrderController@createMyVendor')->name('createMyVendor');
    Route::post('my-vendors/update', 'OrderController@updateMyVendors')->name('updateMyVendor');
    Route::post('my-vendors/delete/{id}', 'OrderController@deleteMyVendor')->name('deleteMyVendor');
    Route::post('my-vendors/deleteall/{id}', 'OrderController@deleteall')->name('deleteall');
    // Planning Tools "My Vendor" Ends

    // Planning Tools "Budget Manager"
    Route::get('/my-budget', 'HomeController@show')->name('mybudget');
    Route::post('/addbudget', 'HomeController@addBudget')->name('addbudget');
    Route::post('/updatebudget', 'HomeController@updateBudget')->name('updateBudget');
    // Planning Tools "Budget Manager" Ends

    Route::get('/payment', 'OrderController@payment')->name('payment');
    Route::post('/payonline/{id}', 'OrderController@payonline')->name('payonline');

    Route::post('/temp/{id}', 'OrderController@tempDel')->name('temp-delete');
    Route::post('/del-payment/{id}', 'OrderController@paymentDel')->name('delete-payment');
    Route::post('/manual-payment/{id}', 'OrderController@manualPayment')->name('manual-payment');

    // Rating & Review
    Route::post('/rating', 'VendorServices@rating')->name('rating');

});

Route::group(['middleware' => ['auth:admin']], function () {

    Route::get('/', function () {
        return view('admin.index');
    })->name('mainhome');

    Route::get('/admin', function () {
        return view('admin.index');
    })->name('adminhome');

    Route::get('admin/das', function () {
        return view('admin.dashboard');
    })->name('admindash');


    Route::get('/admin/users', 'AdminUsers@showPage')->name('userList');
    Route::get('/admin/add-user', 'AdminUsers@addNewUser')->name('addNewUser');
    Route::post('/admin/add-user-submit', 'AdminUsers@addNewUserSubmit')->name('addNewUserSubmit');

    Route::get('/admin/vdo-categories', 'AdminUsers@showVideoCategories')->name('videoCategories');
    Route::get('/admin/add-vdocategory', 'AdminUsers@addNewCategory')->name('addNewCategory');
    Route::post('/admin/add-dvocategory-submit', 'AdminUsers@addCategorySubmit')->name('addCategorySubmit');
    Route::get('/admin/delete-vdocategory/{id}', 'AdminUsers@deleteVideoCategory')->name('deleteVideoCategory');
    Route::get('/admin/edit-vdocategory/{id}', 'AdminUsers@editVideoCategory')->name('editVideoCategory');
    Route::post('/admin/edit-vdocategorysubmit/{id}', 'AdminUsers@editVideoCategorySubmit')->name('editVideoCategorySubmit');




    Route::get('/admin/client', 'ClientController@show')->name('client');
    Route::get('/admin/client/{id}', 'ClientController@showsingle')->name('specific-client');

    Route::get('/admin/order', 'OrderController@show')->name('order');
    Route::get('/admin/order/{userid}', 'OrderController@showsingle')->name('specific-order');

    Route::post('/admin/order/{id}/{user}', 'OrderController@UpdatePayment')->name('payment-update');

    Route::Post('/admin/status/{id}/{user}', 'OrderController@UpdateStatus')->name('order-update');

    Route::get('/admin/query', 'QueryController@adminlist')->name('query');
    Route::get('/admin/query/{user}', 'QueryController@adminlistdetails')->name('query-details');

    Route::post('/admin/query/{id}', 'QueryController@UpdateStatus')->name('query-update');
    Route::post('/admin/query/status/{id}/{user}', 'QueryController@NoStatus')->name('no-update');

    Route::get('/admin/message', 'MessageController@index')->name('mess');
    Route::get('/admin/message/{id}', 'MessageController@show')->name('mess-single');
    Route::get('/admin/message_delete/{id}', 'MessageController@message_delete')->name('mess-single-delete');

    /*Nir-edit for be our partners */
    Route::get('/admin/partners', 'MessageController@part_index')->name('ad_partners');
    Route::get('/admin/partner/{id}', 'MessageController@part_show')->name('partner-single');
    Route::get('/admin/partner_delete/{id}', 'MessageController@part_message_delete')->name('partner-single-delete');
    /*End Of Nir-edit for be our partners */

    Route::resource('/admin/service', 'ProductController');
    Route::get('/admin/services/{category}', 'ProductController@index2')->name('product.categories');
    Route::post('/admin/service/suspend/{id}', 'ProductController@suspend')->name('service.suspend');
    Route::post('/admin/service/active/{id}', 'ProductController@active')->name('service.active');

    Route::resource('admin/vendors', 'VendorAdmin');
    Route::get('admin/vendor/{category}', 'VendorAdmin@index2')->name('vendor.categories');

    Route::post('/admin/vendors/suspend/{id}', 'VendorAdmin@suspend')->name('vendors.suspend');
    Route::post('/admin/vendors/active/{id}', 'VendorAdmin@active')->name('vendors.active');


    Route::get('/admin/vendor/packages', 'VendorAdmin@packages')->name('vendor-packages');
    Route::get('/admin/vendor/packages/{id}', 'VendorAdmin@getpackages')->name('vendor.getPack');
    Route::post('/admin/vendor/packages/delete/{id}', 'VendorAdmin@delPackage')->name('vendor.deletePack');
    Route::post('/admin/vendor/packages/add/{id}', 'VendorAdmin@addPackage')->name('vendor.addPack');


    /**Gallery Routes**/
    Route::get('/admin/vendor/galleries/{id}', 'VendorAdmin@getGalleries')->name('vendor.getGalleries');
    Route::post('/admin/vendor/galleries/add/{id}', 'VendorAdmin@addGalleries')->name('vendor.addGalleries');
    Route::post('/admin/vendor/galleries/delete/{id}', 'VendorAdmin@deleteGall')->name('vendor.deleteGall');


    Route::get('/confirm-list', 'OrderController@confirmList')->name('confirm');
    Route::get('/admin/confirm/{user}', 'OrderController@confirmSingle')->name('confirm-details');

    Route::post('/admin/query/sendmail/{user}', 'MailController@Notify')->name('notify-client');

    Route::get('/admin/invoice/{id}', 'OrderController@invoice')->name('invoice');

    /*nir-edit for admin inbox */
    Route::get('/admin/query_box/{id}', 'QueryBoxController@index');

    Route::get('/query_inbox/{id}', 'QueryBoxController@singleMessage');

    Route::post('/query_inbox/sendMessage', 'QueryBoxController@sendMessage')->name('User.SendMessage');


});






