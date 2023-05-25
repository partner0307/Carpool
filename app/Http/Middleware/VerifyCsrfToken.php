<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'dashboard/user/save',
        'settings/promo/save',
        'settings/category/save',
        'settings/document/save',
        'settings/business/save',
        'settings/push-notification/save',
        'settings/notification-settings/save',
        'settings/policy-tc/policiesSave',
        'settings/policy-tc/tcSave',
        'settings/faqs/titleSave',
        'settings/faqs/messageSave',
        'settings/general/bank/save',
        'settings/general/subscription/save',
        'settings/general/country/save',
        'payment/settingsSave',
        'payment/payoutChangeMany',
        'admin/signup/action',
        'admin/signin/action',
        'company/signup/action',
        'company/signin/action',
        'post-email',
        'account/system/save',
        'rewards/save',
        'dashboard/user/change'
    ];
}
