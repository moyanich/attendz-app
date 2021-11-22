<?php

use Illuminate\Support\Facades\Auth;

if(!function_exists('hyphenate')) {
    function hyphenate($str) {
        return implode("-", str_split($str, 3));
    }
}

