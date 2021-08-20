<?php
$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://" . $_SERVER['HTTP_HOST'];
define("SITE_URL", $_SERVER['HTTP_HOST']);
define("SITE_API", $base_url);
define("URL_API", $base_url."/modul/get/");
define("URL_HITUNG", $base_url."/potong/get/");
define("LIMIT", 8);
define("VALUE", 500);