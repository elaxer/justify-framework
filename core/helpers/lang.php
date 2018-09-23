<?php

use Justify\Components\Lang;

if (!function_exists('lang')) {
	function lang(string $key, $locale = null, string $notFound = 'NOT FOUND'): string
	{
		return Lang::get($key, $locale, $notFound);
	}
}

if (!function_exists('lang_get')) {
	function lang_get(string $key, $locale = null, string $notFound = 'NOT FOUND')
	{
		return Lang::get($key, $locale, $notFound);
	}
}

if (!function_exists('lang_setLocale')) {
	function lang_setLocale(string $locale)
	{
		Lang::setLocale($locale);
	}
}

if (!function_exists('lang_setFallbackLocale')) {
	function lang_setFallbackLocale(string $locale)
	{
		Lang::setFallbackLocale($locale);
	}
}
