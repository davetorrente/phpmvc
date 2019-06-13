<?php
date_default_timezone_set('Asia/Manila');
/* Function for redirect
/*--------------------------------------------------------------*/
function redirect($url)
{
    if (headers_sent() === false) {
        header('Location: ' . $url, true);
    }
    exit();
}
/*--------------------------------------------------------------*/
/* Function for  Readable Make date time
/*--------------------------------------------------------------*/
function makeDate()
{
    return strftime("%Y-%m-%d %H:%M:%S", time());
}
