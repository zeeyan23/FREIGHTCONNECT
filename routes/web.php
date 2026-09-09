<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use Umpirsky\Country\CountryRepository;
use App\Http\Controllers\ForwardingMemberController;
use App\Http\Controllers\TraderController;
use App\Http\Controllers\FreightConnectAccountController;
use App\Http\Controllers\FreightConnectAuthController;

Route::get('/', function () {
    $countries = include base_path('vendor/umpirsky/country-list/data/en/country.php');
    return view('home', compact('countries'));
});

Route::get('/request-membership/trade-partner', function () {

    $countries = include base_path('vendor/umpirsky/country-list/data/en/country.php');

    return view('membership.trade-partner', compact('countries'));

})->name('membership.trade-partner');


Route::get('/request-membership/freight-forwarding', function () {

    $countries = include base_path('vendor/umpirsky/country-list/data/en/country.php');

    return view('membership.freight-forwarding', compact('countries'));

})->name('membership.freight-forwarding');

Route::get('/search/suppliers', function () {
    $countries = include base_path(
        'vendor/umpirsky/country-list/data/en/country.php'
    );
    return view('search.suppliers', compact('countries'));
})->name('search.suppliers');


Route::get('/search/buyers', function () {
    $countries = include base_path(
        'vendor/umpirsky/country-list/data/en/country.php'
    );

    return view('search.buyers', compact('countries'));
})->name('search.buyers');

Route::get('/create-account', function (Illuminate\Http\Request $request) {

    $countries = include base_path(
        'vendor/umpirsky/country-list/data/en/country.php'
    );

    return view('auth.register', [
        'countries' => $countries,
        'redirect' => $request->query('redirect'),
        'group_type_id' => $request->query('group_type_id'),
    ]);

})->name('freightconnect.register');

Route::get('/legal/external-terms', function () {
    return view('legal.external-terms');
})->name('legal.external-terms');

Route::get('/legal/external-privacy', function () {
    return view('legal.external-privacy');
})->name('legal.external-privacy');

Route::get('/legal/payment-recovery-support', function () {
    return view('legal.payment-recovery');
})->name('legal.payment-recovery');

Route::get('/legal/membership-terms', function () {
    return view('legal.membership-terms');
})->name('legal.membership-terms');

Route::get('/legal/privacy-policy', function () {
    return view('legal.privacy-policy');
})->name('legal.privacy-policy');

Route::get('/login', function (Illuminate\Http\Request $request) {
    return view('auth.login', [
        'redirect' => $request->query('redirect'),
    ]);
})->name('login');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('forgot-password');

Route::get('/reset-password', function () {
    return view('auth.reset-password');
})->name('reset-password');

Route::get('/account', function () {
    return view('account.index');
})->name('account');

// POST METHODS

Route::post('/request-membership/freight-forwarding', [
    ForwardingMemberController::class,
    'store'
])->name('membership.freight-forwarding.store');

Route::post('/trader/register', [TraderController::class, 'store'])
    ->name('trader.register.store');

Route::post('/create-account', [FreightConnectAccountController::class, 'register'])
    ->name('freightconnect.register.submit');

Route::post('/login', [FreightConnectAuthController::class, 'login'])
    ->name('freightconnect.login.submit');


Route::middleware('auth:freightconnect')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('freightconnect.dashboard');

    Route::post('/logout', [FreightConnectAuthController::class, 'logout'])
        ->name('freightconnect.logout');

});