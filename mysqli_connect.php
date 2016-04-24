<?php
DEFINE ('DB_HOST', 'localhost'); 
DEFINE ('DB_USER', 'murphytk_hs'); //Database User Name
DEFINE ('DB_PASSWORD', 'hs123'); //Database User Password
DEFINE ('DB_NAME', 'murphytk_highscore'); //Database Name

// connects to database
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to SOIS MySQL server with error: ' . mysqli_connect_error());

?>