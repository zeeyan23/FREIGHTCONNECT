<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use Umpirsky\Country\CountryRepository;

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