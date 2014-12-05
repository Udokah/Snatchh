<?php

// function to generate meta keywords
function  Generate_meta_keywords($string){
	$keywords = implode(' , ' , (array_unique(explode('-', GenerateUrl ($string)))));
	return $keywords;
}

/// Notify user when an ad is posted
function Notify_Posted_Ad( $email , $title, $id , $category , $token ){
	$home =  'http://www.snatchh.com/' ;
	$link = form_url_without($title, $id , $category) ;
	$viewlink = $home.$link ;   // link to view post
	$editlink = $home.'manage/'.$token ;  // link to edit post
	$message = PostedAdNotificationMsg($viewlink , $editlink , $title) ;  /// compose messge
	$subject = "Snatchh! Notification - Ad Published " ;
    $sendmail = mail_user($email,$subject,$message) ;
	return $sendmail ;
}

// compose message for just published ad
function PostedAdNotificationMsg($viewlink , $editlink , $title ){
	$raw = "<p style=\"font-size:20px; line-height:30px;\">Hello, <br>
This is to notify you that your Ad has been published. To view your Ad anytime use the link:<br>
<a style=\"display:inline-block; padding:5px; background-color:#fff;\" href='$viewlink'>View - \"$title\"</a><br>
To edit your ad anytime, visit the link below <b>(PC ONLY)</b><br>
<a style=\"display:inline-block; padding:5px; background-color:#fff;\" href='$editlink'>Edit - \"$title\"</a><br>
You will be notified by email if anyone wants to snatchh your item. <br>
Faster Sales Tip:
Visit your ad and share it on facebook and twitter with the share button.<br>" ;

$message = Add_template($raw) ;
	return $message ;
}

/// Snatchh item
function SNATCHH_ITEM($email,$phone,$item_id){
$listing =  GET_DATA( 'title, category, email', 'sn_listings', "item_id = '$item_id'") ;
$message = SnatchhItemNotificationMsg($email,$phone,$listing,$item_id) ;
$subject = 'Snatchh! Request' ;
$token = get_random() ;
$q =mysql_query( "INSERT INTO sn_interactions SET token='$token', email='$email', phone='$phone',  item_id='$item_id'" );
$sendmail = mail_user( $listing['email'] , $subject , $message ) ; // mailuser
if( $sendmail == true ){
	mysql_query("UPDATE sn_interactions SET status = 'sent' WHERE token = '$token'");
}
return $sendmail ;
}


/// compose snatch item notification message
function SnatchhItemNotificationMsg($email,$phone,$listing,$item_id){
	$title = $listing['title'] ;
	$category = $listing['category'] ; 
	$link = form_url_without($title, $item_id , $category) ;
	
	$raw = "<p style=\"font-size:20px; line-height:30px;\">Hello <br>
Someone has requested to snatchh your item listed on our website: <a href='http://www.snatchh.com/'>www.snatchh.com</a> with the title: <br>
<a style=\"display:inline-block; padding:5px; background-color:#fff;\" href='http://www.snatchh.com/$link'>\"$title\"</a><br>
Contact this person with the following details: <br>
Phone: $phone <br> email: $email<br>
<br>
If this item has already been sold or is not available or is later sold, please visit the link we gave you on posting to remove the item. <br><br>
Regards <br>
Snatchh Team <br>
</p>" ;

$message = Add_template($raw) ;
	return $message ;
}

/// function to add template to message
function Add_template($message){
	$header = "<div style=\"width:100%; padding:10px;\" >
<h2 style=\"display:block; text-align:left; padding-left:20px; font-size:35px; font-family: 'PT Sans Narrow',Calibri,'Myriad Pro',Tahoma,Arial; font-weight:bold; padding-bottom:20px; border-bottom:1px solid #4D90FE;\"><span style=\"background-color:#4D90FE; padding:3px; color:#FFF\">Sn</span><label style=\"background-color:#fff; color:#4D90FE\">atchh!</label><b style=\"font-weight:normal; font-size:25px;\">&reg;</b></h2>
<div style=\"background-color:#F2F2F2; padding:15px; font-family: 'PT Sans Narrow',Calibri,'Myriad Pro',Tahoma,Arial; color:#333; margin-top:-28px;\">" ;

$footer = "</div>
</div>" ;

$new = $header.$message.$footer ;
return $new ;
}

/// Load similar items in the same category // get first 20
function LOAD_SIMILAR_ITEMS($category,$item_id){
$q = "SELECT title , item_id , category FROM sn_listings WHERE status = 'open' AND spam = 'no' AND category = '$category' AND item_id != '$item_id' ORDER BY item_id DESC LIMIT 0 , 20" ;

$qry = mysql_query($q) or die (mysql_error());
$return = array();
$i = 0 ;

while($r = mysql_fetch_array($qry)){
$href = form_url($r['title'],$r['item_id'],$r['category']);
$return[$i] = "<li><a href='$href'>".$r['title']."</a></li>" ;
$i++ ;
}

return $return ;
}

/// search Listings ::: Very important function
function  SEARCH_LISTINGS($count,$category,$phrase){
global $Limit ;
///Edit : where spam = no ;; spam posts should not be displayed
$q = "SELECT title,item_id,price,category,pictures FROM sn_listings WHERE spam = 'no' AND status = 'open' " ;

if($category !== '0' AND $category !== 'all'){
	$q .= " AND category = '$category' " ; 
}

$q .= " AND MATCH ( title , description , price) AGAINST ('".$phrase."')";

$q .= " ORDER BY item_id DESC LIMIT $count , $Limit" ;

$qry = mysql_query($q) or die (mysql_error());
$return = array();
$i = 0 ;

while($r = mysql_fetch_array($qry)){

$href = form_url($r['title'],$r['item_id'],$r['category']);
$image = Pic_front_pic($r['pictures']) ; // pic a front picture

$return[$i] = "<a href='$href' class='field'><div class='category'>".$r['category']."</div><table class='image'><tr><td>".$image."</td></tr></table><label class='title'>".$r['title']."<div class='price'>".$r['price']."</div></a>" ;

$i++ ;
}
	
	return $return ;
}

/// Load Listings ::: Very important function
function  LOAD_LISTINGS($count,$category){
global $Limit ;
///Edit : where spam = no ;; spam posts should not be displayed
$q = "SELECT title,item_id,price,category,pictures FROM sn_listings WHERE spam = 'no' AND status = 'open'" ;

if($category !== 'all'){
	$q .= " AND category = '$category' " ; 
}

	$q .= " ORDER BY item_id DESC LIMIT $count , $Limit" ;

$qry = mysql_query($q) or die (mysql_error());
$return = array();
$i = 0 ;

while($r = mysql_fetch_array($qry)){

$href = form_url($r['title'],$r['item_id'],$r['category']);
$image = Pic_front_pic($r['pictures']) ; // pic a front picture

$return[$i] = "<a href='$href' class='field'><div class='category'>".$r['category']."</div><table class='image'><tr><td>".$image."</td></tr></table><label class='title'>".$r['title']."<div class='price'>".$r['price']."</div></a>" ;

$i++ ;
}
	
	return $return ;
}

/// pic an image that exists and use as front page
function Pic_front_pic($img){
	$imgFolder = 'engine/uploads/' ;
	$imgTemp = '../uploads/' ;
	if (strpos($img,' || ') !== false) {
	$PIC = explode(' || ',$img);
	$i = 0 ;
	$exist = false ;
	$pic = $return = $path = '' ;
	while( $exist == false AND $i < 3){
	if(file_exists($imgTemp.$PIC[$i])){
	$exist = true ;
	$pic = $i ; // choose the first image that exists
	}
	$i++ ;
	}
	
	if( $exist == false ){ /// then image was not found !!
	$return = '' ;
	}
	else{
	$path = $imgFolder.$PIC[$pic] ;
	$return = "<img src='$path' alt='snatchh item' />" ;
	}

	}
	else{
	$path = $imgFolder.$img ;
	$return = "<img src='$path' alt='snatchh item' />" ;
	}
	
	return $return ;
}

/// form Ulr for listing
 function form_url($title, $id , $category){
	 $title = GenerateUrl ($title) ; /// get title
	 $url = './'.$id.'/category/'.$category.'/'.$title.'/' ;
	 return $url  ;
 }
 
 /// Form url without ./
  function form_url_without($title, $id , $category){
	 $title = GenerateUrl ($title) ; /// get title
	 $url = $id.'/category/'.$category.'/'.$title.'/' ;
	 return $url  ;
 }

/// GET DATA FROM TABLE
function GET_DATA($columns,$table,$where){

$q = "SELECT $columns FROM $table";
$q2 = "SELECT $columns FROM $table";
$all = array();

if($where !== 0){
	$q .= " WHERE $where" ; 
	$q2 .= " WHERE $where" ; 
}

if(mysql_query($q)){
$qry = mysql_query($q2) ;
$displaydata = mysql_fetch_array($qry);
if( is_array($displaydata)){
foreach($displaydata as $key=>$value){
	$all[$key]  = $value ;
      }
   }
}

return $all ;
}

/// Prepare output for ajax
function prep($data){
return '$(function(){'.$data.'});' ;
}

/// Process images
function Process_Image($pictures,$pathtosave,$imgsource){
	$PIC = explode(' || ' , $pictures);
	foreach($PIC as $img){
		if(file_exists($imgsource.$img)){
		/// first resize image
   $compImg = new SimpleImage();
   $compImg->load($imgsource.$img);
   $compImg->scale(50);  /// scale to 75%
   //$compImg->watermark('../../img/logo.png');  /// add watermark
   $compImg->save($pathtosave.$img);
		}
	}
	/// delete old images
		foreach($PIC as $img){
		if(file_exists($imgsource.$img)){
			unlink($imgsource.$img);
		}
		}
}

// function to get numeric price after removing the comma's
function get_numeric_price($price){
$break = explode(",",$price);
$real = '' ;
foreach($break as $pieces){
$real .= $pieces ;
}
return $real;
}

?>