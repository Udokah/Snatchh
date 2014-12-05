<?php
session_start();

ini_set('upload_max_filesize', '3M');
ini_set('post_max_size', '5M');
ini_set('max_input_time', 600);
ini_set('max_execution_time', 600);

if(!isset($_POST['action'])){
echo "Access Denied" ;
exit();
}

// Include requirements //
include('../../inc/conn.php');
include('../fn/lib.php');
include('../fn/fn.php');
include("../fn/simpleimage.php"); 

$_POST = sanitize($_POST);  /// clean every damn thing up
$Limit = 12 ; /// Data Limit

$action = $_POST['action'] ;

//// post ad //
if( $action == 'post-an-ad'){
extract($_POST);
$token = get_random() ;
$price_int = get_numeric_price($price);  // get numeric price with no comma's

$q = "INSERT INTO sn_listings SET token='$token', category='$category', title='$title', description='$description', pictures='$pictures',  price_int='$price_int', price='$price', phone='$phone', email='$email'" ;

if(mysql_query($q)){
       Process_Image($pictures,'../uploads/','../temp/') ; ///resize and watermark images
	   // generate redirect link get title and item_id
	   $query = GET_DATA(' item_id ' , ' sn_listings ' , " token = '$token' ") ;
	   $url = GenerateUrl ($title)  ; 
	   $link = './'.$query['item_id'].'/category/'.$category.'/'.$url.'/' ;
	   $item_id = $query['item_id'] ;
	  /// send mail notification
	  $notify = Notify_Posted_Ad( $email , $title, $item_id , $category , $token ) ;
	  $ret = " var Link  = '$link' ;  var item_id = '$item_id' ; FinalStep( Link , item_id ) ;  ";
     }
	 else{
		 $ret = "
		 	var err = 'Unable to post Ad, please try again later';
       new Messi( err , {title: 'Post failed' , modal: true , titleClass: 'error', buttons: [{id: 0, label: 'Close', val: 'X'}]});
		 " ;
	 }
	
	   echo prep($ret) ;
      exit();
}

/// Delete an ad
if( $action == 'delete-Ad'){
	$token = $_POST['token'] ;
    if(mysql_query("UPDATE sn_listings SET status = 'deleted' WHERE token = '$token'")){
		$ret = "DeleteSuccess();" ;
	}
	else{
		$ret = "DeleteError();" ;
	}
	echo prep($ret) ;
      exit();
}

/// send feedback
if( $action == 'send-feedback'){
$from = $_POST['email'] ;
$ret = '' ;
$to = 'udswagz@gmail.com' ;
$message = Add_template( '<p>'.$_POST['feedback'].'</p>' ) ; // spice up with temlate
$subject = "Feedback From users" ;
$sendmail = custom_mailer($to,$subject,$message,$from) ;
if($sendmail == true){
	$ret = "mailsent()" ;
}
else{
	$ret = "mailError()" ;
}
	  echo prep($ret) ;
      exit();
}

/// snatch an item
if( $action == 'snatchh-item'){
$email = $_POST['email'] ;
$phone = $_POST['phone'] ;
$item_id = $_POST['item_id'] ;	
$snatchh = SNATCHH_ITEM($email,$phone,$item_id) ;
echo $snatchh ;
exit();
}

/// Load similar items
if( $action == 'Load-similar-items'){

 $category = $_POST['category'];
 $item_id = $_POST['item_id'];
 
 $DATA = LOAD_SIMILAR_ITEMS($category,$item_id);
 $html = $ret =  '' ;
 
 if( count($DATA) !== 0){
	 foreach($DATA as $value ){
		  $html .= $value ;
	 }
	 
	 $ret = "
	 var html = \"$html\" ;
	 LoadSimilar(html) ;
	 " ;
 }
	
	  echo prep($ret) ;
      exit();
}

/// search listings
if( $action == 'SearchListings'){
	  $count = $_POST['count'];
	  $category = $_POST['category'];
	  $phrase = $_POST['phrase'];
	  $updateDiv = $_POST['updateDiv'];
	   
	  $DATA = SEARCH_LISTINGS($count,$category,$phrase) ;
	  
	  $html = '' ;
	  foreach($DATA as $value){
		  $html .= $value ;
	  }
	  
	  $next =  $count + $Limit ;
	  
	  // Incase of empty results
	  if( count($DATA) == 0){
		  // if first load i.e new category is viewed
		  if($count == 0){
	$html  = "<center class='noresults'>No results<label><br>No items for the the search phrase ' $phrase' was found !</label></center>" ;
		  }
		  else{
			  $html  = " <hr>" ;
		  }
	  }
	  
	  $ret = "	$('$updateDiv').append(\"$html\") ;  $('#showmore').attr('data-count','$next');" ;
	   
	   if( count($DATA) < $Limit ){
		   $ret .= "$('.showMore').remove() ;" ; 
	   }
	   
	  echo prep($ret) ;
      exit();
}

/// Post Edit - Remove uploaded image
if( $action == 'remove-uploaded-img'){
	$img = $_POST['imgFile'] ;
	$imgfile = '../uploads/'.$img ;
	if(file_exists($imgfile)){
		unlink($imgfile); // delete the image
	}
      exit();
}

/// remove a temporay image that has just been uploaded
if( $action == 'remove-temp-img'){
	$img = $_POST['imgFile'] ;
	$imgfile = '../temp/'.$img ;
	if(file_exists($imgfile)){
		unlink($imgfile); // delete the image
	}
      exit();
}

/// confirm that a listing is not spam
if( $action == 'Not-spam-confirm'){
	$item_id = $_POST['item_id'] ;
	mysql_query("UPDATE sn_listings SET spam = 'no' WHERE item_id = '$item_id'");
      exit();
}

/// Load listings
if( $action == 'LoadLIstings'){
	  $count = $_POST['count'];
	  $category = $_POST['category'];
	  $updateDiv = $_POST['updateDiv'];
	   
	  $DATA = LOAD_LISTINGS($count,$category) ;
	  
	  $html = '' ;
	  foreach($DATA as $value){
		  $html .= $value ;
	  }
	  
	  $next =  $count + $Limit ;
	  
	  // Incase of empty results
	  if( count($DATA) == 0){
		  // if first load i.e new category is viewed
		  if($count == 0){
	$html  = "<center class='noresults'>No posts yet !<br> <label>be the first person to place an Ad in this category</label><br><a href='./place-free-ad'>Click here Now </a></center>" ;
		  }
		  else{
			  $html  = " <hr>" ;
		  }
	  }
	  
	  $ret = "	$('$updateDiv').append(\"$html\") ;  $('#showmore').attr('data-count','$next');" ;
	   
	   if( count($DATA) < $Limit ){
		   $ret .= "$('.showMore').remove() ;" ; 
	   }
	   
	  echo prep($ret) ;
      exit();
}

/// Check for spam when saving a post that is to being edited
if( $action == 'check-edit-Spam'){
      extract($_POST);
      
$query = GET_DATA(' title , description ' , ' sn_listings ' , "token =! '$token' AND  status = 'open' AND title = '$title' OR description = '$description'") ;

if(isset($query['title']) or isset($query['description'])){
$ret = " NotifySpam('$token') ; " ;
}
else{
$ret = " SaveChanges(); " ;
}
	  
	  echo prep($ret) ;
      exit();
}

/// Check for spam
if( $action == 'checkSpam'){
      extract($_POST);
      
$query = GET_DATA(' title , description ' , ' sn_listings ' , "status = 'open' , title = '$title' OR description = '$description' ") ;

if(isset($query['title']) or isset($query['description'])){
$ret = "
new Messi('Title or description matches a similar content on server', {title: 'Spam Suspicion', titleClass: 'anim error', buttons: [{id: 0, label: 'Close', val: 'X'}]});
CorrectSpam();
" ;
}
else{
$ret = "
PostFreeAd()
" ;
}
	  
	  echo prep($ret) ;
      exit();
}

////----- SAVE UPDATE CHANGES ----/////
if( $action == 'save-edit-changes'){
extract($_POST);
$price_int = get_numeric_price($price);  // get numeric price with no comma's
$lastupdate = date('Y-m-d H:i:s') ; /// get current time

$q = "UPDATE sn_listings SET category='$category', title='$title', description='$description', pictures='$pictures',  price_int='$price_int', price='$price', phone='$phone', email='$email' , lastupdate='$lastupdate' WHERE token='$token'" ;

if(mysql_query($q)){
       Process_Image($pictures,'../uploads/','../temp/') ; ///resize and watermark images
	   // generate redirect link get title and item_id
	   $query = GET_DATA(' item_id ' , ' sn_listings ' , " token = '$token' ") ;
	   $url = GenerateUrl ($title)  ; 
	   $link = './'.$query['item_id'].'/category/'.$category.'/'.$url.'/' ;
	   $item_id = $query['item_id'] ;
	  $ret = " var Link  = '$link' ;  var item_id = '$item_id' ; FinalStep( Link , item_id ) ;  ";
     }
	 else{
		 $ret = "
		 	var err = 'Unable save changes, please try again later';
       new Messi( err , {title: 'Update Failed' , modal: true , titleClass: 'error', buttons: [{id: 0, label: 'Close', val: 'X'}]});
		 " ;
	 }
	
	   echo prep($ret) ;
      exit();
}

?>