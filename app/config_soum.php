<?php
if (in_array ($this_host, $local_IP))
{
    define('HOST', 'localhost');
	define('USER', 'root');
	define('PASS', '');
	define('DBNAME', 'karan_soum');
}
else
{
define('HOST', 'localhost');
	define('USER', 'karan_soum');
	define('PASS', 'gkhhW7lRAx');
	define('DBNAME', 'karan_soum');
}
?>
