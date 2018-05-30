<?php
if (!defined('HOSTNAME')) define('HOSTNAME', 'localhost');
if (!defined('USERNAME')) define('USERNAME', 'root');
if (!defined('PASSWORD')) define('PASSWORD', '');
if (!defined('DATABASE')) define('DATABASE', 'mysmartopinion');


//define("HOSTNAME", "localhost");
//define("USERNAME", "root");
//define("PASSWORD", "");
//define("DATABASE", "mysmartopinion");

$dab = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
if ($dab->connect_error) {
    die ("Error while trying to connect to database: " . $dab->connect_error);
}
return $dab;
?>