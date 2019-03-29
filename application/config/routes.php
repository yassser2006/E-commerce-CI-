<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
About controllers:

1-Adverts-Offers-Payments-Users-Welcome-Requests
are Admin Controllers
views(adverts,offers,payments,users,welcome,requests)
layout(views/layouts)

2-Guests-Login
for guests
views(guests,login)
layout(views/user_layouts)

3-Profiels for users (get user Posts and offers for posts)
4-Profiels_offers for users (get user offers)
5-Profiels_users for users (get user data and edit user data)

(3,4,5) views (profils)
layout(views/user_layouts)


styles for (views/user_layouts) at (styles/resale_style)

*/
//get notification for the header js
$route['checkNotification']='login/check_notification';
$route['account']='profiles_Users/view_account';

$route['comingOffer/(:any)']='profiles_offers/read_coming_offer/$1';
$route['Offer/(:any)']='profiles_offers/read_own_offer/$1';
$route['acceptOffer/(:any)']='profiles_offers/accept_offer/$1';
$route['postOffer/(:any)/(:any)']='profiles_offers/post_offers/$1/$2';
$route['postOffer/(:any)']='profiles_offers/post_offers/$1';
$route['makeOffer']='profiles_offers/make_offer';
$route['allMyOffers/(:any)']='profiles_offers/allMyOffers/$1';
$route['allMyOffers']='profiles_offers/allMyOffers';

$route['editPost/(:any)']='profiles/edit_post/$1';
$route['deletePost/(:any)']='profiles/delete_post/$1';
$route['promotePost/(:any)']='profiles/promote_post/$1';
$route['editPost/(:any)']='profiles/show_post/$1';
$route['doUpdate']='profiles/edit_post';
$route['newPost']='profiles/make_post';
$route['insertPost']='profiles/insert_post';
$route['profile/(:any)']='profiles/index/$1';
$route['profile']='profiles/index';

$route['account']='profiles_users/index';
$route['editAccount']='profiles_users/edit_account';
$route['changePassword']='profiles_users/edit_password';
$route['updateUser']='profiles_users/update_account';
$route['updatePassword']='profiles_users/update_password';

$route['subscriped/(:any)']='profiles/all_my_subscribes/$1';
$route['subscriped']='profiles/all_my_subscribes';

$route['category/(:any)/(:any)']='guests/getCategory/$1/$2';
$route['category/(:any)']='guests/getCategory/$1';
$route['gsearch/(:any)']='guests/search/$1/$2';
$route['gsearch/(:any)/(:any)']='guests/search/$1/$2';
$route['showpost/(:any)']='guests/openPost/$1';
$route['searchposts/(:any)'] = 'guests/search/$1';
$route['searchposts/(:any)/(:any)']='guests/search/$1/$2';
$route['allPosts/(:any)'] = 'guests/getall/$1';
$route['allPosts/(:any)/(:any)']='guests/getall/$1/$2';


$route['offaction/(:any)'] = 'offers/action/$1';
$route['offdel'] = 'offers/delete';
$route['offget'] = 'offers/get_offer';
$route['offers'] = 'offers/index';

$route['reqaction'] = 'requests/action';
$route['sponsorIt']='requests/make_sponsor';
$route['reqdetails'] = 'requests/details';
$route['reqdel'] = 'requests/delete';
$route['reqget'] = 'requests/get_request';
$route['requests'] = 'requests/index';

$route['payshow'] = 'payments/show';
$route['payverify'] = 'payments/verify';
$route['paydel'] = 'payments/delete';
$route['payget'] = 'payments/get_payment';
$route['payments'] = 'payments/index';

$route['adsinsert'] = 'adverts/insert';
$route['adscreate'] = 'adverts/create';
$route['adsupdate'] = 'adverts/update';
$route['adsedit'] = 'adverts/edit';
$route['adsdel'] = 'adverts/delete';
$route['adsget'] = 'adverts/get_ads';
$route['adverts'] = 'adverts/index';

$route['action'] = 'users/action';
$route['userget'] = 'users/get_users';
$route['users'] = 'users/index';

$route['home']= 'welcome';
$route['signin']= 'login/index';
$route['signout']= 'login/log_out';
$route['Register']= 'login/signup';
$route['newUser']= 'login/creat_user';

$route['index'] = 'guests/index';
$route['default_controller'] = 'guests/index';

$route['404_override'] = 'welcome/error_page';
$route['translate_uri_dashes'] = FALSE;
