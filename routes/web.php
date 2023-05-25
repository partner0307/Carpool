<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RidesController;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\LoansController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\BankSupportController;
use App\Http\Controllers\CountryCurrencyController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\BusinessListController;
use App\Http\Controllers\PromoCodeController;
use App\Http\Controllers\CarCategoryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\GeneralSettingsController;
use App\Http\Controllers\PushNotificationController;
use App\Http\Controllers\NotificationSettingsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PolicyTcController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\RewardsController;
use App\Http\Controllers\LanguageController;

// use App\Http\Controllers\AppsController;

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

// Main Page Route
Route::get('/', [DashboardController::class, 'adminAnalyticsView']);
Route::get('admin', [DashboardController::class, 'adminAnalyticsView'])->name('dashboard-analytics-admin');
Route::get('company', [DashboardController::class, 'companyAnalyticsView'])->name('dashboard-analytics-company');

// Public Route
Route::get('forgot-password/{flag}', [AuthController::class, 'forgotPassword'])->name('forgot-password');
Route::post('post-email', [AuthController::class, 'postEmail']);
Route::get('reset-password/{flag}', [AuthController::class, 'resetPassword'])->name('reset-password');






/********************************** Admin Signin & Signup Route ********************************/



Route::group(['prefix' => 'admin'], function () {
    /* Signin */
    Route::group(['prefix' => 'signin'], function () {
        Route::get('/', [AuthController::class, 'signin'])->name('signin');
        Route::post('/action', [AuthController::class, 'SigninAdmin'])->name('signinadmin');
    });
    /* Signup */
    Route::group(['prefix' => 'signup'], function () {
        Route::get('/', [AuthController::class, 'signup'])->name('signup');
        Route::post('/action', [AuthController::class, 'SignupAdmin'])->name('signupadmin');
    });
    Route::get('/signin', [AuthController::class, 'signin'])->name('signin');
    Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
});





/*********************************** Company Login & Register Route *******************************/



Route::group(['prefix' => 'company'], function () {
     /* Signin */
     Route::group(['prefix' => 'signin'], function () {
        Route::get('/', [AuthController::class, 'login'])->name('login');
        Route::post('/action', [AuthController::class, 'LoginUser'])->name('loginuser');
    });

    /* Signup */
    Route::group(['prefix' => 'signup'], function () {
        Route::get('/', [AuthController::class, 'register'])->name('register');
        Route::post('/action', [AuthController::class, 'RegisterUser'])->name('registeruser');
    });
    Route::get('/signin', [AuthController::class, 'login'])->name('login');
    Route::get('/signup', [AuthController::class, 'register'])->name('register');
});






/************************************ Route Dashboards *************************************/



Route::group(['prefix' => 'dashboard'], function () {
    Route::get('analytics-admin', [DashboardController::class, 'adminAnalyticsView'])->name('dashboard-analytics-admin');
    Route::get('analytics-company', [DashboardController::class, 'companyAnalyticsView'])->name('dashboard-analytics-company');
    Route::get('user', [DashboardController::class, 'userView'])->name('dashboard-user');
    Route::get('details/{id}', [DashboardController::class, 'userDetailsView'])->name('dashboard-user-detail');
    /* Route User Action */
    Route::group(['prefix' => 'user'], function () {
        Route::get('index', [DashboardController::class, 'userIndex'])->name('dashboard-user-index');
        Route::post('save', [DashboardController::class, 'userSave'])->name('dashboard-user-save');
        Route::get('edit/{id}', [DashboardController::class, 'userEdit'])->name('dashboard-user-edit');
        Route::post('change', [DashboardController::class, 'userChange'])->name('dashboard-user-change');
    });

    Route::group(['prefix' => 'analytics'], function () {
        Route::get('adminIndex', [DashboardController::class, 'adminIndex'])->name('dashboard-analytics-admin-index');
        Route::get('companyIndex', [DashboardController::class, 'companyIndex'])->name('dashboard-analytics-company-index');
    });
});





/****************************************** Route Apps ******************************************/



Route::group(['prefix' => 'apps'], function () {
    Route::get('rides-carpool', [RidesController::class, 'carpoolView'])->name('apps-rides-carpool');
    Route::get('rides-taxi', [RidesController::class, 'taxiIndex'])->name('apps-rides-taxi');
    Route::get('ecommerce/products', [EcommerceController::class, 'productsIndex'])->name('apps-ecommerce-products');
    Route::get('ecommerce/sales', [EcommerceController::class, 'salesIndex'])->name('apps-ecommerce-sales');
    Route::get('loans/history', [LoansController::class, 'historyIndex'])->name('apps-loans-history');
    Route::get('loans/deposit', [LoansController::class, 'depositIndex'])->name('apps-loans-deposit');
    Route::get('loans/plans', [LoansController::class, 'plansIndex'])->name('apps-loans-plans');

    Route::group(['prefix' => 'rides-carpool'], function () {
        Route::get('index', [RidesController::class, 'index'])->name('apps-rides-carpool-index');
        Route::get('edit/{id}', [RidesController::class, 'edit'])->name('apps-rides-carpool-edit');
    });
});






/****************************************** Route Rewards *****************************************/



Route::group(['prefix' => 'rewards'], function () {
    Route::get('index', [RewardsController::class, 'index'])->name('rewards-index');
    Route::get('view', [RewardsController::class, 'view'])->name('rewards-view');
    Route::post('save', [RewardsController::class, 'save'])->name('rewards-save');
    Route::get('edit/{id}', [RewardsController::class, 'edit'])->name('rewards-edit');
    Route::get('remove', [RewardsController::class, 'remove'])->name('rewards-remove');
});





/******************************************* Route Reviews ***************************************/



Route::group(['prefix' => 'reviews'], function () {
    Route::get('carpool', [ReviewsController::class, 'carpoolView'])->name('reviews-carpool');
    Route::get('taxi', [ReviewsController::class, 'taxiView'])->name('reviews-taxi');
    Route::get('marketplace', [ReviewsController::class, 'marketplaceView'])->name('reviews-marketplace');
    /* Route Carpool - Reviews  */
    Route::group(['prefix' => 'carpool'], function () {
        Route::get('index/{role}', [ReviewsController::class, 'carpoolIndex'])->name('reviews-carpool-index');
    });
});






/************************************ Route Settings ********************************************/


Route::group(['prefix' => 'settings'], function () {

    // -------------------------  Blade Route  -------------------------------
    Route::get('car-category', [CarCategoryController::class, 'view'])->name('settings-car-category');
    Route::get('required-document', [DocumentController::class, 'view'])->name('settings-required-document');
    Route::get('promo-code', [PromoCodeController::class, 'view'])->name('settings-promo-code');
    Route::get('business-list', [BusinessListController::class, 'view'])->name('settings-business-list');
    Route::get('general-settings', [GeneralSettingsController::class, 'index'])->name('settings-general-settings');
    Route::get('push-notification', [PushNotificationController::class, 'view'])->name('settings-push-notification');
    Route::get('notification-settings', [NotificationSettingsController::class, 'view'])->name('settings-notification-settings');
    Route::get('policies-private', [PolicyTcController::class, 'policiesIndex'])->name('settings-policies-private');
    Route::get('tc', [PolicyTcController::class, 'tcIndex'])->name('settings-tc');
    Route::get('faqs', [FaqController::class, 'view'])->name('settings-faq');

    // --------------------------  Action Routes  -----------------------------
    /* Route Promocode Action */
    Route::group(['prefix' => 'promo'], function () {
        Route::get('index', [PromoCodeController::class, 'index'])->name('settings-promo-code-index');
        Route::post('save', [PromoCodeController::class, 'save'])->name('settings-promo-code-save');
        Route::get('edit/{id}', [PromoCodeController::class, 'edit'])->name('settings-promo-code-edit');
        Route::get('remove/{id}', [PromoCodeController::class, 'remove'])->name('settings-promo-code-remove');
        Route::get('change/{id}', [PromoCodeController::class, 'change'])->name('settings-promo-code-change');
    });

    /* Route Car Category Action */
    Route::group(['prefix' => 'category'], function () {
        Route::get('index', [CarCategoryController::class, 'index'])->name('settings-car-category-index');
        Route::post('save', [CarCategoryController::class, 'save'])->name('settings-car-category-save');
        Route::get('edit/{id}', [CarCategoryController::class, 'edit'])->name('settings-car-category-edit');
        Route::get('remove/{id}', [CarCategoryController::class, 'remove'])->name('settings-car-category-remove');
        Route::get('change/{id}', [CarCategoryController::class, 'change'])->name('settings-car-category-change');
    });

    /* Route Required Document Action */
    Route::group(['prefix' => 'document'], function () {
        Route::get('index', [DocumentController::class, 'index'])->name('settings-required-document-index');
        Route::post('save', [DocumentController::class, 'save'])->name('settings-required-document-save');
        Route::get('edit/{id}', [DocumentController::class, 'edit'])->name('settings-required-document-edit');
        Route::get('remove/{id}', [DocumentController::class, 'remove'])->name('settings-required-document-remove');
        Route::get('change/{id}', [DocumentController::class, 'change'])->name('settings-required-document-change');
    });

    /* Route Business List Action */
    Route::group(['prefix' => 'business'], function () {
        Route::get('index', [BusinessListController::class, 'index'])->name('settings-business-list-index');
        Route::post('save', [BusinessListController::class, 'save'])->name('settings-business-list-save');
        Route::get('edit/{id}', [BusinessListController::class, 'edit'])->name('settings-business-list-edit');
        Route::get('remove/{id}', [BusinessListController::class, 'remove'])->name('settings-business-list-remove');
        Route::get('change/{id}', [BusinessListController::class, 'change'])->name('settings-business-list-change');
    });

    /* Route Notication Action */
    Route::group(['prefix' => 'push-notification'], function () {
        Route::get('index', [PushNotificationController::class, 'index'])->name('settings-push-notification-index');
        Route::post('save', [PushNotificationController::class, 'save'])->name('settings-push-notification-save');
    });

    /* Route Notification Settings Action */
    Route::group(['prefix' => 'notification-settings'], function () {
        Route::get('index', [NotificationSettingsController::class, 'index'])->name('settings-notification-settings-index');
        Route::post('save', [NotificationSettingsController::class, 'save'])->name('settings-notification-settings-save');
        Route::get('edit/{id}', [NotificationSettingsController::class, 'edit'])->name('settings-notification-settings-edit');
        Route::get('change/{id}', [NotificationSettingsController::class, 'change'])->name('settings-notification-settings-change');
    });

    /* Route Policies Private & TC Action */
    Route::group(['prefix' => 'policy-tc'], function () {
        Route::post('policiesSave', [PolicyTcController::class, 'policiesSave'])->name('settings-policies-private-save');
        Route::post('tcSave', [PolicyTcController::class, 'tcSave'])->name('settings-tc-save');
    });

    /* Route Faq Action */
    Route::group(['prefix' => 'faqs'], function () {
        Route::get('index', [FaqController::class, 'index'])->name('settings-faqs-index');
        Route::get('title', [FaqController::class, 'title'])->name('settings-faqs-title');
        Route::post('titleSave', [FaqController::class, 'titleSave'])->name('settings-faqs-titleSave');
        Route::post('messageSave', [FaqController::class, 'messageSave'])->name('settings-faqs-messageTitle');
    });

    /* Route General Settings */
    Route::group(['prefix' => 'general'], function () {
        // Bank Supported
        Route::group(['prefix' => 'bank'], function () {
            Route::get('index', [BankSupportController::class, 'index'])->name('settings-general-bank-index');
            Route::post('save', [BankSupportController::class, 'save'])->name('settings-general-bank-save');
            Route::get('edit/{id}', [BankSupportController::class, 'edit'])->name('settings-general-bank-edit');
            Route::get('remove/{id}', [BankSupportController::class, 'remove'])->name('settings-general-bank-remove');
            Route::get('change/{id}', [BankSupportController::class, 'bankChange'])->name('settings-general-bank-change');
        });
        // Country Currency
        Route::group(['prefix' => 'country'], function () {
            Route::get('index', [CountryCurrencyController::class, 'index'])->name('settings-general-country-index');
            Route::post('save', [CountryCurrencyController::class, 'save'])->name('settings-general-country-save');
            Route::get('edit/{id}', [CountryCurrencyController::class, 'edit'])->name('settings-general-country-edit');
            Route::get('remove/{id}', [CountryCurrencyController::class, 'remove'])->name('settings-general-country-remove');
            Route::get('change/{id}', [CountryCurrencyController::class, 'change'])->name('settings-general-country-change');
        });
        // Subscription
        Route::group(['prefix' => 'subscription'], function () {
            Route::get('index', [SubscriptionController::class, 'index'])->name('settings-general-subscription-index');
            Route::post('save', [SubscriptionController::class, 'save'])->name('settings-general-subscription-save');
            Route::get('edit/{id}', [SubscriptionController::class, 'edit'])->name('settings-general-subscription-edit');
            Route::get('remove/{id}', [SubscriptionController::class, 'remove'])->name('settings-general-subscription-remove');
            Route::get('change/{id}', [SubscriptionController::class, 'change'])->name('settings-general-subscription-change');
        });
    });
});





/********************************************* Route Payment **************************************/



Route::group(['prefix' => 'payment'], function () {
    // ------------------------------ Blade Routes ------------------------------
    Route::get('payout', [PaymentController::class, 'payoutView'])->name('payment-payout');
    Route::get('settings', [PaymentController::class, 'settingsView'])->name('payment-settings');

    // ------------------------------ Action Routes -----------------------------
    /* Route Settings Action */
    Route::get('settingsIndex', [PaymentController::class, 'settingsIndex'])->name('payment-settings-index');
    Route::post('settingsSave', [PaymentController::class, 'settingsSave'])->name('payment-settings-save');
    Route::get('settingsEdit/{id}', [PaymentController::class, 'settingsEdit'])->name('payment-settings-edit');
    Route::get('settingsRemove/{id}', [PaymentController::class, 'settingsRemove'])->name('payment-settings-remove');
    Route::get('settingsChange/{id}', [PaymentController::class, 'settingsChange'])->name('payment-settings-change');

    /* Route Payout Action */
    Route::get('payoutIndex', [PaymentController::class, 'payoutIndex'])->name('payment-payout-index');
    Route::post('payoutSave', [PaymentController::class, 'payoutSave'])->name('payment-payout-save');
    Route::get('payoutEdit/{id}', [PaymentController::class, 'payoutEdit'])->name('payment-payout-edit');
    Route::post('payoutChangeMany', [PaymentController::class, 'payoutChangeMany'])->name('payment-payout-changemany');
});





/********************************************* Route Account ***************************************/



Route::group(['prefix' => 'account'], function () {
    Route::get('system-accounts', [AccountController::class, 'accountsView'])->name('account-system-accounts');
    Route::get('account-settings', [AccountController::class, 'settingsIndex'])->name('account-settings');
    Route::get('change-password', [AccountController::class, 'passwordIndex'])->name('account-change-password');
    /* Route System Action */
    Route::group(['prefix' => 'system'], function () {
        Route::get('index', [AccountController::class, 'accountsIndex'])->name('account-system-index');
        Route::get('info', [AccountController::class, 'accountsInfo'])->name('account-system-info');
        Route::post('save', [AccountController::class, 'accountsSave'])->name('account-system-save');
        Route::get('edit/{id}', [AccountController::class, 'accountsEdit'])->name('account-system-edit');
        Route::get('change/{id}', [AccountController::class, 'accountsChange'])->name('account-system-change');
    });
    /* Route Account Action */
    Route::group(['prefix' => 'settings'], function () {});

});





// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
