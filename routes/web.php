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

Route::get('/', 'User\IndexController@index');
Route::post('/loadproducts', 'User\IndexController@load_products')->name('loadproducts');
Route::post('/loadcategories', 'User\IndexController@load_categories')->name('loadcategories');
Route::get('/listproducts', 'Admin\ProductController@listingproducts');
Route::get('/listproducts/{url}', 'Admin\ProductController@categoryproducts');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/* Route::get('/hometest', 'HomeController@showTest')->name('homeTest'); */

Route::prefix('/admin')->namespace('Admin')->group(function () {
    Route::match(['get', 'post'], '/', 'AdminController@login');

    Route::group(['middleware' => ['admin']], function () {
        Route::get('dashboard', 'AdminController@dashboard');
        Route::get('settings', 'AdminController@settings')->name('settings');
        Route::get('logout', 'AdminController@logout');


        Route::post('check-current-password', 'AdminController@checkCurrentPassword');
        Route::post('update_curr_pwd', 'AdminController@updateCurrentPwd');
        Route::match(['get', 'post'], 'update-admin-data', 'AdminController@updateAdminData')->name('updateadmindata');


        Route::get('sections', 'SectionController@sections')->name('sections');
        Route::post('update-section-status', 'SectionController@updateSectionStatus');
        Route::match(['get', 'post'], 'add-edit-section/{id?}', 'SectionController@addEditSection');
        Route::get('delete-section-image/{id}', 'SectionController@deleteSectionImage');

        Route::get('categories', 'CategoryController@categories')->name('categories');
        Route::post('update-category-status', 'CategoryController@updateCategoryStatus');
        Route::match(['get', 'post'], 'add-edit-category/{id?}', 'CategoryController@addEditCategory');
        Route::post('append-categories-level', 'CategoryController@appendCategoryLevel');
        Route::get('delete-category-image/{id}', 'CategoryController@deleteCategoryImage');
        Route::get('delete-category/{id}', 'CategoryController@deleteCategory');

        Route::get('products', 'ProductController@products')->name('products');
        Route::post('update-product-status', 'ProductController@updateProductStatus');
        Route::match(['get', 'post'], 'add-edit-product/{id?}', 'ProductController@addEditProduct');
        Route::get('delete-product-image/{id}', 'ProductController@deleteProductImage');
        Route::get('delete-product/{id}', 'ProductController@deleteProduct');

        //product attributes

        Route::match(['get', 'post'], 'add-edit-attributes/{id}/{proAttrId?}', 'ProductController@addEditProductAttributes');
        Route::get('delete-product-attributes/{id}', 'ProductController@deleteProductAttribute');
    });
});
