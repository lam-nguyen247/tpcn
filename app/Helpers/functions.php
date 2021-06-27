<?php

if (!function_exists('shorter')) {
    function shorter($text, $chars_limit)
    {
        if (strlen($text) > $chars_limit)
        {
            $new_text = substr($text, 0, $chars_limit);
            $new_text = trim($new_text);
            return $new_text . "...";
        }
        else
        {
            return $text;
        }
    }
}

if (!function_exists('getProductDescription')) {
    function getProductDescription($text)
    {
        return new \Illuminate\Support\HtmlString($text);
    }
}

if (!function_exists('defaultImage')) {
    function defaultImage()
    {
        return url('/images/home/default-placeholder.png');
    }
}

