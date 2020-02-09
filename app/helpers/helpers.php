<?php

function is_active($routeName)
{
    if ((request()->segment(2) !== null && request()->segment(2) == $routeName) || (request()->segment(2) == null && request()->segment(1) == $routeName)) {
        return 'active';

        //return request()->segment(2) !== null && request()->segment(2) !== $routeName ? 'active' : '';

    }

}

function getYoutubeEmbedUrl($url){
    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);

    return isset($match[1]) ?  $match[1] : null;

}

