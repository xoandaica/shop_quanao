<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:|
|	http://codeigniter.com/user_guide/general/routing.html
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home/index/deal-toan-quoc";
$route['404_override'] = '';

/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
$route['vnadmin/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)'] = 'admin/$1/$2';
$route['vnadmin/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)'] = 'admin/$1/$2/$3';
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

$route['vnadmin/login'] = 'admin/admin/login';
$route['vnadmin/logout'] = 'admin/admin/logout';
$route['vnadmin'] = 'admin/home/index';
$route['vnadmin/doi-mat-khau'] = 'admin/admin/admin_change_password';
$route['vnadmin/site_option'] = 'admin/admin/site_option';

//Modules=================================================================
$route['vnadmin/danh-sach-modules'] = 'admin/modules/list';
$route['vnadmin/quan-ly-modules'] = 'admin/modules/modulemanager';
$route['vnadmin/edit-modules/(:num)'] = 'admin/modules/modulemanager/$1';
$route['vnadmin/delete-module/(:num)'] = 'admin/modules/delete/$1';

//phan quyen admin
$route['vnadmin/admin-permission'] = 'admin/admin/admin_permission';
$route['vnadmin/admin-permission-edit/(:num)'] = 'admin/admin/admin_permission/$1';
$route['vnadmin/admin-reset-pass/(:num)'] = 'admin/admin/reset_pass/$1';
$route['vnadmin/admin-permission-delete/(:num)'] = 'admin/admin/delete_acc/$1';


/*Shipping*/
$route['vnadmin/list-shipping'] = 'admin/product/listShipping';
$route['vnadmin/add-shipping'] = 'admin/product/addShipping';
$route['vnadmin/add-shipping/(:num)'] = 'admin/product/addShipping/$1';
$route['vnadmin/delete-shipping/(:num)'] = 'admin/product/deleteShipping/$1';

/*Code sale*/
$route['vnadmin/list-code-sale'] = 'admin/product/listCodeSale';
$route['vnadmin/add-code-sale'] = 'admin/product/addCodeSale';
$route['vnadmin/add-code-sale/(:num)'] = 'admin/product/addCodeSale/$1';
$route['vnadmin/delete-code-sale/(:num)'] = 'admin/product/deleteCodeSale/$1';


//Comments=================================================================
$route['vnadmin/comment/list'] = 'admin/comment/listComment';
$route['vnadmin/comment/list/(:num)'] = 'admin/comment/listComment/$1';
$route['vnadmin/comment/Delete/(:num)'] = 'admin/comment/Delete/$1';


$route['vnadmin/support-online'] = 'admin/support_online/index';
$route['vnadmin/support-online/(:num)'] = 'admin/support_online/index/$1';
$route['vnadmin/support-online/Delete/(:num)'] = 'admin/support_online/Delete/$1';

//================FRONT END=======================================================================================================


/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
$route['home'] = "home/home";
$route['home/(:num)'] = "home/home/$1";
//project-category-alias  - pj + cat_id
$route['([a-zA-Z0-9_-]+)-pj([a-zA-Z0-9_-]+)'] = 'project/project_bycategory/$1/$2';
$route['([a-zA-Z0-9_-]+)-pj([a-zA-Z0-9_-]+)/(:num)'] = 'project/project_bycategory/$1/$2/$3';

//project-category-alias/project-alias    + c + cat_id + p + project_id
$route['([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)-c(:num)pj(:num)'] = 'project/projectdetail/$1/$2/$3/$4';


http://localhost/nuhoangquanjean/quan-au-chan-vay/quan-au-chan-vay-2-c26p24.html
//product-category-alias  + pc + cat_id
$route['([a-zA-Z0-9_-]+)-pc([a-zA-Z0-9_-]+)'] = 'products/pro_bycategory/$1/$2';
$route['([a-zA-Z0-9_-]+)-pc([a-zA-Z0-9_-]+)/(:num)'] = 'products/pro_bycategory/$1/$2/$3';
//orderby
$route['([a-zA-Z0-9_-]+)-ps([a-zA-Z0-9_-]+)-ps'] = 'products/pro_bycategory_p/$1/$2';
$route['([a-zA-Z0-9_-]+)-ps([a-zA-Z0-9_-]+)-ps/(:num)'] = 'products/pro_bycategory_p/$1/$2/$3';

$route['([a-zA-Z0-9_-]+)-pd([a-zA-Z0-9_-]+)-([a-zA-Z0-9_-]+)'] = 'products/pro_bycategory_pd/$1/$2';
$route['([a-zA-Z0-9_-]+)-pd([a-zA-Z0-9_-]+)-([a-zA-Z0-9_-]+)/(:num)'] = 'products/pro_bycategory_pd/$1/$2/$3';

//trademark
$route['([a-zA-Z0-9_-]+)-brand([a-zA-Z0-9_-]+)'] = 'products/trademark_bycategory/$1/$2';
$route['([a-zA-Z0-9_-]+)-brand([a-zA-Z0-9_-]+)/(:num)'] = 'products/trademark_bycategory/$1/$2/$3';

$route['([a-zA-Z0-9_-]+)-ts([a-zA-Z0-9_-]+)-ts'] = 'products/trademark_bycategory_p/$1/$2';
$route['([a-zA-Z0-9_-]+)-ts([a-zA-Z0-9_-]+)-ts/(:num)'] = 'products/trademark_bycategory_p/$1/$2/$3';

$route['([a-zA-Z0-9_-]+)-td([a-zA-Z0-9_-]+)-td'] = 'products/trademark_bycategory_pd/$1/$2';
$route['([a-zA-Z0-9_-]+)-td([a-zA-Z0-9_-]+)-td/(:num)'] = 'products/trademark_bycategory_pd/$1/$2/$3';



// mapping page to show detail of product
//product-category-alias/product-alias    + c + cat_id + p + product_id
$route['([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)-c(:num)p(:num)'] = 'products/productdetail/$1/$2/$3/$4';
$route['([a-zA-Z0-9_-]+)-c(:num)p(:num)'] = 'products/productdetail_like/$1/$2/$3/$4';
//news-category-alias  + nc + cat_id
$route['([a-zA-Z0-9_-]+)-nc([a-zA-Z0-9_-]+)'] = 'news/news_bycat/$1/$2';
$route['([a-zA-Z0-9_-]+)-nc([a-zA-Z0-9_-]+)/(:num)'] = 'news/news_bycat/$1/$2/$3';
//news-category-alias/news-alias    + c + cat_id + p + newsid
$route['([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)-c(:num)n(:num)'] = 'news/news_content/$1/$2/$3/$4';

//page-alias   - pageid
$route['([a-zA-Z0-9_-]+)-pg(:num)'] = 'pages/page_content/$1/$2';
$route['pages-all'] = 'pages/page_bycat';
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
$route[_title_product_link] = 'products/All_product';
$route[_title_product_link.'(:num)'] = 'products/All_product/$1/$2';
$route[_title_view_link] = 'products/product_home';
$route[_title_view_link.'(:num)'] = 'products/product_home/$1/$2';

$route['tin-tuc'] = 'news/All_news';
$route['email-km'] = 'home/add_email';
$route['yeu-cau-bao-gia'] = 'home/add_email';
$route['gio-hang'] = 'shoppingcart/check_out';
$route['xoa-gio-hang/([a-zA-Z0-9_-]+)'] = 'shoppingcart/delete/$1';
$route['unlike/([a-zA-Z0-9_-]+)'] = 'shoppingcart/delete_like/$1';

$route['them-gio-hang/(:num)'] = 'shoppingcart/add_cart/$1';
$route['lien-he'] = 'contact';
$route['tuyen-dung'] = 'home/tuyendung';
$route['contact'] = 'contact';
$route['recruitment'] = 'home/tuyendung';
$route['test'] = 'home/test';
$route['cookie'] = 'home/cookie';

$route['send_contact'] = 'contact/send_contact';
$route['gui-email'] =  'contact/send_emails';
$route['gui-code'] =  'contact/send_code';

    $route['gui-code-view'] =  'contact/send_code_view';
$route['gui-code-view-err'] =  'contact/send_code_view_err';


$route['lien-he-dat-hen'] = 'contact2';
$route['vnadmin/contact/contacts'] = 'admin/contact/contacts';
$route['thong-tin-lien-he'] = 'contact';
$route['gop-y'] = 'comment';

//payment =======================
$route['thanh-toan-dat-hang'] = 'shoppingcart/Payment';


/**User front end**/
$route['dang-nhap'] = 'users_frontend/signin';
$route['dang-xuat'] = 'users_frontend/signout';
$route['doi-mat-khau'] = 'users_frontend/change_pass';
$route['dang-ky'] = 'users_frontend/signup';
$route['dang-ky-thanh-cong'] = 'users_frontend/success_signup';
$route['kick-hoat'] = 'users_frontend/atuto_active_user';
$route['quen-mat-khau'] = 'users_frontend/forgot_pass';
$route['users/check-email'] = 'users_frontend/check_email';
$route['users/check-emails-code'] = 'users_frontend/check_email_code';
$route['users/check-pass'] = 'users_frontend/check_old_pass';

$route['thong-tin-ca-nhan'] = 'users_frontend/acount';
$route['acount-order'] = 'users_frontend/acount_order';
//$route['thong-tin-ca-nhan'] = 'users_frontend/updateProfile';

$route['dat-hang-ngay'] = 'shoppingcart/quickbuy';
$route['tim-kiem'] = 'products/search';
$route['searchcategory'] = 'products/searchcategory';
$route['dat-hang'] = 'shoppingcart/order_payment';
$route['checkout-baokim'] = 'shoppingcart/order_baokim';
$route['baokim_request'] = 'shoppingcart/baokim_request';
$route['baokim_BPN'] = 'shoppingcart/baokim_BPN';

$route['san-pham-yeu-thich'] = 'products/pro_by_like';
$route['san-pham-da-xem'] = 'products/pro_by_priview';
$route['acount-like'] = 'users_frontend/like_products_ac';
//comment
$route['products/getcomments/(:num)/(:num)'] = 'products/productcoments/$1/$2';

//rao vat ====================================================
$route['dang-tin'] = 'raovat/add_raovat';


