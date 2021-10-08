<?php


// get domain
$domainUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?  "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  $_SERVER['REQUEST_URI'];
$domain_array = explode("=", $domainUrl);
$domainLocale = $domain_array[count($domain_array) - 1];

// get domain
$linkUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];

// get get_text lang
$locale = 'uk_UK';
if ($domainLocale == 'es') {
    $locale = 'es_ES';
} else if ($domainLocale == 'it') {
    $locale = 'it_IT';
} else if ($domainLocale == 'de') {
    $locale = 'de_DE';
} else if ($domainLocale == 'fr') {
    $locale = 'fr_FR';
} else {
    $domainLocale = 'uk';
}

define('LANGUAGES_PATH', $_SERVER['DOCUMENT_ROOT'] . '/langs');
putenv('LC_ALL=' . $locale);
setlocale(LC_ALL, $locale, $locale . '.utf8');
bind_textdomain_codeset($locale, 'UTF-8');
bindtextdomain($locale, LANGUAGES_PATH);
textdomain($locale);

if (!function_exists('mb_ucfirst')) {
    function mb_ucfirst($string)
    {
        return mb_strtoupper(mb_substr($string, 0, 1, 'UTF-8'), 'UTF-8') . mb_substr($string, 1, mb_strlen($string), 'UTF-8');
    }
}
// get get_text lang