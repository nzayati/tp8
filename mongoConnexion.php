<?php
try{
$m = new MongoClient();
 //echo "Connection to database Successfull!";echo"<br />";

$db = $m->GiantMix;
//echo "Database loginreg selected";
$collection = $db->users; 
//echo "Collection userdata Selected Successfully";
}
catch (Exception $e){
    die("Error. Couldn't connect to the server. Please Check");
}
   session_start();
?>