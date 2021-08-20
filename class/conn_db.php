<?php
// error_reporting(0);
// if (! defined('BASEPATH')) exit('No direct script access allowed');
	date_default_timezone_set('Asia/Jakarta');
	$mysqliDebug = true;
	define("DBUSER","root");
	define("DBPASS","mysql");
	define("DBNAME","appcalc");
	define("DBSERVER","localhost");
	define("DB_HOST","$_SERVER[HTTP_HOST]");
     $db = @new mysqli(DBSERVER,DBUSER,DBPASS,DBNAME);

    if ($db->connect_errno) {
        echo '<p>There was an error connecting to the database!</p>';
        if ($mysqliDebug) {
            echo $db->connect_error;
        }
        die();
    }

?>