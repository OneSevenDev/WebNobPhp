<?php

// Database settings
// database hostname or IP. default:localhost
// localhost will be correct for 99% of times

define("HOST", "localhost");
define("DBUSER","biosegur_admin");// "biosegur_root");
define("PASS", "bio.intranetbd");//root_2011");
define("DB","biosegur_intranet");//biosegur_bioseg");

############## Make the mysql connection ###########

$conn = mysql_connect(HOST, DBUSER, PASS);
mysql_query("SET NAMES 'utf-8'");
if (!$conn)
{
    // the connection failed so quit the script
    die('Could not connect !<br />Please contact the site\'s administrator.');
}
$db = mysql_select_db(DB);
if (!$db)
{
    // cannot connect to the database so quit the script
    die('Could not connect to database !<br />Please contact the site\'s administrator.');
}


?>
