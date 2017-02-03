<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/


define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');
//title
define('_title_view','Sản phẩm mới');
define('_title_view_link','san-pham-moi');
define('_title_product_link','san-pham');
//project
define('_title_project','Lĩnh vực công ty');
define('_title_project_home','Tab danh mục lĩnh vực công ty');
define('_title_project_hot','Hot');
define('_title_project_focus','Dự án nổi bật');
define('_title_project_coupon','Khuyến mãi');
define('_title_project_cate_home','Tab danh mục');
define('_title_project_cate_hot','Hiển thị trang chủ (sim)');
define('_title_project_cate_focus','Hiển thị trang chủ ( Truyền Hình + Internet )');

//producttitle
define('_title_product','Sản phẩm');

// product +_category
define('Page_name',		'');
define('_PASSWORD_RESET','123456');
define('_title_product_home','Trang chủ');
define('_title_product_hot','Trang chủ (top 1)');
define('_title_product_focus','Sản phẩm được quan tâm');
define('_title_product_coupon','Khuyến mãi');
define('_title_product_vip','Víp');

define('_title_product_cate_home','Tab danh mục');
define('_title_product_cate_hot','Hiển thị trang chủ (sim)');
define('_title_product_cate_focus','Hiển thị sản phẩm ra trang chủ');

//neww +  news_category
define('_title_news','Tin tức');
define('_title_news_home','Có thể bạn quan tâm');
define('_title_news_hot','Tin tức - sự kiên ');
define('_title_news_focus','Bài viết cột trái');
define('_title_news_coupon','Khuyến mãi');

define('_title_news_cate_home','Trang chủ');
define('_title_news_cate_hot','Trang Tuyển dụng');
define('_title_news_cate_focus','Tab danh mục');

define('_title_pages_home','Trợ giúp mua hàng (top)');
define('_title_pages_hot','Hot');
define('_title_pages_focus','Lĩnh vực công ty ');
//custom
// Nhân viên
define('_title_personnel','Nhân viên');
define('_title_personnel_home','Trang chủ');
define('_title_personnel_focus','Nổi bật');
define('_title_personnel_hot','Hot');

/* End of file constants.php */
/* Location: ./application/config/constants.php */