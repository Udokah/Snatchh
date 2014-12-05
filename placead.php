<link rel='icon'href='img/logo.png'>
<?php 
ob_start(); 
$title = 'Place Free Ad - Snatchh!' ;
$Keywords = "free Ad," ;
$Description = "Place a Free Ad, its free and simple , no registeration required." ;
$Meta = "" ;
?>

<?php include('inc/header.php'); ?>
<script type="text/javascript" src="js/jquery.form.min.js"></script>

    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript">

$(function() {
    $('#PlaceAd ').tooltipster('disable') ;
});

</script>

<style type="text/css">
.wrapper  #PlaceAd , .wrapper #or{
	visibility:hidden;
}

.wrapper .products h3{
	display:inline-block !important;
	margin-bottom:20px;
	background-color:#d14836 !important;
	padding:6px 40px !important;
	text-transform:capitalize !important;
}

.wrapper .products .section p{
	color:#111 !important;
}

.wrapper .section{
	background-color:;
}

.wrapper #simple{
	display:inline-block;
	padding:5px;
	font-size:22px;
	background-color:#EEB8B0;
	margin-top:2px;
	color:#000;
}

.wrapper .step-header{
	display:block;
}

.wrapper .section ul , .section ul li {
	margin:0 !important;
	padding:0 !important;
}

.wrapper .step-header li{
	background-image:none !important;
	display:inline !important;
	margin-top:0 !important;
}

.wrapper .step-header li a{
	display:inline-block !important;
	padding:10px 30px;
	margin-top:-9px !important;
	margin-right:10px;
	background-color:#919191;
	font-size:30px;
    font-family: 'PT Sans Narrow',Calibri,'Myriad Pro',Tahoma,Arial;
	text-transform:capitalize;
	width:250px;
	color:#fff;
	font-weight:bold;
	text-shadow: 0 1px #111 ;
}

.wrapper .step-header li .on{
	    border:2px solid #ccc;
		border-bottom:none;
		background-color:#F2F2F2;
		color:#333;
		text-shadow: 0 2px rgba(255,255,255,0.9);
}

.wrapper .step-header li a:after{
	content: '\00BB' ;
	margin-left:140px;
	font-size:45px;
}

.wrapper .tabsholder{
	display:block;
	padding:6px;
	background-color:#F2F2F2;
	border-top:none !important;
	border:2px solid #ccc;
	width:946px;
	min-height:400px;
}

.wrapper .tabsholder > .tabs{
	position:;
}

.wrapper .tabsholder .tabs table{
	margin-top:10px;
	margin-left:180px;
}

.wrapper .tabsholder .tabs table tr td{
	padding:5px;
}

.wrapper .tabsholder .tabs label{
	display:inline-block;
	font-size:30px;
	text-transform:capitalize;
	color:#333;
}

.wrapper .file{
	cursor:pointer !important;
	padding:10px 10px;
	font-family:Verdana, Geneva, sans-serif, cursive;
	border:1px solid #ddd;
	font-size:17px;
	color:#333;
	background-color:#fff;
	width:500px;
	text-shadow:none;
	text-transform:none;
	-webkit-transition: box-shadow 250ms ease-out;
   -moz-transition: box-shadow 250ms ease-out;
  -o-transition: box-shadow 250ms ease-out;
}

.wrapper .tabsholder .tabs label span{
	font-size:20px;
	display:inline-block;
	text-transform:lowercase;
	margin-top:10px;
	margin-left:6px;
	color:#111;
}

.wrapper .tabs .textbox{
	font-family:Verdana, Geneva, sans-serif !important;
}

.wrapper .tabs .textarea{
		height:180px
}

.wrapper .tabs .textbox:focus, .wrapper .tabs .textarea:focus{
		-moz-box-shadow: 0 0 10px 0.7px #4D90FE !important ;
        -webkit-box-shadow: 0 0 10px 0.7px #4D90FE !important ;
        box-shadow: 0 0 10px 0.7px #4D90FE  !important;
}

 .button{
		padding:14px 63px;
		margin-top:10px;
}

input[disabled=disabled] ,  input[disabled=disabled]:hover{
		background-color:#E49387 !important;
		color:#333;
}

.wrapper .tabs .ui-select{
	background-color:#fff;
	width:500px;
	padding:0 !important;
	margin: 0 !important;
	margin-top:10px !important;
	margin-bottom:10px !important;
	border-right:none !important;
}

.wrapper .tabs .ui-select label{
		padding:0 !important;
	margin: 0 !important;
}

.wrapper .tabs .ui-select i label{
	color:#666 !important;
	font-size:19px !important;
	display:inline-block;
	padding:9px !important;
	font-family:Verdana, Geneva, sans-serif !important;
}

.wrapper .tabs .ui-select i span{
margin-right:10px !important;
background-position:right 13px !important;
height:29px !important;
}

.wrapper .tabs .ui-select ul{
margin-top:9px !important;
margin-left:-1px !important;
border-top:none !important;
width:500px !important;
}

.wrapper .tabs .ui-select ul li{
	background-image:none !important; 
}

.wrapper input[type=checkbox] {
    display:none;
}

.wrapper .checkbox{
	display:inline-block;
}

.wrapper .checkbox b{
	display:inline-block;
	font-size:20px !important;
	color:#111 !important;
	margin-top:13px;
	font-weight:normal !important;
}

.wrapper .checkbox b a{
	color:#111;
	text-decoration:underline;
}

.wrapper input[type=checkbox] + label span {
    display:inline-block;
    width:30px;
    height:30px;
    margin:-1px 4px 0 0;
    vertical-align:middle;
    cursor:pointer;
	border:1px solid #4D90FE;
	background-color:#fff;
}

.wrapper input[type=checkbox]:checked + label span {
    background:url(img/check.png) center center no-repeat #FFF;
}

 #step3Form ,  #step2Form,  #step4Form{
	display:none;
}

.wrapper #price{
background-image:url(img/naira.png);
background-repeat:no-repeat;
background-position:10px center;
padding-left:30px;
}

.wrapper .counter{
	display:inline-block;
	font-size:16px;
	color:#000;
    font-weight:bold;
	margin-top:4px;
	margin-left:6px;
}

.wrapper .uploaded{
	display:inline;
}

.wrapper .uploaded li{
	display:inline-block !important;
	background-image:none !important;
}

.wrapper .uploaded li img{
	display:inline-block !important;
	padding:10px !important;
	margin-right:30px !important;
	margin-top:20px;
	border:1px solid #ddd;
	background-color:#fff;
	height:84px !important;
	width:84px !important;
}

 #imgUp{
	margin-top:10px;
	margin-bottom:4px;
	font-size:16px;
	font-family:Tahoma, Geneva, sans-serif;
	color:#333 !important;
	font-weight:bold;	
	display:none;
}

#finalLoader{
	margin-top:2px;
	margin-left:6px;
	display:inline-block;
	padding:5px;
	background-color:#fff;
	border-radius:5px;
}

#step4Form{
	padding:30px ;
	padding-top:40px;
	text-align:center;
}

#step4Form table{
	margin:0 !important;
	padding:0 !important;
	margin:5px auto !important;
}

#step4Form table tr td{
	text-align:center;
	padding:9px 15px !important;
	vertical-align:middle !important;
}

#AdLink{
	font-size:19px;
}

.removeImage{
	display:inline-block;
	border:1px solid #ddd;
	width:100px;
	margin-left:-30px !important;
	background-color:#fff;
	color:#F00;
	font-size:14px;
}
</style>

<script type="text/javascript">

$(document).ready(function() {
	$('#finalLoader').hide();
	
	/// delete image from temp folder
	$('body').on('click', '.removeImage' , function(e){
		e.preventDefault();
		var img = $(this).attr('href');
		var count = Number($('.file').attr('data-count'));
		/// show hidden file form back
		if( count == 3){
			$('#imgFormHolder').fadeIn('fast');
		}
		count--;
		$('.file').attr( 'data-count' , count ) ;  /// Update image counter
		var delData = { imgFile : img , action : 'remove-temp-img'} ;
		$(this).parent('li').fadeOut('fast', function(){
		$(this).remove();
		});
		$.post('engine/ajax/server.php', delData );
	});

function goToByScroll(id){
      // Remove "link" from the ID
    id = id.replace("link", "");
      // Scroll
    $('html,body').animate({
        scrollTop: $("#"+id).offset().top},
        'slow');
}

goToByScroll('footer');  

	$('.step-header a').click(function(e){
		e.preventDefault();
		});
		
		/// word counter 
  $('#description').on('keyup', function(e){
  var count = $(this).val().length;
  var max = 300 ;
  var update = max - count ;
  // write text to counter
  $('.counter').html(update + ' characters left');
  });
	
	$('#step1Form').on('submit',function(e) {
     e.preventDefault();
	 
	 $(this).find('.req').each(function(){
		var message = $(this).attr('data-alert');
		var title = 'wait !!!'
		 if($(this).val() == ''){
		 $(this).focus();
	 new Messi( message , {title: title , modal: true , titleClass: 'warning', buttons: [{id: 0, label: 'Close', val: 'X'}]});
	      exit();
		 }
	 }); /// end of empty fields checking
	 
	 var email = $.trim($('#email').val());
	 var phone = $.trim($('#phone').val());
	 var price = $.trim($('#price').val());
	 
	 if(!Valid_email(email)){
var emMs = "your email address ' " + email + " ' appears to be invalid" ; ;
   new Messi( emMs, {title: 'Email error' , modal: true , titleClass: 'warning', buttons: [{id: 0, label: 'Close', val: 'X'}]});
	  exit();
	 }
	 
	 	 if(!isInt(phone)){
var phMs = "your phone number ' " + phone + " ' appears to be incorrect" ; ;
   new Messi( phMs, {title: 'Phone number error' , modal: true , titleClass: 'warning', buttons: [{id: 0, label: 'Close', val: 'X'}]});
	  exit();
	 }
	 
	 if (price.match(/[a-zA-Z]/g)) {
    var pMs = "your price ' " + price + " ' is not a valid price" ; ;
   new Messi( pMs, {title: 'Price error' , modal: true , titleClass: 'warning', buttons: [{id: 0, label: 'Close', val: 'X'}]});
	  exit();
    }
	 
	 /// ask for confirm
	 Messi.ask('Are you sure the information you entered is correct ?', function(val) {
		  if( val == 'Y'){
		//// disble all textbox and hide
	 	 $(this).find('.req').each(function(){
         $(this).attr('disabled','disabled');
     	 }); 
		$('#step1top').removeClass('on') ;
		 $('#step2top').addClass('on') ;
		 $('#step1Form').fadeOut('fast', function(){
			 $('#step2Form').fadeIn('fast',function(){
				 goToByScroll('footer');  
				 });
		});
		 }
		 });       
	 
   }); /*  END OF STEP 1 PROCESSING */
   
   /// STEP 2 PROCESSING
   	$('#step2Form').on('submit',function(e) {
     e.preventDefault();
	 
	 $(this).find('.req').each(function(){
		var message = $(this).attr('data-alert');
		var title = 'wait !!!'
		 if($(this).val() == ''){
		 $(this).focus();
	 new Messi( message , {title: title , modal: true , titleClass: 'warning', buttons: [{id: 0, label: 'Close', val: 'X'}]});
	      exit();
		 }
	 }); /// end of empty fields checking
	 	  /// check category
    var category = $('#itemCategory').attr('data-value');
	if(category == '0'){
	var ctMs = 'You have not selected any category to post your Ad under' ;
	new Messi( ctMs , {title: 'Wait' , modal: true , titleClass: 'warning', buttons: [{id: 0, label: 'Close', val: 'X'}]});
	      exit();
	}
     
	 var title = $.trim($('#title').val());
	 /// check if title contains banned keywords
	     var blacklist = ['send me an email','call me','email me','reach me','www','www.','.com','.net','.org','.ng','.com.ng', $('email').val(), $('phone').val()],
    length = blacklist.length;
    while(length--) {
   if (title.indexOf(blacklist[length])!=-1) {
       var ttMsg = 'your title contains blocked words. please revise it';
	new Messi( ttMsg , {title: 'Wait' , modal: true , titleClass: 'error', buttons: [{id: 0, label: 'Close', val: 'X'}]});
	   exit();
   }
   }
	 
	/// check if description contains banned keywords
	var description = $.trim($('#description').val()); // the string to check against
		     var blacklist2 = ['send me an email','call me','email me','reach me','www','www.','.com','.net','.org','.ng','.com.ng', $('email').val(), $('phone').val()],
    length = blacklist2.length;
    while(length--) {
   if (description.indexOf(blacklist2[length])!=-1) {
       var desMsg = 'your description contains blocked words. please revise it';
	new Messi( desMsg , {title: 'Wait' , modal: true , titleClass: 'error', buttons: [{id: 0, label: 'Close', val: 'X'}]});
	   exit();
   }
   }
   
   /// check if string contains any links or url
   if(new RegExp("([a-zA-Z0-9]+://)?([a-zA-Z0-9_]+:[a-zA-Z0-9_]+@)?([a-zA-Z0-9.-]+\\.[A-Za-z]{2,4})(:[0-9]+)?(/.*)?").test(description)) {
 new Messi( 'your description contains some link, please remove them' , {title: 'Wait - Link detected' , modal: true , titleClass: 'error', buttons: [{id: 0, label: 'Close', val: 'X'}]});
	   exit();
}
   	 /// ask for confirm
	 Messi.ask('Are you sure the information you entered is correct ?', function(val) {
		  if( val == 'Y'){
		//// disble all textbox and hide
	 	 $(this).find('.req').each(function(){
         $(this).attr('disabled','disabled');
     	 }); 
		$('#step2top').removeClass('on') ;
		$('#step3top').addClass('on') ;
		$('#step2Form').fadeOut('fast', function(){
		$('#step3Form').fadeIn('fast');
		$('#description').tooltipster('hide');
		$('#title').tooltipster('hide');
		goToByScroll('footer');  
		});
		 }
		 });     
   });
	  
	  /// Trigger file Upload on file select
	  $('.file').on('change',function(e){
		  
		  	 /// Check if file is an image
			pattern = new RegExp(/(jpg|png|jpeg|gif)$/i);
			if(!pattern.test($(this).val())) {
			var err = 'Only JPG, PNG or GIF images files are allowed!';
       new Messi( err , {title: 'Wait !!!' , modal: true , titleClass: 'error', buttons: [{id: 0, label: 'Close', val: 'X'}]});
	    exit();
			}
		  
	      var options = { 
        success:   showResponse,  // post-submit callback 
        resetForm: true ,       // reset the form after successful submit 
		error: ResetForm,
        timeout:   1000000 
        }; 

   $('#imgUp').show(); // showloading
    // bind form using 'ajaxForm' 
    $('#uploadForm').ajaxSubmit(options); 
	$('.file').hide();
	
	/// Response from image upload
	function showResponse(responseText){ 
	$('#imgUp').hide();
	$('.file').show();
	eval(responseText);
	goToByScroll('footer');  
	} 
	
	// If an error occurs
	function ResetForm(){
new Messi( 'Please try uploading image again, or try reducing the file size of the image' , {title: 'Upload Failed' , modal: true , titleClass: 'error', buttons: [{id: 0, label: 'Close', val: 'X'}]});
	$('#imgUp').hide();
	$('.file').show();
	}
	
   return false; 
	  });
	
	$('#finalpost').on('click',function(e){
		e.preventDefault();
	  // check that all is well
	  if(Number($('.file').attr('data-count')) == 0){
	var chMs = 'You have to provide at least one image of your item';
       new Messi( chMs , {title: 'Wait !!!' , modal: true , titleClass: 'warning', buttons: [{id: 0, label: 'Close', val: 'X'}]});
	    exit();
	  }
	  
	  var terms = document.getElementById('terms').checked ;
	  if(terms == false){
		var tMs = 'You have to accept the terms and conditions to continue';
       new Messi( tMs , {title: 'Wait !!!' , modal: true , titleClass: 'info', buttons: [{id: 0, label: 'Close', val: 'X'}]});
	    exit();
	  }
	  
	  /// check for spam
	 var description = $.trim($('#description').val());
	$('#finalpost').val('checking...').attr('disabled','disabled');
		$('#finalLoader').show(); /// show loader
	/// check for spam content ::: title and description
	 var title = $.trim($('#title').val());
	 var description = $.trim($('#description').val());
var checkData = { action : 'checkSpam' , title : title , description : description } ;
$.post('engine/ajax/server.php', checkData ,function(response){
		$('#finalLoader').hide(); /// show loader
eval(response);
});
});


function CorrectSpam(){
	   	$('#finalpost').val('re-post Ad').removeAttr('disabled');
		$('#step3top').removeClass('on') ;
		$('#step2op').addClass('on') ;
		$('#step3Form').fadeOut('fast', function(){
		$('#step2Form').fadeIn('fast');
		goToByScroll('footer');  
		});
}
	
	function PostFreeAd(){
				  /// submit all data now via ajax to server
	 var email = $.trim($('#email').val());
	 var phone = $.trim($('#phone').val());
	 var price = $.trim($('#price').val());
	 var title = $.trim($('#title').val());
	 var description = $.trim($('#description').val());
	 var category = $('#itemCategory').attr('data-value');
	 var pictures = '' ;
	 // get all uploaded images name
	 var i = 0 ;
	 $('.uploaded img').each(function(){
		 if(i == 0){
   pictures += $(this).attr('data-name');  
		 }
		 else{
	pictures += ' || ' + $(this).attr('data-name');  
		 }
		 i ++;
	});
var BigData = { email : email , phone : phone , price : price , title : title , description : description , category : category ,  pictures : pictures , action : 'post-an-ad'} ;
		$('#finalLoader').show(); /// show loader
		 $('#finalpost').val('Posting Ad...');
	// Send to ajax
$.ajax({
url: 'engine/ajax/server.php',
data: BigData,
success: function(returnedData){
eval(returnedData);
goToByScroll('footer');  
},
error: function (jqXHR, exception) {
	// error modes
	var alerts = '' ;
	            if (jqXHR.status === 0) {
                alerts = 'Not connected Verify Network.' ;
            } else if (jqXHR.status == 404) {
                alerts = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                alerts = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                alerts = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
               alerts = 'Time out error.';
            } else if (exception === 'abort') {
               alerts = 'Ajax request aborted, but your post may have been submitted, try reposting and if you get any spam errors, change your posts title and description then re-post. ';
            } else {
               alerts = 'Uncaught Error.\n' + jqXHR.responseText ;
            }
new Messi( alerts , {title: 'Post error' , modal: true , titleClass: 'error', buttons: [{id: 0, label: 'Close', val: 'X'}]});
     $('#finalpost').val('re -post').removeAttr('disabled');	
	
    }
});	
	
	}
	
	/// final function to show success div /// call spam clean up
	function FinalStep(Link , item_id ){
		// Verify that post is not spam
		var PostData = { item_id : item_id , action : 'Not-spam-confirm'} ;
		$.ajax({
		url: 'engine/ajax/server.php',
		data: PostData,
		success: function(returnedData){
		$('.step-header').fadeOut('fast',function(){
		$('#step3Form').fadeOut('fast',function(){
		$('#step4Form').fadeIn('fast', function(){
		$('#AdLink').find('a').attr('href',Link);
		$('.tabsholder').css('border','none') ;
		FB.XFBML.parse();  // re initalize facebook like box
		});
		});
		});
		},
		});
	}
	
	$('.restart').on('click', function(e){
		e.preventDefault();
	$( '#' + $(this).attr('data-hide')  ).fadeOut('fast', function(){
		$('#step1Form').fadeIn('fast');
		$('#step2top').removeClass('on');
		$('#step3top').removeClass('on');
		$('#step1top').addClass('on');
	});
	});
	
});
</script>

<div class="products">
<h3>Place A Free Ad</h3><span id="simple"> in three simple steps</span>

<div class="section">
<ul class="step-header" name="Now">
<li><a id="step1top" class="on" >step 1</a></li>
<li><a id="step2top" >step 2</a></li>
<li><a id="step3top" >step 3</a></li>
</ul>

<div class="tabsholder">

<form  class="tabs" id="step1Form" data-next='step2Form' >
<table>
<tr><td><label>email</label></td></tr>
<tr><td><input type="text" class="textbox req" data-alert='you have not entered your email address' id="email" maxlength="50" autocomplete="off" placeholder="Enter your email address here" /></td></tr>
<tr><td><label> phone</label></td></tr>
<tr><td><input type="text" class="textbox req" data-alert='you have not entered your phone number' id="phone" maxlength="12" autocomplete="off" placeholder="Enter your phone number here" /></td></tr>
<tr><td><label>Price</label></td></tr>
<tr><td><input type="text" class="textbox req" data-alert="you have not entered your item's price" id="price" maxlength="50" autocomplete="off" placeholder="enter the selling price of your item here" /></td></tr>
<tr><td><input type="submit" class="button" value="continue &raquo;" /></td></tr>
</table>
</form>

<form  class="tabs" id="step2Form" >
<table>
<tr><td><label>title</label></td></tr>
<tr><td><input type="text" title="Title should be short and mention few important features <br> e.g black 2GB Hp laptop <br>
do not include phone number or email here." class="textbox tooltip req" id="title" maxlength="60" autocomplete="off" placeholder="enter the a title for your ad here" data-alert="you have not entered a title yet" /></td></tr>
<tr>
<td>
<div class='ui-select' id="itemCategory" data-value='0'>
<i><label>select a category to place your Ad</label><span></span></i>
<ul>
    <?php 
foreach($categories as $value){
	echo "<li><a href='$value'>$value</a></li>" ;
}

?>
</ul>
</div>
</td></tr>
<tr><td><label>description<span>briefly describe the item. max 300 characters</span></label></td></tr>
<tr><td><textarea maxlength="300" data-alert="You have not entered any description of your item" class="textarea req tooltip" autocomplete="off" id="description" placeholder="brief description here" title="Do not enter contact details <br> your ad will be removed immediately if you do. <br> avoid phrases like 'call me on 080XXX' or 'send me an email on sss@sss.com' <br>
Also links are strictly not allowed. Stricly no contact info should be added here !!" ></textarea><br>
<span class="counter">300</span></td></tr>
<tr><td><input type="button" class="button restart" data-hide='step2Form' value="&laquo; back" />
<input type="submit" class="button" value="Final Step &raquo;" /></td></tr>
</table>
</form>

<div  class="tabs" id="step3Form" data-next='step1Form' >

<center>
<ul class="uploaded">
</ul>
</center>

<center id="imgUp">uploading image please wait<br><img src="img/loader.gif" /></center>

<table id="imgFormHolder">
<tr><td><label>Upload pictures</label></td></tr>
<tr><td><span>You can upload up to three images</span></td></tr>
<tr><td><span>Max image size is 3mb</span></td></tr>
<tr><td>
<form action="engine/ajax/img-upload.php" id="uploadForm" method="post" enctype="multipart/form-data" >
<input type="file" class="file" name="image" data-count='0' placeholder="enter the a title for your ad here" />
<input type="hidden" value="temporary-upload" name="action" />
</form>
</td></tr>
</table>

<table>
<tr><td><label>Terms and Conditions</label></td></tr>
<tr><td>
       <div class="checkbox">
        <input type="checkbox" id="terms" />
        <label for="terms"><span></span><b>I agree to the <a href="./Terms">terms and conditions</a></b></label>
       </div>
</td></tr>
<tr><td><input type="button" class="button restart" data-hide='step3Form' value="&laquo; back" /> <input type="submit" id="finalpost" class="button" value="Post my Ad already !" />
 <div id="finalLoader" ><img src="img/loader2.gif" /></div></td></tr>
</table>
</div>


<form  class="tabs" id="step4Form" data-next='' >
<img src="img/success.png" alt='succes-icon'  class="success-icon" /><br>
<label>Your Ad has been posted succesfully !</label>
<table>
<tr>
<td>
<a href="https://twitter.com/snatchhIT" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @snatchhIT</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
</td>
<td>
<div class="fb-like" data-href="https://www.facebook.com/pages/Snatchh/548665121873819" data-width="50" data-height="50" data-colorscheme="light" data-layout="standard" data-action="like" data-show-faces="false" data-send="false"></div>
</td>
</tr>
<tr><td colspan="2" id="AdLink"><a href="#">click here to view your Ad now</a></td></tr>
</table>
</form>

</div>

<div class="clear"></div>
</div>



</div> <!-- End of products-->

<div class='clear'></div>

</div><!-- End of Main Div-->
<?php include('inc/footer.php'); ?>

<?php ob_flush(); flush() ; ?>