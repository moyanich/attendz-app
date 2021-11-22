<?php
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

if(!function_exists('hyphenate')) {
    function hyphenate($str) {
        return implode("-", str_split($str, 3));
    }
}

if(!function_exists('format_date')) {
    function format_date($date) {
        return Carbon::parse($date)->format('Y-m-d');
    }
}

