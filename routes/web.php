<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\NGO\OtherformController;
use App\Http\Controllers\NGO\FormeightController;
use App\Http\Controllers\NGO\NgomemberController;
use App\Http\Controllers\NGO\NgomemberdocController;
use App\Http\Controllers\NGO\NgodocumentController;
use App\Http\Controllers\NGO\FdoneformController;
use App\Http\Controllers\NGO\RegsubmitController;
use App\Http\Controllers\NGO\NamechangeController;
use App\Http\Controllers\NGO\RenewController;
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

Route::get('/clear', function() {
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    return redirect()->route('index');
});

Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'index')->name('index');

});


Route::controller(NamechangeController::class)->group(function () {


    Route::get('addOtherDoc', 'addOtherDoc')->name('addOtherDoc');
    Route::post('storeOtherDoc', 'storeOtherDoc')->name('storeOtherDoc');
    Route::post('updateOtherDoc', 'updateOtherDoc')->name('updateOtherDoc');
    Route::get('finalSubmitNameChange', 'finalSubmitNameChange')->name('finalSubmitNameChange');
    Route::get('allNgoRelatedDocument', 'allNgoRelatedDocument')->name('allNgoRelatedDocument');

    Route::get('ngoMemberNidAndImage', 'ngoMemberNidAndImage')->name('ngoMemberNidAndImage');
    Route::get('ngoMemberNidAndImageAdd', 'ngoMemberNidAndImageAdd')->name('ngoMemberNidAndImageAdd');
    Route::post('ngoMemberNidAndImageStore', 'ngoMemberNidAndImageStore')->name('ngoMemberNidAndImageStore');
    Route::post('ngoMemberNidAndImageUpdate', 'ngoMemberNidAndImageUpdate')->name('ngoMemberNidAndImageUpdate');


    Route::get('formEightData', 'formEightData')->name('formEightData');
    Route::get('formEightDataAdd', 'formEightDataAdd')->name('formEightDataAdd');
    Route::get('formEightDataEdit/{id}', 'formEightDataEdit')->name('formEightDataEdit');
    Route::post('formEightDataStore', 'formEightDataStore')->name('formEightDataStore');
    Route::post('formEightDataUpdate', 'formEightDataUpdate')->name('formEightDataUpdate');
    Route::post('formEightDataDelete/{id}','delete')->name('formEightDataDelete');



    Route::get('ngoCommitteMember', 'ngoCommitteMember')->name('ngoCommitteMember');
    Route::get('ngoCommitteMemberAdd', 'ngoCommitteMemberAdd')->name('ngoCommitteMemberAdd');
    Route::get('ngoCommitteMemberEdit/{id}', 'ngoCommitteMemberEdit')->name('ngoCommitteMemberEdit');
    Route::post('ngoCommitteMemberStore', 'ngoCommitteMemberStore')->name('ngoCommitteMemberStore');
    Route::post('ngoCommitteMemberUpdate', 'ngoCommitteMemberUpdate')->name('ngoCommitteMemberUpdate');



    Route::get('sendNameChange', 'sendNameChange')->name('sendNameChange');
    Route::get('nameChange', 'nameChange')->name('nameChange');
    Route::get('/formOnePdf/{main_id}/{id}',  'formOnePdf')->name('formOnePdf');
    Route::get('/formEightPdf/{main_id}','formEightPdf')->name('formEightPdf');
    Route::get('/sourceOfFund/{id}', 'sourceOfFund')->name('sourceOfFund');
    Route::get('/otherPdfFromFDOneForm/{id}','otherPdfFromFDOneForm')->name('otherPdfFromFDOneForm');

    Route::get('/ngoOtherDocument/{id}','ngoOtherDocument')->name('ngoOtherDocument');
    Route::get('/ngoMemberDocument/{id}','ngoMemberDocument')->name('ngoMemberDocument');
});


Route::controller(RenewController::class)->group(function () {

    Route::get('renew', 'renew')->name('renew');
    Route::get('ngoRenewStepOne', 'ngoRenewStepOne')->name('ngoRenewStepOne');
    Route::post('storeRenewInformationList', 'storeRenewInformationList')->name('storeRenewInformationList');
    Route::post('updateRenewInformationList', 'updateRenewInformationList')->name('updateRenewInformationList');
    Route::get('allStaffInformationForRenew', 'allStaffInformationForRenew')->name('allStaffInformationForRenew');
    Route::post('allStaffInformationForRenewStore', 'allStaffInformationForRenewStore')->name('allStaffInformationForRenewStore');
    Route::get('otherInformationForRenew', 'otherInformationForRenew')->name('otherInformationForRenew');
    Route::post('otherInformationForRenewGet', 'otherInformationForRenewGet')->name('otherInformationForRenewGet');
});



Route::controller(RegsubmitController::class)->group(function () {

    Route::get('regSubmitList', 'regSubmitList')->name('regSubmitList');
});

Route::controller(AuthController::class)->group(function () {
    ///


    Route::get('/checkMailAlreadyRegisteredOrNot','checkMailAlreadyRegisteredOrNot')->name('checkMailAlreadyRegisteredOrNot');
    Route::get('/checkMailFromList','checkMailFromList')->name('checkMailFromList');
    Route::post('/sendMailGetFromList','sendMailGetFromList')->name('sendMailGetFromList');
    Route::get('/passwordResetPage/{id}','passwordResetPage')->name('passwordResetPage');
    Route::get('/successfullyMailSend/{id}','successfullyMailSend')->name('successfullyMailSend');
    Route::post('/passwordChangeConfirmed','passwordChangeConfirmed')->name('passwordChangeConfirmed');
    Route::get('/passwordReset','showLinkRequestForm')->name('admin.password.request');

    ////

Route::get('login', 'index')->name('login');
Route::post('postLogin','postLogin')->name('login.post');
Route::get('registration','registration')->name('register');
Route::post('postRegistration','postRegistration')->name('register.post');
Route::post('updateRegistration','updateRegistration')->name('register.update');
Route::get('logout','logout')->name('logout');

/* New Added Routes */
Route::get('dashboard','dashboard')->middleware(['auth', 'is_verify_email'])->name('dashboard');
Route::get('account/verify/{token}','verifyAccount')->name('user.verify');

});

Route::controller(OtherformController::class)->group(function () {


    Route::get('informationResetPage', 'informationResetPage')->name('informationResetPage');
    Route::get('frequentlyAskQuestion', 'frequentlyAskQuestion')->name('frequentlyAskQuestion');
    ;
    Route::post('checkStatusRegFrom', 'checkStatusRegFrom')->name('checkStatusRegFrom');
    Route::get('statusPage', 'statusPage')->name('statusPage');
    Route::get('emailVerifyPage', 'emailVerifyPage')->name('emailVerifyPage');
    Route::get('emailVerifiedPage', 'emailVerifiedPage')->name('emailVerifiedPage');
    Route::get('ngoInstructionPage', 'ngoInstructionPage')->name('ngoInstructionPage');
    Route::get('ngoRegistrationFeeList', 'ngoRegistrationFeeList')->name('ngoRegistrationFeeList');
    Route::get('lang/change', 'change')->name('changeLang');
    Route::get('changeLanguage', 'changeLanguage')->name('changeLanguage');

    Route::group(['middleware' => ['auth']], function() {
    Route::post('finalSubmitRegForm', 'finalSubmitRegForm')->name('finalSubmitRegForm');
    Route::post('updateUser','updateUser')->name('updateUser');
    Route::post('resetAllData','resetAllData')->name('resetAllData');
    Route::post('ngoTypeAndLanguagePost','ngoTypeAndLanguagePost')->name('ngoTypeAndLanguagePost');
    Route::post('ngoTypeAndLanguageDelete/{id}','ngoTypeAndLanguageDelete')->name('ngoTypeAndLanguageDelete');
    Route::get('ngoTypeAndLanguage','ngoTypeAndLanguage')->name('ngoTypeAndLanguage');
    Route::get('ngoRegistrationFirstInfo','ngoRegistrationFirstInfo')->name('ngoRegistrationFirstInfo');
    Route::post('ngoRegistrationFirstInfoPost','ngoRegistrationFirstInfoPost')->name('ngoRegistrationFirstInfoPost');
    Route::get('ngoAllRegistrationForm','ngoAllRegistrationForm')->name('ngoAllRegistrationForm');
});


});




Route::group(['middleware' => ['auth']], function() {

Route::controller(FdoneformController::class)->group(function () {



    Route::post('/uploadFromOnePdf', 'uploadFromOnePdf')->name('uploadFromOnePdf');
    Route::get('/backFromStepTwo', 'backFromStepTwo')->name('backFromStepTwo');
    Route::get('/sourceOfFundDocDownload/{id}', 'sourceOfFundDocDownload')->name('sourceOfFundDocDownload');
    Route::get('/otherInfoFromOneDownload/{id}', 'otherInfoFromOneDownload')->name('otherInfoFromOneDownload');
    Route::get('/adviserDataDelete', 'adviserDataDelete')->name('adviserDataDelete');
    Route::get('/adviserDataUpdate', 'adviserDataUpdate')->name('adviserDataUpdate');
    Route::get('/otherInformationADelete', 'otherInformationADelete')->name('otherInformationADelete');
    Route::post('/otherInformationAUpdate', 'otherInformationAUpdate')->name('otherInformationAUpdate');
    Route::get('/sourceOfFundDelete', 'sourceOfFundDelete')->name('sourceOfFundDelete');
    Route::post('/sourceOfFundUpdate', 'sourceOfFundUpdate')->name('sourceOfFundUpdate');
    Route::get('/fdOneFormEdit', 'fdOneFormEdit')->name('fdOneFormEdit');
    Route::get('/fdFormOneInfoPdf', 'fdFormOneInfoPdf')->name('fdFormOneInfoPdf');
    Route::get('/fdFormOneInfo', 'fdFormOneInfo')->name('fdFormOneInfo');
    Route::get('/particularsOfOrganisation', 'particularsOfOrganisation')->name('particularsOfOrganisation');
    Route::post('/particularsOfOrganisationPost', 'particularsOfOrganisationPost')->name('particularsOfOrganisationPost');
    Route::post('/particularsOfOrganisationUpdate', 'particularsOfOrganisationUpdate')->name('particularsOfOrganisationUpdate');
    Route::get('/fieldOfProposedActivities', 'fieldOfProposedActivities')->name('fieldOfProposedActivities');
    Route::post('/fieldOfProposedActivitiesPost', 'fieldOfProposedActivitiesPost')->name('fieldOfProposedActivitiesPost');
    Route::post('/fieldOfProposedActivitiesUpdate', 'fieldOfProposedActivitiesUpdate')->name('fieldOfProposedActivitiesUpdate');
    Route::get('/allStaffDetailsInformation', 'allStaffDetailsInformation')->name('allStaffDetailsInformation');
    Route::post('/allStaffDetailsInformationPost', 'allStaffDetailsInformationPost')->name('allStaffDetailsInformationPost');
    Route::post('/allStaffDetailsInformationUpdate', 'allStaffDetailsInformationUpdate')->name('allStaffDetailsInformationUpdate');
    Route::get('/othersInformation', 'othersInformation')->name('othersInformation');
    Route::post('/othersInformationPost', 'othersInformationPost')->name('othersInformationPost');
    Route::post('/othersInformationUpdate', 'othersInformationUpdate')->name('othersInformationUpdate');



});



 Route::resource('ngoMemberDocument',NgomemberdocController::class);
 Route::controller(NgomemberdocController::class)->group(function () {
    Route::get('/ngoMemberDocFinalUpdate', 'ngoMemberDocFinalUpdate')->name('ngoMemberDocFinalUpdate');
    Route::get('/ngoMemberDocumentDownload/{id}', 'ngoMemberDocumentDownload')->middleware(['auth'])->name('ngoMemberDocumentDownload');
    Route::get('/ngoMemberDocumentView', 'ngoMemberDocumentView')->middleware(['auth'])->name('ngoMemberDocumentView');

});



Route::resource('ngoMember',NgomemberController::class);

Route::controller(NgomemberController::class)->group(function () {
    Route::get('/ngoMemberView', 'ngoMemberView')->name('ngoMemberView');
    Route::get('/ngoMemberFinalUpdate', 'ngoMemberFinalUpdate')->name('ngoMemberFinalUpdate');

});

Route::resource('ngoDocument',NgodocumentController::class);

Route::controller(NgodocumentController::class)->group(function () {
    Route::get('/ngoDocumentFinal', 'ngoDocumentFinal')->name('ngoDocumentFinal');
    Route::get('/ngoDocumentDownload/{id}', 'ngoDocumentDownload')->name('ngoDocumentDownload');
    Route::get('/ngoDocumentView', 'ngoDocumentView')->name('ngoDocumentView');

});



Route::resource('formEightNgoCommitteMember',FormeightController::class);
Route::controller(FormeightController::class)->group(function () {

    Route::get('/updateDateData', 'updateDateData')->name('updateDateData');


    Route::get('/formEightNgoCommitteeMemberView', 'formEightNgoCommitteeMemberView')->name('formEightNgoCommitteeMemberView');
    Route::post('/uploadFromEightPdf', 'uploadFromEightPdf')->name('uploadFromEightPdf');
    Route::get('/formEightNgoCommitteeMemberTotalView', 'formEightNgoCommitteeMemberTotalView')->name('formEightNgoCommitteeMemberTotalView');
    Route::get('/formEightNgoCommitteeMemberTotalYear', 'formEightNgoCommitteeMemberTotalYear')->name('formEightNgoCommitteeMemberTotalYear');
    Route::get('/formEightNgoCommitteeMemberPdf', 'formEightNgoCommitteeMemberPdf')->name('formEightNgoCommitteeMemberPdf');
    Route::get('/formEightNgoCommitteeMemberViewFormEdit', 'formEightNgoCommitteeMemberViewFormEdit')->name('formEightNgoCommitteeMemberViewFormEdit');


});

});
