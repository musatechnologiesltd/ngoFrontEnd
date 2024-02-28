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
use App\Http\Controllers\NGO\NVisaController;
use App\Http\Controllers\NGO\Fd9Controller;
use App\Http\Controllers\NGO\Fd9OneController;
use App\Http\Controllers\NGO\Fd2FormController;
use App\Http\Controllers\NGO\Fd6FormController;
use App\Http\Controllers\NGO\Fd7FormController;
use App\Http\Controllers\NGO\Fc1FormController;
use App\Http\Controllers\NGO\Fc2FormController;
use App\Http\Controllers\NGO\Fd3FormController;
use App\Http\Controllers\NGO\OLDNGO\FD8Controller;
use App\Http\Controllers\NGO\ApprovalOfConstitutionController;
use App\Http\Controllers\NGO\DuplicateCertificateController;
use App\Http\Controllers\NGO\ExecutiveComitteeApprovalController;
use App\Http\Controllers\NGO\FdFiveFormController;
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
    Route::get('nameChangeDocDownload/{id}', 'nameChangeDocDownload')->name('nameChangeDocDownload');
    Route::get('nameChange/{id}', 'nameChangeView')->name('nameChange.view');
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

    Route::get('fileListForNameChange', 'fileListForNameChange')->name('fileListForNameChange');
    Route::get('foreignNgoType', 'foreignNgoType')->name('foreignNgoType');
    Route::get('localNgoType', 'localNgoType')->name('localNgoType');
    Route::get('changeAcNumberDownload/{id}', 'changeAcNumberDownload')->name('changeAcNumberDownload');
    Route::get('dueVatPdfDownload/{id}', 'dueVatPdfDownload')->name('dueVatPdfDownload');
    Route::get('copyOfChalanPdfDownload/{id}', 'copyOfChalanPdfDownload')->name('copyOfChalanPdfDownload');
    Route::get('yearlyBudgetPdfDownload/{id}', 'yearlyBudgetPdfDownload')->name('yearlyBudgetPdfDownload');
    Route::get('foreginPdfDownload/{id}', 'foreginPdfDownload')->name('foreginPdfDownload');
    Route::post('verifiedFdEightDownload', 'verifiedFdEightDownload')->name('verifiedFdEightDownload');
    Route::get('downloadRenewPdf/{id}', 'downloadRenewPdf')->name('downloadRenewPdf');
    Route::get('renewChief', 'renewChief')->name('renewChief');
    Route::get('renewInfo/{id}', 'renewInfo')->name('renewInfo');
    Route::get('renew', 'renew')->name('renew');
    Route::get('ngoRenewStepOne', 'ngoRenewStepOne')->name('ngoRenewStepOne');
    Route::post('storeRenewInformationList', 'storeRenewInformationList')->name('storeRenewInformationList');
    Route::post('updateRenewInformationList', 'updateRenewInformationList')->name('updateRenewInformationList');
    Route::get('allStaffInformationForRenew', 'allStaffInformationForRenew')->name('allStaffInformationForRenew');
    Route::post('allStaffInformationForRenewStore', 'allStaffInformationForRenewStore')->name('allStaffInformationForRenewStore');
    Route::get('otherInformationForRenew', 'otherInformationForRenew')->name('otherInformationForRenew');
    Route::post('otherInformationForRenewNewPost', 'otherInformationForRenewNewPost')->name('otherInformationForRenewNewPost');
    Route::post('otherInformationForRenewGet', 'otherInformationForRenewGet')->name('otherInformationForRenewGet');
});



Route::controller(RegsubmitController::class)->group(function () {

    Route::get('regSubmitList', 'regSubmitList')->name('regSubmitList');
});

Route::controller(AuthController::class)->group(function () {

    Route::get('/checkMailAlreadyRegisteredOrNot','checkMailAlreadyRegisteredOrNot')->name('checkMailAlreadyRegisteredOrNot');
    Route::get('/checkMailFromList','checkMailFromList')->name('checkMailFromList');
    Route::post('/sendMailGetFromList','sendMailGetFromList')->name('sendMailGetFromList');
    Route::get('/passwordResetPage/{id}','passwordResetPage')->name('passwordResetPage');
    Route::get('/successfullyMailSend/{id}','successfullyMailSend')->name('successfullyMailSend');
    Route::post('/passwordChangeConfirmed','passwordChangeConfirmed')->name('passwordChangeConfirmed');
    Route::get('/passwordReset','showLinkRequestForm')->name('admin.password.request');
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
	    /// 12 february code start
    Route::get('ngoInstructionPageApply', 'ngoInstructionPageApply')->name('ngoInstructionPageApply');
    Route::get('ngoInstructionPageaRenew', 'ngoInstructionPageaRenew')->name('ngoInstructionPageaRenew');
    Route::get('ngoInstructionPageNameChange', 'ngoInstructionPageNameChange')->name('ngoInstructionPageNameChange');
    ///12 february code end

    Route::get('allNoticeBoard', 'allNoticeBoard')->name('allNoticeBoard');
    Route::get('viewNotice/{id}', 'viewNotice')->name('viewNotice');Route::get('informationResetPage', 'informationResetPage')->name('informationResetPage');
    Route::get('frequentlyAskQuestion', 'frequentlyAskQuestion')->name('frequentlyAskQuestion');
    Route::post('checkStatusRegFrom', 'checkStatusRegFrom')->name('checkStatusRegFrom');
    Route::get('statusPage', 'statusPage')->name('statusPage');
    Route::get('emailVerifyPage', 'emailVerifyPage')->name('emailVerifyPage');
    Route::get('emailVerifiedPage', 'emailVerifiedPage')->name('emailVerifiedPage');
    Route::get('ngoInstructionPage', 'ngoInstructionPage')->name('ngoInstructionPage');
    Route::get('ngoRegistrationFeeList', 'ngoRegistrationFeeList')->name('ngoRegistrationFeeList');
    Route::get('lang/change', 'change')->name('changeLang');
    Route::get('changeLanguage/{lan}', 'changeLanguage')->name('changeLanguage');

    Route::group(['middleware' => ['auth']], function() {

    Route::post('finalSubmitRegForm', 'finalSubmitRegForm')->name('finalSubmitRegForm');
    Route::post('renewalSubmitForOld', 'renewalSubmitForOld')->name('renewalSubmitForOld');
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



    Route::controller(FD8Controller::class)->group(function () {

        Route::get('updateDataStepOneFd8/{id}', 'updateDataStepOneFd8')->name('updateDataStepOneFd8');
        Route::get('updateDataStepTwoFd8/{id}', 'updateDataStepTwoFd8')->name('updateDataStepTwoFd8');
        Route::get('updateDataStepThreeFd8/{id}', 'updateDataStepThreeFd8')->name('updateDataStepThreeFd8');
        Route::get('updateDataStepFourFd8/{id}', 'updateDataStepFourFd8')->name('updateDataStepFourFd8');
        Route::get('addDataStepOneFd8/{id}', 'addDataStepOneFd8')->name('addDataStepOneFd8');
        Route::get('addDataStepTwoFd8/{id}', 'addDataStepTwoFd8')->name('addDataStepTwoFd8');
        Route::get('addDataStepThreeFd8/{id}', 'addDataStepThreeFd8')->name('addDataStepThreeFd8');
        Route::get('addDataStepFourFd8/{id}', 'addDataStepFourFd8')->name('addDataStepFourFd8');
    });

    Route::resource('fd3Form',Fd3FormController::class);

    Route::controller(Fd3FormController::class)->group(function () {

        Route::get('fd3PdfDownload/{id}', 'fd3PdfDownload')->name('fd3PdfDownload');
        Route::get('verifiedFdThreeForm/{id}', 'verifiedFdThreeForm')->name('verifiedFdThreeForm');

    });




    Route::resource('fc1Form',Fc1FormController::class);

    Route::controller(Fc1FormController::class)->group(function () {

        Route::get('fc1PdfDownload/{id}', 'fc1PdfDownload')->name('fc1PdfDownload');
        Route::get('verifiedFcOneForm/{id}', 'verifiedFcOneForm')->name('verifiedFcOneForm');
    });


    Route::resource('fc2Form',Fc2FormController::class);

    Route::controller(Fc2FormController::class)->group(function () {

        Route::get('fc2PdfDownload/{id}', 'fc2PdfDownload')->name('fc2PdfDownload');
        Route::get('verifiedFcTwoForm/{id}', 'verifiedFcTwoForm')->name('verifiedFcTwoForm');
    });

    Route::controller(Fd2FormController::class)->group(function () {

    Route::get('addFd2DetailForFd3/{id}', 'addFd2DetailForFd3')->name('addFd2DetailForFd3');
    Route::get('editFd2DetailForFd3/{id}', 'editFd2DetailForFd3')->name('editFd2DetailForFd3');
    Route::post('updateFd2DetailForFd3', 'updateFd2DetailForFd3')->name('updateFd2DetailForFd3');
    Route::post('storeFd2DetailForFd3', 'storeFd2DetailForFd3')->name('storeFd2DetailForFd3');
    Route::get('addFd2DetailForFc2/{id}', 'addFd2DetailForFc2')->name('addFd2DetailForFc2');
    Route::get('editFd2DetailForFc2/{id}', 'editFd2DetailForFc2')->name('editFd2DetailForFc2');
    Route::post('updateFd2DetailForFc2', 'updateFd2DetailForFc2')->name('updateFd2DetailForFc2');
    Route::post('storeFd2DetailForFc2', 'storeFd2DetailForFc2')->name('storeFd2DetailForFc2');
    Route::get('addFd2DetailForFc1/{id}', 'addFd2DetailForFc1')->name('addFd2DetailForFc1');
    Route::get('editFd2DetailForFc1/{id}', 'editFd2DetailForFc1')->name('editFd2DetailForFc1');
    Route::post('updateFd2DetailForFc1', 'updateFd2DetailForFc1')->name('updateFd2DetailForFc1');
    Route::post('storeFd2DetailForFc1', 'storeFd2DetailForFc1')->name('storeFd2DetailForFc1');

});



    Route::resource('fd2Form',Fd2FormController::class);
    Route::resource('fd6Form',Fd6FormController::class);
    Route::resource('fd7Form',Fd7FormController::class);

    Route::resource('fdFiveForm',FdFiveFormController::class);

    Route::controller(FdFiveFormController::class)->group(function () {

        Route::get('fdFiveFormPdf/{id}', 'fdFiveFormPdf')->name('fdFiveFormPdf');
    });




    Route::resource('approvalOfConstitution',ApprovalOfConstitutionController::class);
    Route::resource('duplicateCertificate',DuplicateCertificateController::class);
    Route::resource('executiveCommitteeApproval',ExecutiveComitteeApprovalController::class);

    Route::controller(DuplicateCertificateController::class)->group(function () {

        Route::get('duplicateCertificate/{id}/{title}', 'duplicateCertificate')->name('duplicateCertificate');
    });


    Route::controller(ApprovalOfConstitutionController::class)->group(function () {

        Route::get('approvalOfConstitution/{id}/{title}', 'approvalOfConstitution')->name('approvalOfConstitution');
    });



    Route::controller(ExecutiveComitteeApprovalController::class)->group(function () {

        Route::get('executiveCommitteeApproval/{id}/{title}', 'executiveCommitteeApproval')->name('executiveCommitteeApproval');


    });

    Route::controller(Fd7FormController::class)->group(function () {

        Route::get('reliefAssistanceProjectProposalPdf/{id}', 'reliefAssistanceProjectProposalPdf')->name('reliefAssistanceProjectProposalPdf');
        Route::get('authorizationLetter/{id}', 'authorizationLetter')->name('authorizationLetter');
        Route::get('letterFromDonorAgency/{id}', 'letterFromDonorAgency')->name('letterFromDonorAgency');



    });



    Route::controller(Fd2FormController::class)->group(function () {

        Route::get('downloadFd2DetailForFd3/{id}', 'downloadFd2DetailForFd3')->name('downloadFd2DetailForFd3');
        Route::get('downloadFd2DetailForFc2Other/{id}', 'downloadFd2DetailForFc2Other')->name('downloadFd2DetailForFc2Other');
        Route::get('downloadFd2DetailForFd3Other/{id}', 'downloadFd2DetailForFd3Other')->name('downloadFd2DetailForFd3Other');
        Route::get('downloadFd2DetailForFc2/{id}', 'downloadFd2DetailForFc2')->name('downloadFd2DetailForFc2');
        Route::get('deleteFd2DetailForFc2/{id}', 'deleteFd2DetailForFc2')->name('deleteFd2DetailForFc2');
        Route::post('fd2ForFc2PdfUpdate', 'fd2ForFc2PdfUpdate')->name('fd2ForFc2PdfUpdate');
        Route::get('downloadFd2DetailForFc1Other/{id}', 'downloadFd2DetailForFc1Other')->name('downloadFd2DetailForFc1Other');
        Route::get('deleteFd2DetailForFd3/{id}', 'deleteFd2DetailForFd3')->name('deleteFd2DetailForFd3');
        Route::get('downloadFd2DetailForFc1/{id}', 'downloadFd2DetailForFc1')->name('downloadFd2DetailForFc1');
        Route::get('deleteFd2DetailForFc1/{id}', 'deleteFd2DetailForFc1')->name('deleteFd2DetailForFc1');
        Route::post('fd2ForFc1PdfUpdate', 'fd2ForFc1PdfUpdate')->name('fd2ForFc1PdfUpdate');
        Route::post('fd2ForFd3PdfUpdate', 'fd2ForFd3PdfUpdate')->name('fd2ForFd3PdfUpdate');
        Route::get('downloadFd2DetailForFd7Other/{id}', 'downloadFd2DetailForFd7Other')->name('downloadFd2DetailForFd7Other');
        Route::get('downloadFd2DetailForFd7/{id}', 'downloadFd2DetailForFd7')->name('downloadFd2DetailForFd7');
        Route::get('deleteFd2DetailForFd7/{id}', 'deleteFd2DetailForFd7')->name('deleteFd2DetailForFd7');
        Route::post('fd2ForFd7PdfUpdate', 'fd2ForFd7PdfUpdate')->name('fd2ForFd7PdfUpdate');
        Route::get('addFd2DetailForFd7/{id}', 'addFd2DetailForFd7')->name('addFd2DetailForFd7');
        Route::get('editFd2DetailForFd7/{id}', 'editFd2DetailForFd7')->name('editFd2DetailForFd7');
        Route::post('updateFd2DetailForFd7', 'updateFd2DetailForFd7')->name('updateFd2DetailForFd7');
        Route::post('storeFd2DetailForFd7', 'storeFd2DetailForFd7')->name('storeFd2DetailForFd7');
        Route::post('fd2PdfUpdate', 'fd2PdfUpdate')->name('fd2PdfUpdate');
        Route::get('fd2MainPdfDownload/{id}', 'fd2MainPdfDownload')->name('fd2MainPdfDownload');
        Route::get('fd2PdfDownload/{id}', 'fd2PdfDownload')->name('fd2PdfDownload');
        Route::get('fd2PdfDestroy/{id}', 'fd2PdfDestroy')->name('fd2PdfDestroy');
        Route::get('addFd2Detail/{id}', 'addFd2Detail')->name('addFd2Detail');

    });

    Route::controller(Fd6FormController::class)->group(function () {

        Route::get('ProjectProposalFormPdfDownload/{id}', 'ProjectProposalFormPdfDownload')->name('ProjectProposalFormPdfDownload');
        Route::get('getDistrictList', 'getDistrictList')->name('getDistrictList');
        Route::get('getCityCorporationList', 'getCityCorporationList')->name('getCityCorporationList');

    });

    Route::resource('nVisa',NVisaController::class);

    Route::controller(NVisaController::class)->group(function () {

        Route::get('addnVisaDetail/{id}', 'addnVisaDetail')->name('addnVisaDetail');
        Route::get('/nVisaDocumentDownload/{cat}/{id}', 'nVisaDocumentDownload')->name('nVisaDocumentDownload');
        Route::get('/fd9FormExtraPdfDownload/{cat}/{id}', 'fd9FormExtraPdfDownload')->name('fd9FormExtraPdfDownload');
    });

    Route::resource('fdNineForm',Fd9Controller::class);

    Route::controller(Fd9Controller::class)->group(function () {

        Route::post('/mainFd9PdfUpload', 'mainFd9PdfUpload')->name('mainFd9PdfUpload');
        Route::get('fd9Chief', 'fd9Chief')->name('fd9Chief');
        Route::get('/mainFd9PdfDownload/{id}', 'mainFd9PdfDownload')->name('mainFd9PdfDownload');
    });
    Route::resource('fdNineOneForm',Fd9OneController::class);

    Route::controller(Fd9OneController::class)->group(function () {

        Route::get('/fd9OneFormExtraPdfDownload/{cat}/{id}', 'fd9OneFormExtraPdfDownload')->name('fd9OneFormExtraPdfDownload');
        Route::get('fd9OneChief', 'fd9OneChief')->name('fd9OneChief');
        Route::post('/mainPdfUpload', 'mainPdfUpload')->name('mainPdfUpload');
        Route::get('/mainPdfDownload/{id}', 'mainPdfDownload')->name('mainPdfDownload');
        Route::get('/niyogPotroDownload/{id}', 'niyogPotroDownload')->name('niyogPotroDownload');
        Route::get('/formNinePdfDownload/{id}', 'formNinePdfDownload')->name('formNinePdfDownload');
        Route::get('/nVisaCopyDownload/{id}', 'nVisaCopyDownload')->name('nVisaCopyDownload');
    });

Route::controller(FdoneformController::class)->group(function () {


    Route::get('fromEightChiefForOldNgo', 'fromEightChiefForOldNgo')->name('fromEightChiefForOldNgo');
    Route::get('fromOneChief', 'fromOneChief')->name('fromOneChief');
    Route::get('attachTheSupportingPaper/{id}', 'attachTheSupportingPaper')->name('attachTheSupportingPaper');
    Route::get('planOfOperation/{id}', 'planOfOperation')->name('planOfOperation');
    Route::post('/uploadFromOnePdf', 'uploadFromOnePdf')->name('uploadFromOnePdf');
    Route::post('/uploadFromEightPdfOld', 'uploadFromEightPdfOld')->name('uploadFromEightPdfOld');
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
    Route::get('/fdFormEightInfoPdfOld', 'fdFormEightInfoPdfOld')->name('fdFormEightInfoPdfOld');
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
   Route::get('/renewFileDownloadFromView/{title}/{id}', 'renewFileDownloadFromView')->name('renewFileDownloadFromView');
   Route::get('/deleteRenewalFileDownload/{title}/{id}', 'deleteRenewalFileDownload')->name('deleteRenewalFileDownload');
   Route::get('/deleteRenewalFile/{title}/{id}', 'deleteRenewalFile')->name('deleteRenewalFile');

});



Route::resource('formEightNgoCommitteMember',FormeightController::class);
Route::controller(FormeightController::class)->group(function () {

    Route::post('/formEightNewDataUpdate', 'formEightNewDataUpdate')->name('formEightNewDataUpdate');
    Route::post('/formEightNewData', 'formEightNewData')->name('formEightNewData');
    Route::get('/updateDateData', 'updateDateData')->name('updateDateData');
    Route::get('/formEightNgoCommitteeMemberView', 'formEightNgoCommitteeMemberView')->name('formEightNgoCommitteeMemberView');
    Route::post('/uploadFromEightPdf', 'uploadFromEightPdf')->name('uploadFromEightPdf');
    Route::get('/formEightNgoCommitteeMemberTotalView', 'formEightNgoCommitteeMemberTotalView')->name('formEightNgoCommitteeMemberTotalView');
    Route::get('/formEightNgoCommitteeMemberTotalYear', 'formEightNgoCommitteeMemberTotalYear')->name('formEightNgoCommitteeMemberTotalYear');
    Route::get('/formEightNgoCommitteeMemberPdf', 'formEightNgoCommitteeMemberPdf')->name('formEightNgoCommitteeMemberPdf');
    Route::get('/formEightNgoCommitteeMemberViewFormEdit', 'formEightNgoCommitteeMemberViewFormEdit')->name('formEightNgoCommitteeMemberViewFormEdit');


});

});
