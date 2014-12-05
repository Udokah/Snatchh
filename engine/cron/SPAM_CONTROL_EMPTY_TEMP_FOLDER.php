<?php

ini_set('upload_max_filesize', '3M');
ini_set('post_max_size', '5M');
ini_set('max_input_time', 600);
ini_set('max_execution_time', 600);

/* 
THE FOLLOWING ARE CRON JOBS TO BE
DONE BY 12AM EVERYDAY 
FUNCTIONS ARE 
- DELETE SPAM POSTS
- EMPTY THE /TEMP/ DIRECTORY
*/

// Include requirements //
include('../../inc/conn.php');
include('../fn/lib.php');
include('../fn/fn.php');
include '../../inc/tmhOAuth/tmhOAuth.php';  // twitter poster

$home = 'http://www.snatchh.com/' ;

///---> Delete Spam Posts From Database
mysql_query("DELETE FROM sn_listings WHERE spam='yes'");  // remove all spam

///---> Delete all files in the /temp/ directory
$directory = '../temp/';
$files = glob($directory.'*.*');
foreach($files as $img){
if(file_exists($img)){
unlink($img);
}
}

///---> Send unsent interactions
$q = mysql_query("SELECT * FROM sn_interactions WHERE status='usent'");
while($r = mysql_fetch_array($q)){
if($r['token']){
extract($r) ;
$listing =  GET_DATA( ' title , category , email ' , 'sn_listings'  , "item_id = '$item_id'") ;
$message = SnatchhItemNotificationMsg($email,$phone,$listing,$item_id) ;
$subject = 'Snatchh! Request' ;
}
$sendmail = mail_user( $listing['email'] , $subject , $message ) ;
if( $sendmail == true ){
	mysql_query("UPDATE sn_interactions SET status = 'sent' WHERE token = '$token'");
}
}


?>