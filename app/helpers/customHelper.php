<?php

function isActive($urls)
{
    $active=null;

    if (is_array($urls)) {
        foreach ($urls as $url) {
            if (Route::currentRouteName()==$url) {
                $active='active';
            }
        }
    } else {
        if (Route::currentRouteName()==$urls) {
            $active='active';
        }
    }
    return $active;
}
function alert($status,$message)
{
    if ($status=='success') {
        return ["icon"=>$status,"title"=>"Yeay!! 🎉","text"=>$message];
    } else {
        return ["icon"=>$status,"title"=>"Opps 😭","text"=>$message];
    }
    
}