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

use App\Admin;
use App\CustomDynamicDataType;
use App\Customer;
use App\Employee;
use App\FrontDesk;
use App\Http\Controllers\Front\FrontController;
use App\Manager;
use App\Role;
use App\WebsitePage;
use App\WebsiteService;
use App\WebsiteSlider;
use App\WJob;
use App\WJobCustomer;
use App\XSettingMax;
use Carbon\Carbon;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Intervention\Image\ImageManagerStatic as Image;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;

$cb = function () {
    return [

        config("app.name"),
        "welcomes",
        "you !!"
    ];
};
// Route::filter('no-cache',function($route, $request, $response){
//     $response->headers->set('Cache-Control','nocache, no-store, max-age=0, must-revalidate');
//     $response->headers->set('Pragma','no-cache');
//     $response->headers->set('Expires','Fri, 01 Jan 1990 00:00:00 GMT');
// });
// $loginArrOG = FrontController::$loginArrOG;

// Route::get('/', 'User\UserController@index')->name('home');
Route::get('/login-form', 'Auth\UserLoginController@showLoginForm')->name('home');

Route::get('/', 'Auth\UserLoginController@showHome')->name('home2');
//Route::get('/', 'Auth\UserLoginController@showLoginForm')->name('home');
Route::post('login.do', "Auth\UserLoginController@login")->name('user.login.submit');

Route::match(['get','post'],'/select-state','User\UserController@selectState')->name('select-state');

Route::get('all-booking','User\UserController@allBooking')->name('all-booking');

Route::prefix('up')->middleware('userAuthenticated')->group(function () {
    Route::get('dashboards', 'User\UserController@dash')->name('user.dashboard.up');
    Route::get('dash', 'User\UserController@dash')->name('user.dashboard');
    Route::get('/list', 'User\UserController@list')->name('user.apply.list');
    Route::get('/booking', 'User\UserController@dash')->name('user.booking');
    Route::post('/booking', 'User\UserController@BookingStore')->name('user.booking.create');
    Route::get('/print', 'User\UserController@printRecpt')->name('user.Recpt.print.up');
    Route::get('/printt', 'User\UserController@printRecptatBookingtm')->name('user.Recpt.printatbooking');
    Route::get('logout', "Auth\UserLoginController@logout")->name('user.logout');
    Route::view('bankselect.php', 'up.bankselect')->name('user.bankselect.php');
    Route::view('UserDetails.php', 'up.UserSelect')->name('user.UserDetails.php');
    Route::post('UserDetails.php', 'User\UserController@getLastReceiptForPrint')->name('user.UserDetails.php.post');
});

Route::prefix('jh')->middleware('userAuthenticated')->group(function () {

    Route::get('/list', 'User\UserController@listjh')->name('user.apply.list.jh');
    Route::get('/booking', 'User\UserController@dashjh')->name('user.booking.jh');
    Route::get('/print', 'User\UserController@printRecptjh')->name('user.Recpt.print.jh');
    Route::get('/printt', 'User\UserController@printRecptatBookingtmjh')->name('user.Recpt.printatbooking.jh');

    Route::post('/booking', 'User\UserController@BookingStorejh')->name('user.booking.create.jh');
    Route::get('dash', 'User\UserController@dashjh')->name('user.dashboard.jh');
    Route::get('logoutjh', "Auth\UserLoginController@logoutjh")->name('user.logout.jh');
    Route::view('bankselect.php', 'jh.bankselect')->name('user.bankselect.php.jh');
    Route::view('UserDetails.php', 'jh.UserSelect')->name('user.UserDetails.php.jh');
    Route::post('UserDetails.php', 'User\UserController@getLastReceiptForPrintjh')->name('user.UserDetails.php.post.jh');

});

Route::prefix('raj')->middleware('userAuthenticated')->group(function () use ($cb) {

    Route::get('/list', 'User\UserController@listraj')->name('user.apply.list.raj');
    Route::get('/booking', 'User\UserController@dashraj')->name('user.booking.raj');
    Route::get('/print', 'User\UserController@printRecptraj')->name('user.Recpt.print.raj');
    Route::get('/printt', 'User\UserController@printRecptatBookingtmraj')->name('user.Recpt.printatbooking.raj');

    Route::post('/booking', 'User\UserController@BookingStoreraj')->name('user.booking.create.raj');

    Route::get('dash', 'User\UserController@dashraj')->name('user.dashboard.raj');
    Route::get('logoutraj', "Auth\UserLoginController@logoutraj")->name('user.logout.raj');
    Route::view('bankselect.php', 'raj.bankselect')->name('user.bankselect.php.raj');
    Route::view('UserDetails.php', 'raj.UserSelect')->name('user.UserDetails.php.raj');
    Route::post('UserDetails.php', 'User\UserController@getLastReceiptForPrintraj')->name('user.UserDetails.php.post.raj');

});

Route::prefix('hp')->middleware('userAuthenticated')->group(function () {

    Route::get('/list', 'User\UserController@listhp')->name('user.apply.list.hp');
    Route::get('/booking', 'User\UserController@dashhp')->name('user.booking.hp');
    Route::get('/print', 'User\UserController@printRecpthp')->name('user.Recpt.print.hp');
    Route::get('/printt', 'User\UserController@printRecptatBookingtmhp')->name('user.Recpt.printatbooking.hp');

    Route::post('/booking', 'User\UserController@BookingStorehp')->name('user.booking.create.hp');

    Route::get('dash', 'User\UserController@dashhp')->name('user.dashboard.hp');
    Route::get('logouthp', "Auth\UserLoginController@logouthp")->name('user.logout.hp');
    Route::view('bankselect.php', 'hp.bankselect')->name('user.bankselect.php.hp');
    Route::view('UserDetails.php', 'hp.UserSelect')->name('user.UserDetails.php.hp');
    Route::post('UserDetails.php', 'User\UserController@getLastReceiptForPrinthp')->name('user.UserDetails.php.post.hp');

});

Route::prefix('ka')->middleware('userAuthenticated')->group(function () {

    Route::get('/list', 'User\UserController@listka')->name('user.apply.list.ka');
    Route::get('/booking', 'User\UserController@dashka')->name('user.booking.ka');
    Route::get('/print', 'User\UserController@printRecptka')->name('user.Recpt.print.ka');
    Route::get('/printt', 'User\UserController@printRecptatBookingtmka')->name('user.Recpt.printatbooking.ka');
    Route::post('/booking', 'User\UserController@BookingStoreka')->name('user.booking.create.ka');
    Route::get('dash', 'User\UserController@dashka')->name('user.dashboard.ka');
    Route::get('logoutka', "Auth\UserLoginController@logoutka")->name('user.logout.ka');
    Route::view('bankselect.php', 'ka.bankselect')->name('user.bankselect.php.ka');
    Route::view('UserDetails.php', 'ka.UserSelect')->name('user.UserDetails.php.ka');
    Route::post('UserDetails.php', 'User\UserController@getLastReceiptForPrintka')->name('user.UserDetails.php.post.ka');

});

Route::prefix('uk')->middleware('userAuthenticated')->group(function () {

    Route::get('/list', 'User\UserController@listuk')->name('user.apply.list.uk');
    Route::get('/booking', 'User\UserController@dashuk')->name('user.booking.uk');
    Route::get('/print', 'User\UserController@printRecptuk')->name('user.Recpt.print.uk');
    Route::get('/printt', 'User\UserController@printRecptatBookingtmuk')->name('user.Recpt.printatbooking.uk');
    Route::post('/booking', 'User\UserController@BookingStoreUk')->name('user.booking.create.uk');

    Route::get('dash', 'User\UserController@dashuk')->name('user.dashboard.uk');
    Route::get('logoutuk', "Auth\UserLoginController@logoutuk")->name('user.logout.uk');
    Route::view('bankselect.php', 'uk.bankselect')->name('user.bankselect.php.uk');
    Route::view('UserDetails.php', 'uk.UserSelect')->name('user.UserDetails.php.uk');
    Route::post('UserDetails.php', 'User\UserController@getLastReceiptForPrintuk')->name('user.UserDetails.php.post.uk');
});


Route::prefix('pb')->middleware('userAuthenticated')->group(function () {

    Route::get('/list', 'User\UserController@listpb')->name('user.apply.list.pb');
    Route::get('/booking', 'User\UserController@dashpb')->name('user.booking.pb');
    Route::get('/print', 'User\UserController@printRecptpb')->name('user.Recpt.print.pb');
    Route::get('/printt', 'User\UserController@printRecptatBookingtmpb')->name('user.Recpt.printatbooking.pb');
    Route::post('/booking', 'User\UserController@BookingStorePB')->name('user.booking.create.pb');
    Route::get('dash', 'User\UserController@dashpb')->name('user.dashboard.pb');
    Route::get('logoutpb', "Auth\UserLoginController@logoutpb")->name('user.logout.pb');
    Route::view('bankselect.php', 'pb.bankselect')->name('user.bankselect.php.pb');
    Route::view('UserDetails.php', 'pb.UserSelect')->name('user.UserDetails.php.pb');
    Route::post('UserDetails.php', 'User\UserController@getLastReceiptForPrintpb')->name('user.UserDetails.php.post.pb');

});

Route::prefix('hr')->middleware('userAuthenticated')->group(function () {

    Route::get('/list', 'User\UserController@listhr')->name('user.apply.list.hr');
    Route::get('/booking', 'User\UserController@dashhr')->name('user.booking.hr');
    Route::get('/print', 'User\UserController@printRecpthr')->name('user.Recpt.print.hr');
    Route::get('/printt', 'User\UserController@printRecptatBookingtmhr')->name('user.Recpt.printatbooking.hr');

    Route::post('/booking', 'User\UserController@BookingStoreHR')->name('user.booking.create.hr');

    Route::get('dash', 'User\UserController@dashhr')->name('user.dashboard.hr');
    Route::get('logouthr', "Auth\UserLoginController@logouthr")->name('user.logout.hr');
    Route::view('bankselect.php', 'hr.bankselect')->name('user.bankselect.php.hr');
    Route::view('UserDetails.php', 'hr.UserSelect')->name('user.UserDetails.php.hr');
    Route::post('UserDetails.php', 'User\UserController@getLastReceiptForPrinthr')->name('user.UserDetails.php.post.hr');

});

Route::prefix('br')->middleware('userAuthenticated')->group(function ()  {

    Route::get('/list', 'User\UserController@listbr')->name('user.apply.list.br');
    Route::get('/booking', 'User\UserController@dashbr')->name('user.booking.br');
    Route::get('/print', 'User\UserController@printRecptbr')->name('user.Recpt.print.br');
    Route::get('/printt', 'User\UserController@printRecptatBookingtmbr')->name('user.Recpt.printatbooking.br');

    Route::post('/booking', 'User\UserController@BookingStoreBR')->name('user.booking.create.br');

    Route::get('dash', 'User\UserController@dashbr')->name('user.dashboard.br');
    Route::get('logoutbr', "Auth\UserLoginController@logoutbr")->name('user.logout.br');
    Route::view('bankselect.php', 'br.bankselect')->name('user.bankselect.php.br');
    Route::view('UserDetails.php', 'br.UserSelect')->name('user.UserDetails.php.br');
    Route::post('UserDetails.php', 'User\UserController@getLastReceiptForPrintbr')->name('user.UserDetails.php.post.br');

});

Route::prefix('gj')->middleware('userAuthenticated')->group(function () {

    Route::get('/list', 'User\UserController@listgj')->name('user.apply.list.gj');
    Route::get('/booking', 'User\UserController@dashgj')->name('user.booking.gj');
    Route::get('/print', 'User\UserController@printRecptgj')->name('user.Recpt.print.gj');
    Route::get('/printt', 'User\UserController@printRecptatBookingtmgj')->name('user.Recpt.printatbooking.gj');

    Route::post('/booking', 'User\UserController@BookingStoreGJ')->name('user.booking.create.gj');

    Route::get('dash', 'User\UserController@dashgj')->name('user.dashboard.gj');
    Route::get('logoutgj', "Auth\UserLoginController@logoutgj")->name('user.logout.gj');
    Route::view('bankselect.php', 'gj.bankselect')->name('user.bankselect.php.gj');
    Route::view('UserDetails.php', 'gj.UserSelect')->name('user.UserDetails.php.gj');
    Route::post('UserDetails.php', 'User\UserController@getLastReceiptForPrintgj')->name('user.UserDetails.php.post.gj');

});

Route::prefix('mh')->middleware('userAuthenticated')->group(function () {

    Route::get('/list', 'User\UserController@listmh')->name('user.apply.list.mh');
    Route::get('/booking', 'User\UserController@dashmh')->name('user.booking.mh');
    Route::get('/print', 'User\UserController@printRecptmh')->name('user.Recpt.print.mh');
    Route::get('/printt', 'User\UserController@printRecptatBookingtmmh')->name('user.Recpt.printatbooking.mh');

    Route::post('/booking', 'User\UserController@BookingStoreMH')->name('user.booking.create.mh');

    Route::get('dash', 'User\UserController@dashmh')->name('user.dashboard.mh');
    Route::get('logoutmh', "Auth\UserLoginController@logoutmh")->name('user.logout.mh');
    Route::view('bankselect.php', 'mh.bankselect')->name('user.bankselect.php.mh');
    Route::view('UserDetails.php', 'mh.UserSelect')->name('user.UserDetails.php.mh');
    Route::post('UserDetails.php', 'User\UserController@getLastReceiptForPrintmh')->name('user.UserDetails.php.post.mh');

});

Route::prefix('mp')->middleware('userAuthenticated')->group(function () {

    Route::match(['get','post'],'/list', 'User\UserController@listmp')->name('user.apply.list.mp');
    Route::get('/booking', 'User\UserController@dashmp')->name('user.booking.mp');
    Route::get('/print', 'User\UserController@printRecptatBookingtmmp')->name('user.Recpt.print.mp');
    Route::get('/printt', 'User\UserController@printRecptatBookingtmmp')->name('user.Recpt.printatbooking.mp');

    Route::post('/booking', 'User\UserController@BookingStoreMP')->name('user.booking.create.mp');

    Route::get('dash', 'User\UserController@dashmp')->name('user.dashboard.mp');
    Route::get('logoutmp', "Auth\UserLoginController@logoutmp")->name('user.logout.mp');
    Route::view('bankselect.php', 'mp.bankselect')->name('user.bankselect.php.mp');
    Route::view('UserDetails.php', 'mp.UserSelect')->name('user.UserDetails.php.mp');
    Route::post('UserDetails.php', 'User\UserController@getLastReceiptForPrintmp')->name('user.UserDetails.php.post.mp');

});

// Odhisha
/*Route::prefix('od')->middleware('userAuthenticated')->group(function () {

    Route::get('/list', 'User\UserController@listod')->name('user.apply.list.od');
    Route::get('/booking', 'User\UserController@dashod')->name('user.booking.od');
    Route::get('/print', 'User\UserController@printRecptod')->name('user.Recpt.print.od');
    Route::get('/printt', 'User\UserController@printRecptatBookingtmod')->name('user.Recpt.printatbooking.od');

    Route::post('/booking', 'User\UserController@BookingStoreOD')->name('user.booking.create.od');

    Route::get('dash', 'User\UserController@dashod')->name('user.dashboard.od');
    Route::get('logoutod', "Auth\UserLoginController@logoutod")->name('user.logout.od');
    Route::view('bankselect.php', 'od.bankselect')->name('user.bankselect.php.od');
    Route::view('UserDetails.php', 'od.UserSelect')->name('user.UserDetails.php.od');
    Route::post('UserDetails.php', 'User\UserController@getLastReceiptForPrintod')->name('user.UserDetails.php.post.od');

});*/

// Tamilnadu

Route::prefix('tm')->middleware('userAuthenticated')->group(function () {

    Route::get('/list', 'User\UserController@listtm')->name('user.apply.list.tm');
    Route::get('/booking', 'User\UserController@dashtm')->name('user.booking.tm');
    Route::get('/print', 'User\UserController@printRecpttm')->name('user.Recpt.print.tm');
    Route::get('/printt', 'User\UserController@printRecptatBookingtmtm')->name('user.Recpt.printatbooking.tm');
    Route::post('/booking', 'User\UserController@BookingStoreTM')->name('user.booking.create.tm');
    Route::get('dash', 'User\UserController@dashtm')->name('user.dashboard.tm');
    Route::get('logouttm', "Auth\UserLoginController@logouttm")->name('user.logout.tm');
    Route::view('bankselect.php', 'tm.bankselect')->name('user.bankselect.php.tm');
    Route::view('UserDetails.php', 'tm.UserSelect')->name('user.UserDetails.php.tm');
    Route::post('UserDetails.php', 'User\UserController@getLastReceiptForPrinttm')->name('user.UserDetails.php.post.tm');

});

// Andhra Perdesh

Route::prefix('ap')->middleware('userAuthenticated')->group(function () {
    
    Route::get('/list', 'User\UserController@listap')->name('user.apply.list.ap');
    Route::get('/booking', 'User\UserController@dashap')->name('user.booking.ap');
    Route::get('/print', 'User\UserController@printRecptap')->name('user.Recpt.print.ap');
    Route::get('/printt', 'User\UserController@printRecptatBookingtmap')->name('user.Recpt.printatbooking.ap');
    Route::post('/booking', 'User\UserController@BookingStoreAP')->name('user.booking.create.ap');
    Route::get('dash', 'User\UserController@dashap')->name('user.dashboard.ap');
    Route::get('logoutap', "Auth\UserLoginController@logoutap")->name('user.logout.ap');
    Route::view('bankselect.php', 'ap.bankselect')->name('user.bankselect.php.ap');
    Route::view('UserDetails.php', 'ap.UserSelect')->name('user.UserDetails.php.ap');
    Route::post('UserDetails.php', 'User\UserController@getLastReceiptForPrintap')->name('user.UserDetails.php.post.ap');

});


// Webst Bangal
Route::prefix('wb')->middleware('userAuthenticated')->group(function () {
    Route::get('/list', 'User\UserController@listwb')->name('user.apply.list.wb');
    Route::get('/booking', 'User\UserController@dashwb')->name('user.booking.wb');
    Route::get('/print', 'User\UserController@printRecptwb')->name('user.Recpt.print.wb');
    Route::get('/printt', 'User\UserController@printRecptatBookingtmwb')->name('user.Recpt.printatbooking.wb');
    Route::post('/booking', 'User\UserController@BookingStoreWB')->name('user.booking.create.wb');
    Route::get('dash', 'User\UserController@dashwb')->name('user.dashboard.wb');
    Route::get('logoutwb', "Auth\UserLoginController@logoutwb")->name('user.logout.wb');
    Route::view('bankselect.php', 'wb.bankselect')->name('user.bankselect.php.wb');
    Route::view('UserDetails.php', 'wb.UserSelect')->name('user.UserDetails.php.wb');
    Route::post('UserDetails.php', 'User\UserController@getLastReceiptForPrintwb')->name('user.UserDetails.php.post.wb');
});

/*Route::domain(getSubdomainHost('up'))->group(function () use ($cb) {
    // Route::get('info', function (Request $r) {
    //     dump(explode(".", parse_url($r->fullUrl(), PHP_URL_HOST))[0]);
    // });

    Route::redirect('/', 'login', 302);
    //Route::get('/list', 'User\UserController@list')->name('user.apply.list');
    //Route::get('/booking', 'User\UserController@dash')->name('user.booking');
    //Route::get('/print', 'User\UserController@printRecpt')->name('user.Recpt.print.up');
    //Route::get('/printt', 'User\UserController@printRecptatBookingtm')->name('user.Recpt.printatbooking');

    // Route::get('/booking/{veh}/qry', 'User\UserController@GetVegDetl')->name('user.booking.getdetails');
   // Route::post('/booking', 'User\UserController@BookingStore')->name('user.booking.create');

    //User ['before'=>'auth','after'=>'no-cache'],
    Route::prefix('/')->group(function () use ($cb) {
        //Route::get('dash', 'User\UserController@dash')->name('user.dashboard');
        Route::get('login', "Auth\UserLoginController@showLoginForm")->name('user.login.up');
        //Route::post('login.do', "Auth\UserLoginController@login")->name('user.login.submit');
        //Route::get('logout', "Auth\UserLoginController@logout")->name('user.logout');
        // Route::get('/signup', "Customer\CustomerSignupController@CustomerSignupView")->name('user.signup');
        // Route::post('/signup', "Customer\CustomerSignupController@CustomerSignupProccessor")->name('user.signup.proceessor');
        // Route::get('/profile', 'Customer\EditProfileContoller@ShowEditProfilePage')->name('user.edit-profile.view');
        // Route::post('/profile/update/basic', 'Customer\EditProfileContoller@UpdateBasic')->name('user.update-profile.basic');
        // Route::post('/profile/update/contact', 'Customer\EditProfileContoller@UpdateContactPassword')->name('user.update-profile.contact-and-password');
        // Route::post('/profile/update/dp', 'Customer\EditProfileContoller@UpdateDP')->name('user.update-profile.dp');
       // Route::view('bankselect.php', 'up.bankselect')->name('user.bankselect.php');
       // Route::view('UserDetails.php', 'up.UserSelect')->name('user.UserDetails.php');
       // Route::post('UserDetails.php', 'User\UserController@getLastReceiptForPrint')->name('user.UserDetails.php.post');
    });
});*/

/*Route::domain(getSubdomainHost('jh'))->group(function () use ($cb) {

    Route::redirect('/', 'login', 302);
    Route::get('/list', 'User\UserController@listjh')->name('user.apply.list.jh');
    Route::get('/booking', 'User\UserController@dashjh')->name('user.booking.jh');
    Route::get('/print', 'User\UserController@printRecptjh')->name('user.Recpt.print.jh');
    Route::get('/printt', 'User\UserController@printRecptatBookingtmjh')->name('user.Recpt.printatbooking.jh');

    // Route::get('/booking/{veh}/qry', 'User\UserController@GetVegDetl')->name('user.booking.getdetails');
    Route::post('/booking', 'User\UserController@BookingStorejh')->name('user.booking.create.jh');

    //User ['before'=>'auth','after'=>'no-cache'],
    Route::prefix('/')->group(function () use ($cb) {
        Route::get('dash', 'User\UserController@dashjh')->name('user.dashboard.jh');
        Route::get('login', "Auth\UserLoginController@showLoginFormjh")->name('user.login.jh');
        Route::post('login.do', "Auth\UserLoginController@loginjh")->name('user.login.submit.jh');
        Route::get('logoutjh', "Auth\UserLoginController@logoutjh")->name('user.logout.jh');
        // Route::get('/signup', "Customer\CustomerSignupController@CustomerSignupView")->name('user.signup');
        // Route::post('/signup', "Customer\CustomerSignupController@CustomerSignupProccessor")->name('user.signup.proceessor');
        // Route::get('/profile', 'Customer\EditProfileContoller@ShowEditProfilePage')->name('user.edit-profile.view');
        // Route::post('/profile/update/basic', 'Customer\EditProfileContoller@UpdateBasic')->name('user.update-profile.basic');
        // Route::post('/profile/update/contact', 'Customer\EditProfileContoller@UpdateContactPassword')->name('user.update-profile.contact-and-password');
        // Route::post('/profile/update/dp', 'Customer\EditProfileContoller@UpdateDP')->name('user.update-profile.dp');
        Route::view('bankselect.php', 'jh.bankselect')->name('user.bankselect.php.jh');
        Route::view('UserDetails.php', 'jh.UserSelect')->name('user.UserDetails.php.jh');
        Route::post('UserDetails.php', 'User\UserController@getLastReceiptForPrintjh')->name('user.UserDetails.php.post.jh');
    });
});*/

/*Route::domain(getSubdomainHost('raj'))->group(function () use ($cb) {

    Route::redirect('/', 'login', 302);
    Route::get('/list', 'User\UserController@listraj')->name('user.apply.list.raj');
    Route::get('/booking', 'User\UserController@dashraj')->name('user.booking.raj');
    Route::get('/print', 'User\UserController@printRecptraj')->name('user.Recpt.print.raj');
    Route::get('/printt', 'User\UserController@printRecptatBookingtmraj')->name('user.Recpt.printatbooking.raj');

    // Route::get('/booking/{veh}/qry', 'User\UserController@GetVegDetl')->name('user.booking.getdetails');
    Route::post('/booking', 'User\UserController@BookingStoreraj')->name('user.booking.create.raj');

    //User ['before'=>'auth','after'=>'no-cache'],
    Route::prefix('/')->group(function () use ($cb) {
        Route::get('dash', 'User\UserController@dashraj')->name('user.dashboard.raj');
        Route::get('login', "Auth\UserLoginController@showLoginFormraj")->name('user.login.raj');
        Route::post('login.do', "Auth\UserLoginController@loginraj")->name('user.login.submit.raj');
        Route::get('logoutraj', "Auth\UserLoginController@logoutraj")->name('user.logout.raj');
        // Route::get('/signup', "Customer\CustomerSignupController@CustomerSignupView")->name('user.signup');
        // Route::post('/signup', "Customer\CustomerSignupController@CustomerSignupProccessor")->name('user.signup.proceessor');
        // Route::get('/profile', 'Customer\EditProfileContoller@ShowEditProfilePage')->name('user.edit-profile.view');
        // Route::post('/profile/update/basic', 'Customer\EditProfileContoller@UpdateBasic')->name('user.update-profile.basic');
        // Route::post('/profile/update/contact', 'Customer\EditProfileContoller@UpdateContactPassword')->name('user.update-profile.contact-and-password');
        // Route::post('/profile/update/dp', 'Customer\EditProfileContoller@UpdateDP')->name('user.update-profile.dp');
        Route::view('bankselect.php', 'raj.bankselect')->name('user.bankselect.php.raj');
        Route::view('UserDetails.php', 'raj.UserSelect')->name('user.UserDetails.php.raj');
        Route::post('UserDetails.php', 'User\UserController@getLastReceiptForPrintraj')->name('user.UserDetails.php.post.raj');
    });
});*/

/*
Route::domain(getSubdomainHost('hp'))->group(function () use ($cb) {

    Route::redirect('/', 'login', 302);
    Route::get('/list', 'User\UserController@listhp')->name('user.apply.list.hp');
    Route::get('/booking', 'User\UserController@dashhp')->name('user.booking.hp');
    Route::get('/print', 'User\UserController@printRecpthp')->name('user.Recpt.print.hp');
    Route::get('/printt', 'User\UserController@printRecptatBookingtmhp')->name('user.Recpt.printatbooking.hp');

    // Route::get('/booking/{veh}/qry', 'User\UserController@GetVegDetl')->name('user.booking.getdetails');
    Route::post('/booking', 'User\UserController@BookingStorehp')->name('user.booking.create.hp');

    //User ['before'=>'auth','after'=>'no-cache'],
    Route::prefix('/')->group(function () use ($cb) {
        Route::get('dash', 'User\UserController@dashhp')->name('user.dashboard.hp');
        Route::get('login', "Auth\UserLoginController@showLoginFormhp")->name('user.login.hp');
        Route::post('login.do', "Auth\UserLoginController@loginhp")->name('user.login.submit.hp');
        Route::get('logouthp', "Auth\UserLoginController@logouthp")->name('user.logout.hp');
        // Route::get('/signup', "Customer\CustomerSignupController@CustomerSignupView")->name('user.signup');
        // Route::post('/signup', "Customer\CustomerSignupController@CustomerSignupProccessor")->name('user.signup.proceessor');
        // Route::get('/profile', 'Customer\EditProfileContoller@ShowEditProfilePage')->name('user.edit-profile.view');
        // Route::post('/profile/update/basic', 'Customer\EditProfileContoller@UpdateBasic')->name('user.update-profile.basic');
        // Route::post('/profile/update/contact', 'Customer\EditProfileContoller@UpdateContactPassword')->name('user.update-profile.contact-and-password');
        // Route::post('/profile/update/dp', 'Customer\EditProfileContoller@UpdateDP')->name('user.update-profile.dp');
        Route::view('bankselect.php', 'hp.bankselect')->name('user.bankselect.php.hp');
        Route::view('UserDetails.php', 'hp.UserSelect')->name('user.UserDetails.php.hp');
        Route::post('UserDetails.php', 'User\UserController@getLastReceiptForPrinthp')->name('user.UserDetails.php.post.hp');
    });
});*/
/*Route::domain(getSubdomainHost('ka'))->group(function () use ($cb) {

    Route::redirect('/', 'login', 302);
    Route::get('/list', 'User\UserController@listka')->name('user.apply.list.ka');
    Route::get('/booking', 'User\UserController@dashka')->name('user.booking.ka');
    Route::get('/print', 'User\UserController@printRecptka')->name('user.Recpt.print.ka');
    Route::get('/printt', 'User\UserController@printRecptatBookingtmka')->name('user.Recpt.printatbooking.ka');

    // Route::get('/booking/{veh}/qry', 'User\UserController@GetVegDetl')->name('user.booking.getdetails');
    Route::post('/booking', 'User\UserController@BookingStoreka')->name('user.booking.create.ka');

    //User ['before'=>'auth','after'=>'no-cache'],
    Route::prefix('/')->group(function () use ($cb) {
        Route::get('dash', 'User\UserController@dashka')->name('user.dashboard.ka');
        Route::get('login', "Auth\UserLoginController@showLoginFormka")->name('user.login.ka');
        Route::post('login.do', "Auth\UserLoginController@loginka")->name('user.login.submit.ka');
        Route::get('logoutka', "Auth\UserLoginController@logoutka")->name('user.logout.ka');
        // Route::get('/signup', "Customer\CustomerSignupController@CustomerSignupView")->name('user.signup');
        // Route::post('/signup', "Customer\CustomerSignupController@CustomerSignupProccessor")->name('user.signup.proceessor');
        // Route::get('/profile', 'Customer\EditProfileContoller@ShowEditProfilePage')->name('user.edit-profile.view');
        // Route::post('/profile/update/basic', 'Customer\EditProfileContoller@UpdateBasic')->name('user.update-profile.basic');
        // Route::post('/profile/update/contact', 'Customer\EditProfileContoller@UpdateContactPassword')->name('user.update-profile.contact-and-password');
        // Route::post('/profile/update/dp', 'Customer\EditProfileContoller@UpdateDP')->name('user.update-profile.dp');
        Route::view('bankselect.php', 'ka.bankselect')->name('user.bankselect.php.ka');
        Route::view('UserDetails.php', 'ka.UserSelect')->name('user.UserDetails.php.ka');
        Route::post('UserDetails.php', 'User\UserController@getLastReceiptForPrintka')->name('user.UserDetails.php.post.ka');
    });
});*/

/*
Route::domain(getSubdomainHost('uk'))->group(function () use ($cb) {

    Route::redirect('/', 'login', 302);
    Route::get('/list', 'User\UserController@listuk')->name('user.apply.list.uk');
    Route::get('/booking', 'User\UserController@dashuk')->name('user.booking.uk');
    Route::get('/print', 'User\UserController@printRecptuk')->name('user.Recpt.print.uk');
    Route::get('/printt', 'User\UserController@printRecptatBookingtmuk')->name('user.Recpt.printatbooking.uk');

    // Route::get('/booking/{veh}/qry', 'User\UserController@GetVegDetl')->name('user.booking.getdetails');
    Route::post('/booking', 'User\UserController@BookingStoreUk')->name('user.booking.create.uk');

    //User ['before'=>'auth','after'=>'no-cache'],
    Route::prefix('/')->group(function () use ($cb) {
        Route::get('dash', 'User\UserController@dashuk')->name('user.dashboard.uk');
        Route::get('login', "Auth\UserLoginController@showLoginFormUK")->name('user.login.uk');
        Route::post('login.do', "Auth\UserLoginController@loginuk")->name('user.login.submit.uk');
        Route::get('logoutuk', "Auth\UserLoginController@logoutuk")->name('user.logout.uk');
        // Route::get('/signup', "Customer\CustomerSignupController@CustomerSignupView")->name('user.signup');
        // Route::post('/signup', "Customer\CustomerSignupController@CustomerSignupProccessor")->name('user.signup.proceessor');
        // Route::get('/profile', 'Customer\EditProfileContoller@ShowEditProfilePage')->name('user.edit-profile.view');
        // Route::post('/profile/update/basic', 'Customer\EditProfileContoller@UpdateBasic')->name('user.update-profile.basic');
        // Route::post('/profile/update/contact', 'Customer\EditProfileContoller@UpdateContactPassword')->name('user.update-profile.contact-and-password');
        // Route::post('/profile/update/dp', 'Customer\EditProfileContoller@UpdateDP')->name('user.update-profile.dp');
        Route::view('bankselect.php', 'uk.bankselect')->name('user.bankselect.php.uk');
        Route::view('UserDetails.php', 'uk.UserSelect')->name('user.UserDetails.php.uk');
        Route::post('UserDetails.php', 'User\UserController@getLastReceiptForPrintuk')->name('user.UserDetails.php.post.uk');
    });
});
*/

/*
Route::domain(getSubdomainHost('pb'))->group(function () use ($cb) {

    Route::redirect('/', 'login', 302);
    Route::get('/list', 'User\UserController@listpb')->name('user.apply.list.pb');
    Route::get('/booking', 'User\UserController@dashpb')->name('user.booking.pb');
    Route::get('/print', 'User\UserController@printRecptpb')->name('user.Recpt.print.pb');
    Route::get('/printt', 'User\UserController@printRecptatBookingtmpb')->name('user.Recpt.printatbooking.pb');

    // Route::get('/booking/{veh}/qry', 'User\UserController@GetVegDetl')->name('user.booking.getdetails');
    Route::post('/booking', 'User\UserController@BookingStorePB')->name('user.booking.create.pb');

    //User ['before'=>'auth','after'=>'no-cache'],
    Route::prefix('/')->group(function () use ($cb) {
        Route::get('dash', 'User\UserController@dashpb')->name('user.dashboard.pb');
        Route::get('login', "Auth\UserLoginController@showLoginFormPB")->name('user.login.pb');
        Route::post('login.do', "Auth\UserLoginController@loginpb")->name('user.login.submit.pb');
        Route::get('logoutpb', "Auth\UserLoginController@logoutpb")->name('user.logout.pb');
        // Route::get('/signup', "Customer\CustomerSignupController@CustomerSignupView")->name('user.signup');
        // Route::post('/signup', "Customer\CustomerSignupController@CustomerSignupProccessor")->name('user.signup.proceessor');
        // Route::get('/profile', 'Customer\EditProfileContoller@ShowEditProfilePage')->name('user.edit-profile.view');
        // Route::post('/profile/update/basic', 'Customer\EditProfileContoller@UpdateBasic')->name('user.update-profile.basic');
        // Route::post('/profile/update/contact', 'Customer\EditProfileContoller@UpdateContactPassword')->name('user.update-profile.contact-and-password');
        // Route::post('/profile/update/dp', 'Customer\EditProfileContoller@UpdateDP')->name('user.update-profile.dp');
        Route::view('bankselect.php', 'pb.bankselect')->name('user.bankselect.php.pb');
        Route::view('UserDetails.php', 'pb.UserSelect')->name('user.UserDetails.php.pb');
        Route::post('UserDetails.php', 'User\UserController@getLastReceiptForPrintpb')->name('user.UserDetails.php.post.pb');
    });
});*/
/*
Route::domain(getSubdomainHost('hr'))->group(function () use ($cb) {

    Route::redirect('/', 'login', 302);
    Route::get('/list', 'User\UserController@listhr')->name('user.apply.list.hr');
    Route::get('/booking', 'User\UserController@dashhr')->name('user.booking.hr');
    Route::get('/print', 'User\UserController@printRecpthr')->name('user.Recpt.print.hr');
    Route::get('/printt', 'User\UserController@printRecptatBookingtmhr')->name('user.Recpt.printatbooking.hr');

    // Route::get('/booking/{veh}/qry', 'User\UserController@GetVegDetl')->name('user.booking.getdetails');
    Route::post('/booking', 'User\UserController@BookingStoreHR')->name('user.booking.create.hr');

    //User ['before'=>'auth','after'=>'no-cache'],
    Route::prefix('/')->group(function () use ($cb) {
        Route::get('dash', 'User\UserController@dashhr')->name('user.dashboard.hr');
        Route::get('login', "Auth\UserLoginController@showLoginFormHR")->name('user.login.hr');
        Route::post('login.do', "Auth\UserLoginController@loginhr")->name('user.login.submit.hr');
        Route::get('logouthr', "Auth\UserLoginController@logouthr")->name('user.logout.hr');
        // Route::get('/signup', "Customer\CustomerSignupController@CustomerSignupView")->name('user.signup');
        // Route::post('/signup', "Customer\CustomerSignupController@CustomerSignupProccessor")->name('user.signup.proceessor');
        // Route::get('/profile', 'Customer\EditProfileContoller@ShowEditProfilePage')->name('user.edit-profile.view');
        // Route::post('/profile/update/basic', 'Customer\EditProfileContoller@UpdateBasic')->name('user.update-profile.basic');
        // Route::post('/profile/update/contact', 'Customer\EditProfileContoller@UpdateContactPassword')->name('user.update-profile.contact-and-password');
        // Route::post('/profile/update/dp', 'Customer\EditProfileContoller@UpdateDP')->name('user.update-profile.dp');
        Route::view('bankselect.php', 'hr.bankselect')->name('user.bankselect.php.hr');
        Route::view('UserDetails.php', 'hr.UserSelect')->name('user.UserDetails.php.hr');
        Route::post('UserDetails.php', 'User\UserController@getLastReceiptForPrinthr')->name('user.UserDetails.php.post.hr');
    });
});*/
/*Route::domain(getSubdomainHost('br'))->group(function () use ($cb) {

    Route::redirect('/', 'login', 302);
    Route::get('/list', 'User\UserController@listbr')->name('user.apply.list.br');
    Route::get('/booking', 'User\UserController@dashbr')->name('user.booking.br');
    Route::get('/print', 'User\UserController@printRecptbr')->name('user.Recpt.print.br');
    Route::get('/printt', 'User\UserController@printRecptatBookingtmbr')->name('user.Recpt.printatbooking.br');

    // Route::get('/booking/{veh}/qry', 'User\UserController@GetVegDetl')->name('user.booking.getdetails');
    Route::post('/booking', 'User\UserController@BookingStoreBR')->name('user.booking.create.br');

    //User ['before'=>'auth','after'=>'no-cache'],
    Route::prefix('/')->group(function () use ($cb) {
        Route::get('dash', 'User\UserController@dashbr')->name('user.dashboard.br');
        Route::get('login', "Auth\UserLoginController@showLoginFormBR")->name('user.login.br');
        Route::post('login.do', "Auth\UserLoginController@loginbr")->name('user.login.submit.br');
        Route::get('logoutbr', "Auth\UserLoginController@logoutbr")->name('user.logout.br');
        // Route::get('/signup', "Customer\CustomerSignupController@CustomerSignupView")->name('user.signup');
        // Route::post('/signup', "Customer\CustomerSignupController@CustomerSignupProccessor")->name('user.signup.proceessor');
        // Route::get('/profile', 'Customer\EditProfileContoller@ShowEditProfilePage')->name('user.edit-profile.view');
        // Route::post('/profile/update/basic', 'Customer\EditProfileContoller@UpdateBasic')->name('user.update-profile.basic');
        // Route::post('/profile/update/contact', 'Customer\EditProfileContoller@UpdateContactPassword')->name('user.update-profile.contact-and-password');
        // Route::post('/profile/update/dp', 'Customer\EditProfileContoller@UpdateDP')->name('user.update-profile.dp');
        Route::view('bankselect.php', 'br.bankselect')->name('user.bankselect.php.br');
        Route::view('UserDetails.php', 'br.UserSelect')->name('user.UserDetails.php.br');
        Route::post('UserDetails.php', 'User\UserController@getLastReceiptForPrintbr')->name('user.UserDetails.php.post.br');
    });
});*/

/*Route::domain(getSubdomainHost('gj'))->group(function () use ($cb) {

    Route::redirect('/', 'login', 302);
    Route::get('/list', 'User\UserController@listgj')->name('user.apply.list.gj');
    Route::get('/booking', 'User\UserController@dashgj')->name('user.booking.gj');
    Route::get('/print', 'User\UserController@printRecptgj')->name('user.Recpt.print.gj');
    Route::get('/printt', 'User\UserController@printRecptatBookingtmgj')->name('user.Recpt.printatbooking.gj');

    // Route::get('/booking/{veh}/qry', 'User\UserController@GetVegDetl')->name('user.booking.getdetails');
    Route::post('/booking', 'User\UserController@BookingStoreGJ')->name('user.booking.create.gj');

    //User ['before'=>'auth','after'=>'no-cache'],
    Route::prefix('/')->group(function () use ($cb) {
        Route::get('dash', 'User\UserController@dashgj')->name('user.dashboard.gj');
        Route::get('login', "Auth\UserLoginController@showLoginFormGJ")->name('user.login.gj');
        Route::post('login.do', "Auth\UserLoginController@logingj")->name('user.login.submit.gj');
        Route::get('logoutgj', "Auth\UserLoginController@logoutgj")->name('user.logout.gj');
        // Route::get('/signup', "Customer\CustomerSignupController@CustomerSignupView")->name('user.signup');
        // Route::post('/signup', "Customer\CustomerSignupController@CustomerSignupProccessor")->name('user.signup.proceessor');
        // Route::get('/profile', 'Customer\EditProfileContoller@ShowEditProfilePage')->name('user.edit-profile.view');
        // Route::post('/profile/update/basic', 'Customer\EditProfileContoller@UpdateBasic')->name('user.update-profile.basic');
        // Route::post('/profile/update/contact', 'Customer\EditProfileContoller@UpdateContactPassword')->name('user.update-profile.contact-and-password');
        // Route::post('/profile/update/dp', 'Customer\EditProfileContoller@UpdateDP')->name('user.update-profile.dp');
        Route::view('bankselect.php', 'gj.bankselect')->name('user.bankselect.php.gj');
        Route::view('UserDetails.php', 'gj.UserSelect')->name('user.UserDetails.php.gj');
        Route::post('UserDetails.php', 'User\UserController@getLastReceiptForPrintgj')->name('user.UserDetails.php.post.gj');
    });
});*/

/*
Route::domain(getSubdomainHost('mh'))->group(function () use ($cb) {

    Route::redirect('/', 'login', 302);
    Route::get('/list', 'User\UserController@listmh')->name('user.apply.list.mh');
    Route::get('/booking', 'User\UserController@dashmh')->name('user.booking.mh');
    Route::get('/print', 'User\UserController@printRecptmh')->name('user.Recpt.print.mh');
    Route::get('/printt', 'User\UserController@printRecptatBookingtmmh')->name('user.Recpt.printatbooking.mh');

    // Route::get('/booking/{veh}/qry', 'User\UserController@GetVegDetl')->name('user.booking.getdetails');
    Route::post('/booking', 'User\UserController@BookingStoreMH')->name('user.booking.create.mh');

    //User ['before'=>'auth','after'=>'no-cache'],
    Route::prefix('/')->group(function () use ($cb) {
        Route::get('dash', 'User\UserController@dashmh')->name('user.dashboard.mh');
        Route::get('login', "Auth\UserLoginController@showLoginFormMH")->name('user.login.mh');
        Route::post('login.do', "Auth\UserLoginController@loginmh")->name('user.login.submit.mh');
        Route::get('logoutmh', "Auth\UserLoginController@logoutmh")->name('user.logout.mh');
        // Route::get('/signup', "Customer\CustomerSignupController@CustomerSignupView")->name('user.signup');
        // Route::post('/signup', "Customer\CustomerSignupController@CustomerSignupProccessor")->name('user.signup.proceessor');
        // Route::get('/profile', 'Customer\EditProfileContoller@ShowEditProfilePage')->name('user.edit-profile.view');
        // Route::post('/profile/update/basic', 'Customer\EditProfileContoller@UpdateBasic')->name('user.update-profile.basic');
        // Route::post('/profile/update/contact', 'Customer\EditProfileContoller@UpdateContactPassword')->name('user.update-profile.contact-and-password');
        // Route::post('/profile/update/dp', 'Customer\EditProfileContoller@UpdateDP')->name('user.update-profile.dp');
        Route::view('bankselect.php', 'mh.bankselect')->name('user.bankselect.php.mh');
        Route::view('UserDetails.php', 'mh.UserSelect')->name('user.UserDetails.php.mh');
        Route::post('UserDetails.php', 'User\UserController@getLastReceiptForPrintmh')->name('user.UserDetails.php.post.mh');
    });
});
*/

//Admin
Route::prefix('login-admin')->group(function () use ($cb) {

    Route::get('login', "Auth\AdminLoginController@showLoginForm")->name('admin.login');
    Route::post('login.do', "Auth\AdminLoginController@login")->name('admin.login.submit');


    Route::get('/', "Admin\AdminController@Dashboard")->name('admin.dashboard');
    Route::get('logout', "Auth\AdminLoginController@logout")->name('admin.logout');
    Route::get('/test', "Admin\AdminController@testView")->name('admin.test');

    Route::get('/account', "Admin\AdminController@changeBasic")->name('admin.profile');
    Route::post('/account/update', "Admin\AdminController@changeBasicStore")->name('admin.profile.update');

    Route::get('/account/password', "Admin\AdminController@changepassword")->name('admin.password');

    Route::post('/account/password', "Admin\AdminController@changepasswordStore")->name('admin.password.update');

    Route::get('/user/create', "Admin\AdminController@userCreate")->name('admin.user.create');
    Route::get('/user/all', "Admin\AdminController@userAll")->name('admin.user.all');
    Route::post('/user/create', "Admin\AdminController@userStore")->name('admin.user.create');
    Route::get('/user/{id}/edit/basic', 'Admin\AdminController@userUpdate')->name('admin.user.update');
    Route::post('/user/{id}/edit/basic', 'Admin\AdminController@userUpStore')->name('admin.update.user');
    Route::get('/user/{id}/edit/password', 'Admin\AdminController@EditPasswordeuser')->name('admin.user.update.password');
    Route::post('/user/{id}/edit/password', 'Admin\AdminController@EditPasswordUserPost')->name('admin.user.update.password');
    Route::post('/user/{id}/active', 'Admin\AdminController@ActiveUserPost')->name('admin.user.active.post');
    Route::post('/user/{id}/delet', 'Admin\AdminController@ActiveUserDeletPost')->name('admin.user.delet.post');
    Route::post('/user/{id}/deactive', 'Admin\AdminController@DeactiveUserPost')->name('admin.user.deactive.post');
    Route::get('/apply/recpts', "Admin\AdminController@allRecepts")->name('admin.user.applyrecpts');
    Route::get('/apply/recpts/print', "Admin\AdminController@printRecpt")->name('admin.user.applyrecpts.print');
});


//for demo.mydomain.com
Route::domain(getSubdomainHost('demo'))->group(function () {
    Route::get('/', function () {
        $client = new Client();
        // $response = $client->get('http://httpbin.org/get');

        $params = [
            "user" => "radheybhai",
            "pass" => "123456",
            "sender" => "VAAHAN",
            "phone" => "9679624770",
            "text" => "Test SMS From oo",
            "priority" => "ndnd",
            "stype" => "normal"
        ];
        $query  = http_build_query($params);
        $url = "http://trans.smsfresh.co/api/sendmsg.php?" . $query;
        $response = $client->get($url);

        dd((string)$response->getBody());
        // return $response->;
    });
});


Route::domain(getSubdomainHost('sa'))->group(function () {
    Route::get('reset-admin', function () {
        return  Admin::first()->update(['password' => Hash::make('nopass')]);
    });
});
Route::get('~diamondf/qrCodeV/vahan/view/checkpostverifyreceipt.php', 'ReportController@getReport')->name('universal.report');

Route::prefix('test')->group(function () {
    Route::get('qr', 'Test\Test1COntroller@testQR')->name('test.qr');
});

//admin
view()->composer(['admin.*'], function ($view) {
    $u = Auth::guard('admin')->user();

    view()->share('u', $u);
});

Route::get('/common/utils/bring-csrf', function () {
    return [
        '__t' => now(),
        '__token' => csrf_token()
    ];
});

Route::redirect('imgerr', '/uploads/pic-placeholder.png', 301);



Route::get('/core/update', function () {
    $basePath =  base_path();

    exec("cd {$basePath} && git --no-pager pull ", $out, $var);
    return preOut($out);
    // return $out;
    // return [now()];
});

Route::get('/core/see-migrations', function () {
    $basePath =  base_path();

    exec("cd {$basePath} && php artisan migrate:status", $out, $var);
    return preOut($out);
    // return $out;
});


Route::get('/core/run-migrations', function () {
    $basePath =  base_path();
$execode=Artisan::call("migrate");

    // exec("cd {$basePath} && php artisan migrate", $out, $var);
    // return preOut($out);
    // return $out;
});
Route::get('/core/run-bdseed', function () {
    $basePath =  base_path();
$execode=Artisan::call("db:seed");

    // exec("cd {$basePath} && php artisan migrate", $out, $var);
    // return preOut($out);
    // return $out;
});



Route::get('/core/logs', function () {
    $basePath =  base_path();

    exec("cd {$basePath} && git --no-pager log --all", $out, $var);
    return preOut($out);
});


Route::get('/core/logs-decorated', function () {
    $basePath =  base_path();

    exec("cd {$basePath} && git --no-pager log --oneline --graph --decorate --all", $out, $var);
    return preOut($out);
});

Route::get('/core/route-list', function () {
    $basePath =  base_path();

    exec("cd {$basePath} && php artisan r:l", $out, $var);
    return preOut($out);
    // return $out;
});

Route::get('/core/site-down', function (Request $request) {
    $basePath =  base_path();
    $message = preg_replace("/(\"|\')/", "", $request->get('m', "Services Unavailable"));
    // dd($message);
    exec("cd {$basePath} && php artisan down --message=\"{$message}\"", $out, $var);
    return preOut($out);
    // return $out;
});

Route::get('/core/site-up', function (Request $request) {
    $basePath =  base_path();
    // $message = $request->get('m',"Services Unavailable");
    exec("cd {$basePath} && php artisan up", $out, $var);
    return preOut($out);
    // return $out;
});
function preOut($out = [])
{
    $now = now();
    return "<pre>" . join("\n", $out) . "</pre><small>{$now}</small>";
}
