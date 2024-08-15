<?php
use App\Ads;
function dd($args)
    {
        echo "<pre>";
        var_dump($args);
        echo "</pre>";
        die();
    }

    function getAds(){
        return (new Ads())->getAds();
    }