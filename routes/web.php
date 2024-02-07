<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\StoreadminController;
use App\Http\Controllers\factoryadminController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;

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
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');



Route::group([ 'middleware' => ['isSuperAdmin', 'auth']], function () {  
    
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::get('/bxdsdhasdhuia',[SuperadminController::class,'index']);
    Route::get('/svdgsfdy',[SuperadminController::class,'Addstore']);
    Route::get('/superadmin_dashboars',[SuperadminController::class,'dashboards'])->name('superadmin.dashboards');
    Route::post('/store_store',[SuperadminController::class,'add_store'])->name('superadmin.store_store');
    Route::post('/store_edit',[SuperadminController::class,'store_edit'])->name('superadmin.store_edit');
    Route::post('/store_delete',[SuperadminController::class,'store_delete'])->name('superadmin.store_delete');
    Route::get('/vdghsfydgf',[SuperadminController::class,'adduser'])->name('superadmin.adduser');
    Route::post('/user_store',[SuperadminController::class,'user_store'])->name('superadmin.user_store');
    Route::post('/user_edit',[SuperadminController::class,'user_edit'])->name('superadmin.user_edit');
    Route::post('/user_delete',[SuperadminController::class,'user_delete'])->name('superadmin.user_delete');
    Route::post('/user_lock',[SuperadminController::class,'user_lock'])->name('superadmin.user_lock');
    Route::post('/change_passowed',[SuperadminController::class,'change_passowed'])->name('superadmin.change_passowed');
});

Route::group(['middleware' => ['isStoreAdmin', 'auth']], function () {
    Route::get('/storeadmin_dashboards',[StoreadminController::class,'dashboards'])->name('storeadmin.dashboards');
    Route::get('/sghdfsgf_vdghsfd',[StoreadminController::class,'index'])->name('storeadmin.index');
    Route::get('/svgh_dghasfd_sdb',[StoreadminController::class,'add_customer'])->name('storeadmin.add_customer');

    Route::get('/dbfjdg_vsdsfd/{customer_id}', [StoreadminController::class, 'measurement_list'])->name('storeadmin.measurement_list');

    Route::get('/asdg_dbvashd_vdgd/{customer_id}', [StoreadminController::class, 'pant_measurement'])->name('storeadmin.pant_measurement');
    Route::get('/pant_measurement_detils_print/{customer_id}', [StoreadminController::class, 'pant_measurement_detils_print'])->name('storeadmin.pant_measurement_detils_print');
    Route::post('/pant_measurement_update/{customer_id}', [StoreadminController::class, 'pant_measurement_update'])->name('storeadmin.pant_measurement_update');
    
    Route::post('/shirt_measurement_update/{customer_id}', [StoreadminController::class, 'shirt_measurement_update'])->name('storeadmin.shirt_measurement_update');
    Route::get('/vdsafd_as8eww_ueywu/{customer_id}',[StoreadminController::class,'shirt_measurement'])->name('storeadmin.shirt_measurement');
    Route::get('/bcdhsgfbjhasgd_svdhgd/{customer_id}',[StoreadminController::class,'shirt_measurement_detils_print'])->name('storeadmin.shirt_measurement_detils_print');
    
    Route::get('/sdgsf_abd_ashau_asdghau/{customer_id}',[StoreadminController::class,'kurta_measurement'])->name('storeadmin.kurta_measurement');
    Route::post('/asbhsg_vhs_sgbd_dfyucsgdf/{customer_id}',[StoreadminController::class,'kurta_measurement_update'])->name('storeadmin.kurta_measurement_update');
    Route::get('/bxcvhdb_vdghf_asbdhs_sbdu/{customer_id}',[StoreadminController::class,'kurta_measurement_details'])->name('storeadmin.kurta_measurement_details');

    Route::get('/bchdgf_sbdjs_sdbshfg/{customer_id}',[StoreadminController::class,'vest_coat'])->name('storeadmin.vest_coat');
    Route::post('/vsdgf_asdghd_bsdghdui/{customer_id}',[StoreadminController::class,'vest_coat_update'])->name('storeadmin.vest_coat_update');
    Route::get('/xvgfs_sdguyd_sdgyusdu/{customer_id}',[StoreadminController::class,'vest_coat_details'])->name('storeadmin.vest_coat_details');

    Route::get('/zxft_dusdy_dvfhsdg/{customer_id}',[StoreadminController::class,'blazer_jodhpuri'])->name('storeadmin.blazer_jodhpuri');
    Route::post('/bfuyefui_gtqweuy_wgeuy/{customer_id}',[StoreadminController::class,'blazer_jodhpuri_update'])->name('storeadmin.blazer_jodhpuri_update');
    Route::get('/cbsjh_rtyt_qwgu/{customer_id}',[StoreadminController::class,'blazer_jodhpuri_details'])->name('storeadmin.blazer_jodhpuri_details');

    Route::get('/vxghaf_asyuas/{customer_id}',[StoreadminController::class,'indo_servani'])->name('storeadmin.indo_servani');
    Route::post('/bsdsh_fwyq_rtyu/{customer_id}',[StoreadminController::class,'indo_servani_update'])->name('storeadmin.indo_servani_update');
    Route::get('/cxf_qtwey_asyuiasy/{customer_id}',[StoreadminController::class,'indo_servani_details'])->name('storeadmin.indo_servani_details');
    
    Route::post('/customer_store',[StoreadminController::class,'customer_store'])->name('storeadmin.customer_store');
    Route::post('/customer_delete',[StoreadminController::class,'customer_delete'])->name('storeadmin.customer_delete');
    Route::post('/customer_edit',[StoreadminController::class,'customer_edit'])->name('storeadmin.customer_edit');


    Route::post('/measurement_add_date',[StoreadminController::class,'measurement_add_date'])->name('storeadmin.measurement_add_date');

    Route::get('/zxbc_dhashatsyu_sdu',[StoreadminController::class,'home'])->name('storeadmin.home');

    Route::get('/vha_ava_auy_',[StoreadminController::class,'add_invoice'])->name('storeadmin.add_invoice');

    Route::post('/view_table',[StoreadminController::class,'view_table'])->name('storeadmin.view_table');

    Route::get('/get_details',[StoreadminController::class,'get_details'])->name('storeadmin.get_details');

    Route::get('/get_orders',[StoreadminController::class,'get_orders'])->name('storeadmin.get_orders');

    Route::get('/bj_shausdh_sbghs_sdyujghad',[StoreadminController::class,'add_invoice_bill'])->name('storeadmin.add_invoice_bill');

    Route::post('/store_new_invoice',[StoreadminController::class,'store_new_invoice'])->name('storeadmin.store_new_invoice');

    Route::post('/shirt_order',[StoreadminController::class,'shirt_order'])->name('storeadmin.shirt_order');
    Route::post('/pant_order',[StoreadminController::class,'pant_order'])->name('storeadmin.pant_order');
    Route::post('/kurta_order',[StoreadminController::class,'kurta_order'])->name('storeadmin.kurta_order');
    Route::post('/vest_order',[StoreadminController::class,'vest_order'])->name('storeadmin.vest_order');
    Route::post('/blazer_order',[StoreadminController::class,'blazer_order'])->name('storeadmin.blazer_order');
    Route::post('/servani_order',[StoreadminController::class,'servani_order'])->name('storeadmin.servani_order');
    Route::post('/other_order',[StoreadminController::class,'other_order'])->name('storeadmin.other_order');

    Route::post('/update_amont',[StoreadminController::class,'update_amont'])->name('storeadmin.update_amont');

    Route::post('/order_item_edit',[StoreadminController::class,'order_item_edit'])->name('storeadmin.order_item_edit');

    Route::post('/order_item_delete',[StoreadminController::class,'order_item_delete'])->name('storeadmin.order_item_delete');
});

Route::group(['middleware' => ['isFactoryAdmin', 'auth']], function () {

    Route::get('/factoryadmin_dashboards',[factoryadminController::class,'dashboards'])->name('factoryadmin.dashboards');
    Route::get('/bcjshdgfhjsgf',[factoryadminController::class,'factory'])->name('factoryadmin.addfactory');
    Route::post('/factory_store',[factoryadminController::class,'factory_store'])->name('factory.factory_store');
    Route::post('/factory_edit',[factoryadminController::class,'factory_edit'])->name('factory.factory_edit');
    Route::post('/factory_delete',[factoryadminController::class,'factory_delete'])->name('factory.factory_delete');

}); 




