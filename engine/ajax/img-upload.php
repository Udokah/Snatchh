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
include('../fn/simpleimage.php'); 

$_POST = sanitize($_POST);  /// clean every damn thing up
$Limit = 12 ; /// Data Limit

$action = $_POST['action'] ;

/// Upload images
if( $action == 'temporary-upload'){
	$max_size = 3145728 ; /// 3MB
	$path = '../temp/' ;
	$image = $_FILES['image'] ;
	
	$name =  $image['name']  ;
	$size =  $image['size']  ;
	$tmp_name =  $image['tmp_name']  ;
	
	unset($image); // remove large variable to optimize script
	
	 	// Check if image exceeds file size
	if($size > $max_size){
    $ret = '
		var err = \'Your image exceeds the file size\';
       new Messi( err , {title: \'Image size\' , modal: true , titleClass: \'error\', buttons: [{id: 0, label: \'Close\', val: \'X\'}]}); ' ;
	echo prep($ret) ;
	exit();
	}
	
		/// Unset Variables to free memory
	unset($max_size,$size);
		/// Upload Images
	$doUpload = Upload_image( $name , $tmp_name , $path) ;
	
	unset($name,$tmp_name,$path); // unset useless variable
	
	if($doUpload  == false){
		$ret = "
		var err = 'Unable to upload image';
       new Messi( err , {title: 'Sorry !' , modal: true , titleClass: 'error', buttons: [{id: 0, label: 'Close', val: 'X'}]});
		" ;
	 }
	 else{
		 $ret = "
		 var html = \"<li><img src='engine/temp/$doUpload' data-name='$doUpload' alt='Uploaded image' /><br><a class='removeImage' href='$doUpload'>remove</a></li>\" ;
		 $('.uploaded').append(html);
		 var count = Number($('.file').attr('data-count')); 
          count++ ;
		  if(count == 3){
			  $('#imgFormHolder').fadeOut('fast');
		  }
		  $('.file').attr('data-count',count) ;
		 " ;
  	 }
	 
	 echo prep($ret) ;
      exit();
}

?>