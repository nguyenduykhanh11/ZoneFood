<?php
use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\BlogController;
use \App\Http\Controllers\AjaxLoginController;
use App\Http\Controllers\AjaxAddProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Order\OrderCkeckOutController;
use App\Http\Controllers\Product\ProductDetailsController;
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

Route::get('/', [Controllers\Controller::class, 'home'])->name('home');
Route::get('/view', [Controllers\Controller::class, 'ForgotPass']);
Route::get('/ok', [Controllers\Controller::class, 'mail_verify']);
Route::get('/sms_view', [Controllers\Controller::class, 'SMS_verify_view'])->name('sms_view');

Route::get('/sms', [Controllers\Controller::class, 'SMS_verify']);

Route::get('/login_view', [Controllers\Controller::class, 'login_view'])->name('login.loginView');
Route::post('/login_pc', [Controllers\Controller::class, 'login_pc'])->name('login.loginPc');

Route::get('/resend', [Controllers\Controller::class, 'ForgotPass'])->name('resend');

Route::get('/logOut', [Controllers\Controller::class, 'logOut']);

Route::get('/register_view',[Controllers\Controller::class, 'register_view']);
Route::post('/register_verify',[Controllers\Controller::class, 'register_verify']);
Route::get('/register_verify_sms_view',[Controllers\Controller::class, 'register_verify_sms_view']);
Route::get('/register_verify_sms',[Controllers\Controller::class, 'register_verify_sms']);
Route::get('/register_pc',[Controllers\Controller::class, 'register_pc']);

Route::get('/mail_verify_register',[Controllers\Controller::class, 'mail_verify_register']);
//Thông tin tk
Route::get('/profile',[Controllers\Controller::class, 'profile']);
Route::post('/updateProfile/{user_id}',[Controllers\Controller::class, 'updateProfile']);


Route::get('/AdminStore',[Controllers\adminController::class, 'AdminStore']);

Route::get('/test/{id}',[Controllers\Controller::class, 'test']);

/*blog*/
Route::get('/blog',[BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{blog}-{slug}',[BlogController::class, 'blogDetail'])->name('blog.blogDetail');

/*ajaxLogin*/
Route::post('/loginn',[AjaxLoginController::class, 'login'])->name('ajax.login');
Route::post('/comment/{blog_id}',[AjaxLoginController::class, 'comment'])->name('ajax.comment');


// Admin Store
Route::get('order_watting',[Controllers\adminController::class, 'order_watting']);
Route::get('order_details/{id}',[Controllers\adminController::class, 'order_details'])->name('Order.orderDetail');
Route::get('order_done',[Controllers\adminController::class, 'order_done']);
Route::get('all_foods',[Controllers\adminController::class, 'all_foods']);
Route::get('blogs',[Controllers\adminController::class, 'blogs']);

// Admin Store, xu lý order
Route::post('/order_watting',[Controllers\adminController::class, 'order_watting_action'])->name('ajax.action');

// Admin CRUD
Route::get('add_food',[Controllers\adminController::class, 'add_food']);
Route::POST('add_food_done',[Controllers\adminController::class, 'add_food_done']);
Route::DELETE('delete_food/{id}',[Controllers\adminController::class, 'delete_food']);
Route::GET('edit_food/{id}',[Controllers\adminController::class, 'edit_food']);
Route::POST('edit_food_done/{id}',[Controllers\adminController::class, 'edit_food_done']);

// resign_store
Route::get('resign_store',[Controllers\Controller::class, 'resign_store']);
Route::POST('reStorePC',[Controllers\Controller::class, 'reStorePC']);


/*ajax addProduct*/
Route::post('/',[AjaxAddProductController::class, 'addProduct'])->name('ajax.addProduct');
Route::post('/AddProduct',[AjaxAddProductController::class, 'actionAddProduct'])->name('ajax.actionAddProduct');

Route::get('/product_Category{id}',[ProductDetailsController::class, 'product_Category'])->name('product.Category');

//productDetails
Route::get('/productDetails/{product}',[ProductDetailsController::class, 'productDetails'])->name('Product.productDetails');

//cart
Route::get('/cart',[CartController::class, 'cart'])->name('cart.productCart');
Route::get('/cartHistory',[CartController::class, 'historyCart'])->name('cart.history');
Route::post('/addCart',[AjaxAddProductController::class, 'addNumCart'])->name('ajax.addNumCart');
Route::post('/deleteProductCart',[AjaxAddProductController::class, 'deleteProductCart'])->name('ajax.deleteProductCart');

//holyMath
Route::get('/checkOut',[OrderCkeckOutController::class, 'checkOut'])->name('order.checkOut');
Route::post('/checkOut',[OrderCkeckOutController::class, 'formCheckOut'])->name('order.formCheckOut');



Route::get('/scrolltest',[Controllers\Controller::class, 'scrolltest']);
Route::get('/chitietsp',[Controllers\Controller::class, 'chitietsp']);
Route::get('/shop',[Controllers\Controller::class, 'shop']);


// Master
Route::get('/MasterHome',[Controllers\MasterAdmin::class, 'MasterHome']);
Route::get('/AllUser',[Controllers\MasterAdmin::class, 'AllUser']);
Route::get('/AllFood',[Controllers\MasterAdmin::class, 'AllFood']);
Route::get('/Master-DeleFood/{id}',[Controllers\MasterAdmin::class, 'MasterDeleFood']);

Route::get('/Master-EditFood/{id}',[Controllers\MasterAdmin::class, 'MasterEditFood']);
Route::POST('/Master-EditFoodDone/{id}',[Controllers\MasterAdmin::class, 'MasterEditFoodDone']);

Route::get('/Master-DeleUser/{id}',[Controllers\MasterAdmin::class, 'MasterDeleUser']);

Route::get('/Master-EditUser/{id}',[Controllers\MasterAdmin::class, 'MasterEditUser']);
Route::post('/Master-EditUserDone/{id}',[Controllers\MasterAdmin::class, 'MasterEditUserDone']);

Route::get('/AllCategory',[Controllers\MasterAdmin::class, 'AllCategory']);
Route::get('/Master-AddCategory',[Controllers\MasterAdmin::class, 'MasterAddCategory']);
Route::POST('/Master-AddCategoryDone',[Controllers\MasterAdmin::class, 'MasterAddCategoryDone']);
Route::get('/Master-DeleCategory/{id}',[Controllers\MasterAdmin::class, 'MasterDeleCategory']);
Route::get('/Master-EditCategory/{id}',[Controllers\MasterAdmin::class, 'MasterEditCategory']);
Route::post('/Master-EditCategoryDone/{id}',[Controllers\MasterAdmin::class, 'MasterEditCategoryDone']);