<?php

namespace App\Support;

class InternalRedirect
{
    public static function isValid(?string $url): bool
    {
        if (!$url) {
            return true;
        }

        $appUrl = config('app.url');

        $appHost = parse_url($appUrl, PHP_URL_HOST);
        $redirectHost = parse_url($url, PHP_URL_HOST);

        if (!$appHost || !$redirectHost) {
            return false;
        }

        return strtolower($appHost) === strtolower($redirectHost);
    }
}