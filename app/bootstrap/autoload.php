<?php

include_once "../app/config/config.php";

include_once "../app/helper/url_helper.php";


spl_autoload_register(function($file) {

    $filename = __DIR__ . '/../classes/' . $file . '.php';

    if(file_exists($filename)) {
        require_once $filename;
    }
});