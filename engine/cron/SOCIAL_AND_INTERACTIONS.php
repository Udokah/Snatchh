<?php
ini_set('upload_max_filesize', '3M');
ini_set('post_max_size', '5M');
ini_set('max_input_time', 600);
ini_set('max_execution_time', 600);

/* 
THE FOLLOWING ARE CRON JOBS TO BE
DONE EVERY 5-MINS
FUNCTIONS ARE 
- SEND UNSET INTERACTIONS
- UPDATE STATUS ON SOCIAL NETWORKS (Facebook.com)
*/

// Include requirements //
include('../../inc/conn.php');
include('../fn/lib.php');
include('../fn/fn.php');
include '../../inc/tmhOAuth/tmhOAuth.php';  // twitter poster

$home = 'http://www.snatchh.com/' ;


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

///---> Update social networks
// Post_tweet($tweet) function
// get all unsent interactions

$qry = mysql_query("SELECT item_id, title, price, category FROM sn_listings WHERE status = 'open' AND shared = 'no'");
while($Ad = mysql_fetch_array($qry)){
if($Ad['item_id']){
$item_id = $Ad['item_id'] ;
// generate link for each
$url = $home.form_url_without( $Ad['title'], $Ad['item_id'] , $Ad['category'] ) ;
$tweet = '#Snatchh! '.$url.' '.$Ad['title'].' Price: N'.$Ad['price'] ;
Post_tweet($tweet) ;
mysql_query("UPDATE sn_listings SET shared = 'yes' WHERE item_id = '$item_id'");
}
}


?>