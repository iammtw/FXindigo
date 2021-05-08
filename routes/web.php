<?php

Route::view('/', 'auth.login');
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/admin/dashboard', 'AdminController@index')->middleware('auth', 'allAdminType');

// AdminRoutes

Route::get('/admin/profile', 'AdminController@profile')->middleware('auth', 'allAdminType');
Route::post('/admin/profile', 'AdminController@profileUpdate')->middleware('auth', 'allAdminType');
Route::get('/admin/change-password', 'AdminController@changePassword')->middleware('auth', 'allAdminType');
Route::post('/admin/change-password', 'AdminController@changePasswordUpdate')->middleware('auth', 'allAdminType');

Route::get('admin/withdrawals', 'AdminController@winthdrawalrequests')->middleware('auth', 'allAdminType');
Route::get('admin/payment-options/{id}', 'AdminController@paymentOptions')->middleware('auth', 'allAdminType');
Route::get('admin/withdraw/approve/{id}', 'AdminController@withdrawApprove')->middleware('auth', 'semiAdmin');
Route::get('admin/withdraw/decline/{id}', 'AdminController@withdrawDecline')->middleware('auth', 'semiAdmin');

Route::get('admin/deposits', 'AdminController@depositsRequests')->middleware('auth', 'allAdminType');
Route::get('admin/deposit/approve/{id}', 'AdminController@depositApprove')->middleware('auth', 'admin');
Route::get('admin/deposit/decline/{id}', 'AdminController@depositDecline')->middleware('auth', 'admin');

Route::post('admin/add-balance/{id}', 'AdminController@addBalancedb')->middleware('auth','semiAdmin');
Route::get('admin/history', 'AdminController@history')->middleware('auth','semiAdmin');
Route::get('admin/withdraw-history', 'AdminController@WithdrawHistory')->middleware('auth','semiAdmin');
Route::get('admin/deposit-history', 'AdminController@depositHistory')->middleware('auth','semiAdmin');
Route::post('admin/mail/{email}/{username}', 'AdminController@emailSend')->middleware('auth', 'allAdminType');

Route::get('admin/kyc', 'AdminController@kyc')->middleware('auth', 'admin');
Route::post('admin/kyc', 'AdminController@uploadkyc')->middleware('auth', 'admin');

Route::get('admin/partners', 'AdminController@partners')->middleware('auth', 'allAdminType');
Route::get('admin/partner/{id}/{option}', 'AdminController@partnerStatus')->middleware('auth','semiAdmin');
Route::get('admin/partners/{code}', 'AdminController@checkJoinedUsers')->middleware('auth', 'allAdminType');

Route::get('admin/approved-partners', 'AdminController@approvedPartners')->middleware('auth', 'allAdminType');
Route::get('admin/nonapproved-partners', 'AdminController@nonApprovedPartners')->middleware('auth', 'allAdminType');

Route::post('admin/add-bonus/{id}', 'AdminController@addBonus')->middleware('auth','semiAdmin');
Route::get('admin/bonus-history/{id}', 'AdminController@viewBonusHistory')->middleware('auth','semiAdmin');
Route::get('admin/bonus-withdraw/{id}', 'AdminController@bonusWithdraw')->middleware('auth','semiAdmin');
Route::get('admin/bonus-withdraw/{id}/{option}', 'AdminController@bonusWithdrawOption')->middleware('auth','semiAdmin');
Route::get('admin/all-bonus-withdraws', 'AdminController@allbonuswithdraw')->middleware('auth','semiAdmin');

Route::get('admin/users', 'AdminController@users')->middleware('auth', 'allAdminType');
Route::get('admin/user/{id}', 'AdminController@userDetails')->middleware('auth', 'allAdminType');
Route::get('admin/user/{id}/documents', 'AdminController@userDocuments')->middleware('auth', 'allAdminType');
Route::get('admin/user/{id}/documents/{docid}/{option}', 'AdminController@userDocumentOption')->middleware('auth', 'allAdminType');

Route::get('admin/users/{id}/accounts/', 'AdminController@userAccounts')->middleware('auth', 'allAdminType');
Route::get('admin/users/account/{id}', 'AdminController@accountDeposit')->middleware('auth', 'allAdminType');

Route::get('admin/user/{id}/upload-documents', 'AdminController@wantToUploadDocuments')->middleware('auth','semiAdmin');
Route::post('admin/user/{id}/upload-documents', 'AdminController@uploadDocuments')->middleware('auth','semiAdmin');
Route::get('admin/user/delete/{id}', 'AdminController@deleteUser')->middleware('auth', 'semiAdmin');
Route::get('admin/user/reactive/{id}', 'AdminController@reActivate')->middleware('auth', 'semiAdmin');

Route::get('admin/user-admin/{id}', 'AdminController@markasadmin')->middleware('auth', 'semiAdmin');
Route::get('admin/user-employee/{id}', 'AdminController@markasemployee')->middleware('auth', 'semiAdmin');
Route::get('admin/user-user/{id}', 'AdminController@markasuser')->middleware('auth', 'semiAdmin');
Route::get('admin/user-semiadmin/{id}', 'AdminController@markasemiadmin')->middleware('auth', 'semiAdmin');
Route::get('admin/pending-users', 'AdminController@pendingUser')->middleware('auth', 'allAdminType');
Route::get('admin/pending-user/{id}', 'AdminController@pendingUserActive')->middleware('auth', 'allAdminType');

Route::get('admin/approved-users', 'AdminController@approvedDocUsers')->middleware('auth', 'allAdminType');
Route::get('admin/non-approved-users', 'AdminController@nonApprovedDocUsers')->middleware('auth', 'allAdminType');
Route::get('admin/pending-approved-users', 'AdminController@pendingDocUser')->middleware('auth', 'allAdminType');
Route::get('admin/admin-users', 'AdminController@adminUsers')->middleware('auth', 'allAdminType');
Route::get('admin/user-doc-status/{id}/{option}', 'AdminController@docStatus')->middleware('auth', 'allAdminType');

Route::get('admin/account-deposit/{depositId}/{id}/{option}/{amount}', 'AdminController@accountDepositOption')->middleware('auth', 'semiAdmin');
Route::get('admin/account-withdraw/{depositId}/{id}/{option}/{amount}', 'AdminController@accountwithdrawOption')->middleware('auth', 'semiAdmin');
Route::get('admin/account-requests', 'AdminController@accountRequests')->middleware('auth', 'allAdminType');
Route::get('admin/deposit-requests', 'AdminController@depositRequests')->middleware('auth', 'allAdminType');
Route::get('admin/withdraw-requests', 'AdminController@withdrawRequests')->middleware('auth', 'allAdminType');

Route::get('admin/trading-accounts', 'AdminController@tradingAccounts')->middleware('auth', 'allAdminType');
Route::post('admin/trading-account/{id}/', 'AdminController@accountID')->middleware('auth', 'semiAdmin');

Route::get('admin/trading-account/edit/{id}', 'AdminController@editTradingAccount')->middleware('auth', 'semiAdmin');
Route::post('admin/trading-account/edit/{id}', 'AdminController@updateTradingAccount')->middleware('auth', 'semiAdmin');
Route::get('admin/trading-account/delete/{id}', 'AdminController@deleteTradingAccount')->middleware('auth','semiAdmin');

Route::get('admin/trading-accounts/{option}/', 'AdminController@viewAccountCategorically')->middleware('auth', 'allAdminType');

Route::get('admin/demo-accounts', 'AdminController@demoAccounts')->middleware('auth', 'allAdminType');
Route::get('admin/demo-account/{id}/{option}', 'AdminController@demoAccountDb')->middleware('auth', 'semiAdmin');

Route::get('admin/users/export/{type}', 'AdminController@exportUsers')->middleware('auth', 'semiAdmin');
Route::get('admin/users/pending/export', 'AdminController@pendingExport')->middleware('auth','semiAdmin');

// customerRoutes

Route::get('/customer/profile', 'CustomerController@profile')->middleware('auth', 'customer');
Route::post('/customer/profile', 'CustomerController@profileUpdate')->middleware('auth', 'customer');
Route::get('/customer/change-password', 'CustomerController@changePassword')->middleware('auth', 'customer');
Route::post('/customer/change-password', 'CustomerController@changePasswordUpdate')->middleware('auth', 'customer');

Route::get('/customer/deposit', 'CustomerController@deposit')->middleware('auth', 'customer');
Route::get('/customer/add-deposit', 'CustomerController@addDeposit')->middleware('auth', 'customer');
Route::post('/customer/add-deposit', 'CustomerController@addDepositdb')->middleware('auth', 'customer');
Route::get('/customer/delete-deposit/{id}', 'CustomerController@deleteDeposit')->middleware('auth', 'customer');

Route::get('/customer/withdraw', 'CustomerController@withdraw')->middleware('auth', 'customer');
Route::get('/customer/add-withdraw', 'CustomerController@addWithdraw')->middleware('auth', 'customer');
Route::post('/customer/add-withdraw', 'CustomerController@addWithdrawdb')->middleware('auth', 'customer');
Route::get('/customer/delete-withdraw/{id}', 'CustomerController@deleteWithdraw')->middleware('auth', 'customer');

Route::get('/customer/history', 'CustomerController@history')->middleware('auth', 'customer');
Route::get('customer/platforms', 'CustomerController@platforms')->middleware('auth', 'customer');

Route::get('customer/kyc', 'CustomerController@kyc')->middleware('auth', 'customer');
Route::post('customer/kyc', 'CustomerController@uploadkyc')->middleware('auth', 'customer');

// transfer
Route::get('customer/transfer', 'CustomerController@transfer')->middleware('auth', 'customer');
Route::get('customer/account', 'CustomerController@account')->middleware('auth', 'customer');
Route::post('customer/account', 'CustomerController@createAccount')->middleware('auth', 'customer');
Route::get('customer/select-account', 'CustomerController@selectAcount')->middleware('auth', 'customer');
Route::get('customer/select-account/{accountId}', 'CustomerController@selection')->middleware('auth', 'customer');
Route::get('customer/account/{id}/options', 'CustomerController@options')->middleware('auth', 'customer');
Route::post('customer/account/{id}/{options}', 'CustomerController@actionAccount')->middleware('auth', 'customer');
Route::get('/customer/delete-account-deposit/{id}', 'CustomerController@deleteAccountDeposit')->middleware('auth', 'customer');
Route::get('/customer/delete-account-withdraw/{id}', 'CustomerController@deleteAccountWithdraw')->middleware('auth', 'customer');

// verfication
Route::get('customer/verification', 'CustomerController@verification')->middleware('auth', 'customer');
Route::post('customer/verification', 'CustomerController@uploadDoc')->middleware('auth', 'customer');
Route::get('customer/verification/delete/{id}', 'CustomerController@deleteDoc')->middleware('auth', 'customer');

// Referral System

Route::get('customer/partner', 'CustomerController@partner')->middleware('auth', 'customer');
Route::get('customer/become-our-partner', 'CustomerController@becomeourpartner')->middleware('auth', 'customer');
Route::get('customer/bonus-history/{id}', 'CustomerController@bonusHistory')->middleware('auth', 'customer');
Route::post('customer/bonus-withdraw/{id}', 'CustomerController@addBonusWithdraw')->middleware('auth', 'customer');
Route::get('customer/delete-bw/{id}', 'CustomerController@deleteBonusWithdraw')->middleware('auth', 'customer');
Route::get('customer/demo-account', 'CustomerController@demoAccount')->middleware('auth', 'customer');

Route::get('customer/demo-account', 'CustomerController@demoAccount')->middleware('auth', 'customer');
Route::post('customer/demo-account', 'CustomerController@demoAccountDb')->middleware('auth', 'customer');

Route::get('customer/partner-accounts', 'CustomerController@partnerAccounts')->middleware('auth', 'customer');
Route::get('customer/partner-accounts/{id}', 'CustomerController@partnerAccountsDb')->middleware('auth', 'customer');

Route::get('customer/payment/add', 'CustomerController@addPayment')->middleware('auth', 'customer');
Route::get('customer/payment/{type}', 'CustomerController@payment')->middleware('auth', 'customer');
Route::post('customer/payment/email', 'CustomerController@emailPayment')->middleware('auth', 'customer');
Route::post('customer/payment/number', 'CustomerController@numberPayment')->middleware('auth', 'customer');
Route::post('customer/payment/bank', 'CustomerController@bankPayment')->middleware('auth', 'customer');
Route::post('customer/payment/pm', 'CustomerController@pm')->middleware('auth', 'customer');
Route::get('customer/payments', 'CustomerController@allPayments')->middleware('auth', 'customer');
Route::get('customer/payments/delete/{id}', 'CustomerController@deletePayment')->middleware('auth', 'customer');

Route::get('terms', function () {
    $file_name = "FXINDIGO Terms AND Conditions.pdf";
    $file_path = "/home/u139887867/domains/fxindigo.com/public_html/app/files/FXINDIGO Terms AND Conditions.pdf";

    return response()->download($file_path);
});
