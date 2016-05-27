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
| Please see the user guide for complete details:
|
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

$route['default_controller'] = "c_admin";
$route['404_override'] = '';


/**
 * Backend routes
 */
	
	// login section
	$route['dashboard']					= "c_admin/index"; // halaman dashboard
	$route['panel_login']				= "c_auth/index"; // panel login 
	$route['panel_login/proses']		= "c_auth/proses_auth"; // proses login
	$route['panel_login/berhasil']   	= "c_auth/auth_success"; // proses login berhasil
	$route['logout']					= "c_auth/logout";	


	// admin page
	$route['profil']  						= "c_admin/profil";
	$route['update_profil'] 				= "c_admin/update_profil"; 
	$route['produk']						= "c_admin/produk";
	$route['produk/tambah_data'] 			= "c_admin/tambah_produk";
	$route['produk/tambah_sukses'] 			= "c_admin/produk_add_success";
	$route['produk/edit/(:any)'] 			= "c_admin/edit_produk";
	$route['produk/edit_sukses'] 			= "c_admin/produk_edit_success";
	$route['produk/hapus'] 					= "c_admin/hapus_produk"; 
	$route['produk/detail_blok/(:any)'] 	= "c_admin/popup_blok";
	$route['blok_rumah']					= "c_admin/blok_rumah";
	$route['blok_rumah/tambah_data']		= "c_admin/tambah_blok";
	$route['blok_rumah/tambah_sukses'] 		= "c_admin/blok_rumah_add_success";
	$route['blok_rumah/edit/(:any)'] 		= "c_admin/edit_blok";
	$route['blok_rumah/edit_sukses'] 		= "c_admin/blok_rumah_edit_success";
	$route['blok_rumah/hapus']  			= "c_admin/hapus_blok";
	$route['blok_rumah/detail/(:any)'] 		= "c_admin/detail_blok";
	$route['blok_rumah/upload_gambar'] 		= "c_admin/upload_gambar_blok";
	$route['blok_rumah/upload_gambar_sukses/(:any)'] = "c_admin/upload_gambar_success";
	$route['blok_rumah/upload_denah'] 		= "c_admin/upload_denah_blok";
	$route['blok_rumah/upload_denah_sukses/(:any)'] = "c_admin/upload_denah_success";
	$route['spesifikasi'] 					= "c_admin/spesifikasi";
	$route['spesifikasi/tambah_data']		= "c_admin/tambah_spesifikasi";
	$route['spesifikasi/detail/(:any)'] 	= "c_admin/detail_spesifikasi/$1";
	$route['spesifikasi/edit/(:any)']		= "c_admin/edit_spesifikasi";
	$route['spesifikasi/hapus']				= "c_admin/hapus_spesifikasi";
	$route['booking-fee']					= "c_admin/booking_fee";
	$route['booking-fee/tambah_data']		= "c_admin/tambah_booking";
	$route['booking-fee/hapus']				= "c_admin/hapus_booking";
	$route['periode'] 						= "c_admin/periode";
	$route['periode/tambah_data']			= "c_admin/tambah_periode";
	$route['periode/hapus']		 			= "c_admin/hapus_periode";
	$route['event']							= "c_admin/event";
	$route['event/tambah_data']				= "c_admin/tambah_event";
	$route['event/sukses_tambah']	 		= "c_admin/event_add_success";
	$route['event/edit/(:any)'] 			= "c_admin/edit_event";
	$route['event/edit_sukses']				= "c_admin/event_edit_success";
	$route['event/hapus'] 					= "c_admin/hapus_event";
	$route['event/detail/(:any)']		 	= "c_admin/detail_event";
	$route['berita'] 						= "c_admin/berita";
	$route['berita/tambah_data'] 		 	= "c_admin/tambah_berita";
	$route['berita/tambah_sukses'] 			= "c_admin/berita_add_success";
	$route['berita/edit/(:any)'] 			= "c_admin/edit_berita";
	$route['berita/edit_sukses'] 			= "c_admin/berita_edit_success";
	$route['berita/hapus'] 					= "c_admin/hapus_berita";
	$route['berita/detail/(:any)'] 			= "c_admin/detail_berita";
	$route['gallery'] 						= "c_admin/gallery";
	$route['gallery/tambah_data'] 			= "c_admin/tambah_gallery";
	$route['gallery/tambah_sukses'] 		= "c_admin/gallery_add_success";
	$route['gallery/edit/(:any)'] 			= "c_admin/edit_gallery";
	$route['gallery/edit_sukses'] 			= "c_admin/gallery_edit_success";
	$route['gallery/hapus']		 			= "c_admin/hapus_gallery";
	$route['gallery/detail/(:any)'] 		= "c_admin/detail_gallery";
	$route['gallery/tambah_detail/(:any)']	= "c_admin/tambah_detail_gallery"; 	
	$route['detail_gallery/sukses/(:any)'] 	= "c_admin/detail_gallery_add_success";
	$route['detail_gallery/hapus'] 			= "c_admin/hapus_detail_gallery";
	$route['detail_gallery/zoom'] 			= "c_admin/zoom_img_gallery";
	$route['user'] 							= "c_admin/user";
	$route['user/tambah_data']				= "c_admin/tambah_user";
	$route['user/tambah_sukses']			= "c_admin/user_add_success";
	$route['user/hapus']					= "c_admin/hapus_user"; 			
	$route['profil_user'] 				    = "c_admin/edit_profil_user";
	$route['profil_user/edit_sukses'] 		= "c_admin/profil_user_edit_success";
	$route['profil_user/edit_password_sukses'] = "c_admin/profil_user_password_success";
	$route['pemesanan']						= "c_admin/pemesanan";
	$route['pemesanan/detail_konsumen/(:any)'] = "c_admin/detail_konsumen";
	$route['pemesanan/detail_rumah/(:any)'] = "c_admin/detail_rumah";
	$route['pemesanan/hapus']   			= "c_admin/hapus_pemesanan";
	$route['konsumen'] 						= "c_admin/konsumen";
	$route['konsumen/hapus']  			 	= "c_admin/hapus_konsumen";
	$route['pembayaran'] 					= "c_admin/pembayaran";
	$route['pembayaran/konfirmasi']			= "c_admin/konfirmasi_pembayaran";

 

/** End of Backend routes */


/**
 * Frontend routes
 */

	//do something.. 
	


/** End of Frontend routes */

/* End of file routes.php */
/* Location: ./application/config/routes.php */