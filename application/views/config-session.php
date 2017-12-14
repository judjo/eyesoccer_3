<?php
function getUserIPConf()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $_SESSION["ip"] = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $_SESSION["ip"] = $forward;
    }
    else
    {
        $_SESSION["ip"] = $remote;
    }

    return $_SESSION["ip"];
}


$_SESSION["ip"] = getUserIPConf();
?>