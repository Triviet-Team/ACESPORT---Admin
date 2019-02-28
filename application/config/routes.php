<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = 'lapse/error_404';
$route['translate_uri_dashes'] = FALSE;

#contact

$route['lien-he.html'] = 'contact/index';

#Static page

$route['gioi-thieu.html'] = 'staticpage/index/gioi-thieu';

$route['doi-tac.html'] = 'staticpage/index/doi-tac';

#user
$route['login.html'] = 'user/login';
$route['logout.html'] = 'user/logout';
$route['user/thong-tin-ca-nhan.html'] = 'user/index';
$route['user/doi-mat-khau.html'] = 'user/change_password';
$route['quen-mat-khau.html'] = 'user/forget_password';
$route['dang-ky-tai-khoan.html'] = 'user/registration';
$route['user/thong-ke-giai-dau.html'] = 'user/thong_ke';
$route['xem-thong-bao.html'] = 'user/ajax_notification';

#Bảng điểm
$route['chi-tiet-thanh-vien-(:num).html'] = 'table_point/user/$1';
$route['bang-diem.html'] = 'table_point/table';
$route['bang-diem/(:any)'] = 'table_point/table/$1';

#News
$route['tin-tuc.html'] = 'articles/index/tin-tuc';

$route['tin-tuc/page/(:num)'] = 'articles/index/tin-tuc/$1';

$route['tin-tuc/(:any).html'] = 'articles/detail/$1';

#dự án
$route['du-an.html'] = 'project/index/du-an';

$route['du-an/page/(:num)'] = 'project/index/du-an/$1';

$route['du-an/(:any).html'] = 'project/detail/$1';

#dự án
$route['tu-van.html'] = 'project/index/tu-van';

$route['tu-van/page/(:num)'] = 'project/index/tu-van/$1';

$route['tu-van/(:any).html'] = 'project/detail/$1';

#Service
$route['dich-vu.html'] = 'service/index/dich-vu';

$route['dich-vu/page/(:num)'] = 'service/index/dich-vu/$1';

$route['dich-vu/(:any).html'] = 'service/detail/$1';

#Giải đấu

 $route['giai-dau.html'] = 'tournament/index';

 $route['giai-dau/page/(:num)'] = 'tournament/index/$1';

//  $route['danh-muc/(:any).html'] = 'product/category/$1';

//  $route['danh-muc/(:any)/page/(:num)'] = 'product/category/$1';

//  $route['danh-muc/(:any)/(:any).html'] = 'product/category/$2';

//  $route['danh-muc/(:any)/(:any)/page/(:num)'] = 'product/category/$2';

 $route['chi-tiet-giai-dau/(:any).html'] = 'tournament/detail/$1';
 $route['chi-tiet-giai-dau/(:any)/(:any)'] = 'tournament/detail/$1/$2'; 
 $route['chi-tiet-giai-dau/(:any)/(:any)/page/(:num)'] = 'tournament/detail/$1/$2/$3';
 $route['xem-nhanh-dau/(:any)/(:any)'] = 'tournament/nhanh_dau/$1/$2'; 


#User
$route['dang-ky.html'] = 'users/signup';

$route['dang-nhap.html'] = 'users/signin';

$route['dang-xuat.html'] = 'users/signout';

/* * ************************ */

#Sitemap
$route['sitemap.xml'] = 'sitemap/index';

#Review url Admin 
#Note: not set

$route['admincp/tournament/tournament_category/(:num)'] = 'admincp/tournament/tournament_category/index/';

$route['admincp/tournament/tournament/(:num)'] = 'admincp/tournament/tournament/index/';

$route['admincp/tournament/playing_category/(:num)'] = 'admincp/tournament/playing_category/index/';

$route['admincp/product_category/(:num)'] = 'admincp/product_category/index/';

$route['admincp/product/(:num)'] = 'admincp/product/index/';

$route['admincp/admin/user/(:num)'] = 'admincp/admin/user/$1';

$route['admincp/staticpage/(:num)'] = 'admincp/staticpage/index';

$route['admincp/articles/(:num)'] = 'admincp/articles/index/';

$route['admincp/contact/(:num)'] = 'admincp/contact/index/';

$route['admincp/province/(:num)'] = 'admincp/province/index/';

$route['admincp/emailregister/(:num)'] = 'admincp/emailregister/index/';

$route['admincp/manager/(:num)'] = 'admincp/manager_link_web/index/';
$route['admincp/manager'] = 'admincp/manager_link_web/index/';

$route['admincp/ads/(:num)'] = 'admincp/ads/index/';
