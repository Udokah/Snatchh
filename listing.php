<link rel='icon'href='../../../../img/logo.png'>
<link rel='icon'href='img/logo.png'>
<?php 
ob_start(); 
include('inc/conn.php') ;
include('engine/fn/lib.php') ;
include('engine/fn/fn.php') ;

$lid = sanitize($_GET['lid'])  ;
$columns = 'title , category , datestamp , description , price , pictures' ;
$table = 'sn_listings' ;
$where = " item_id = '$lid' AND status = 'open'" ;
$LISTING = GET_DATA($columns,$table,$where) ;

if(!isset($LISTING['title'])){
	echo "Listing Not Found or Has been removed" ;
	exit();
}

$title = $LISTING['category'].' - '.$LISTING['title'] ;
$Description = 'Price: N'.$LISTING['price'].' '.$LISTING['description'] ;
$Keywords = Generate_meta_keywords( $LISTING['description'].$title ) ; // concatenate title and descrition

$domain = $_SERVER['SERVER_NAME'];
$itemlink =  form_url($LISTING['title'],$lid,$LISTING['category']);
$itemlink = substr($itemlink, 1) ;
$url = 'http://'.$domain.$itemlink ;  // remove /snatch when uploading

$Meta = "<meta property='og:title' content='$title - Snatchh' />
<meta property='og:description' content=' $Description ; ' />
<meta property='og:type' content='website' />
<meta property='og:url' content='$url ' />
<meta property='og:image' content='http://www.snatchh.com/img/logo.png' />
" ;

?>

<?php include('inc/header.php'); ?>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<input type="hidden" id="item_id" value="<?php echo $lid ; ?>" />
<style type="text/css">
.main{
	padding-right:0 !important;
}

.products{
	width:1060px !important;
}

.section{
	width:750px;
	float:left;
	margin-right:0 !important;
	margin-top:-10px !important;
}

.itemCat{
	display:inline-block;
	margin-left:5px;
}

.itemCat b{
  font-size:15px;
  text-transform:capitalize;
  color:#999;
}

.itemCat a{
	display:inline-block;
	text-transform:capitalize !important;
	margin-left:5px;
	margin-top:-1px;
}

.itemCat a:hover{
	text-decoration:underline;
}

.itemCat span{
	display:inline-block;
	margin-top:0px;
	margin-left:8px;
	text-transform:lowercase !important;
	font-size:12px;
}

.title{
	display:block;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size:25px;
	color:#666;
	border-bottom:0px solid #ddd;
	line-height:25px;
	word-wrap:break-word !important;
	white-space:normal !important;
	font-stretch:expanded;
	padding:5px ;
	padding-bottom:15px !important;
	margin-bottom:10px;
	 cursor:text;
}

.description{
	display:inline-block;
	padding:5px;
	overflow:hidden;
	width:500px;
	float:left;
	margin-top:10px;
	font-size:18px !important;
	min-height:150px;
}

.section .first{
	width:500px;
	background-color:#F9F9F9;
	float:left;
	clear:right;
	margin-left:10px;
	margin-top:20px !important;
}

.section .first tr td{
	text-align:;
	padding:10px 2px;
	vertical-align:middle;
}

.section .first tr td:last-child{
	text-align:right;
}

.section .first tr td .price{
	display:inline-block;
	padding:5px;
	text-transform:capitalize;
	color:#00D700;
	font-weight:bold;
	font-size:18px;
	font-family:arial;
}

.section .first tr td .price:before{
	content: "Price:  \20A6 " ;
}


.pictures{
    display:inline-block !important;
	position:relative !important;
	padding:5px 30px;
	text-align:center;
	border-right:2px solid #ddd;
	float:left;
	margin-right:15px;
	min-width:150px;
	min-height:350px;
}

.pictures ul{
	margin:0 !important;
}

.pictures ul li{
	background-image:none !important;
	margin:0 !important;
	padding:0 !important;
}

.pictures ul li a{
	display:inline-block !important;
	padding:8px !important;
}

.pictures ul li a img{
	width:100px !important;
}

.snatchhAction{
	text-align:center;
	display:inline-block;
	background-color:#4D90FE;
	color:#fff !important;
	padding:5px 20px;
	  text-shadow: 0 1px rgba(0,0,0,0.1);
	  font-size:20px;
}

.snatchhAction:hover{
	-webkit-box-shadow: 0 0 1px 1px #111;
-moz-box-shadow:0 0 1px 1px #111;
box-shadow: 0 0 1px 1px #111;
}

.snatchhAction:active{
	background-color:#96BDFE;
}

#snatchhInline{
display:none;
padding:10px;
}

#snatchhInline table tr td{
	padding:5px 2px;
}

#snatchhInline label{
   display:inline-block;
   font-size:20px  !important;
   font-weight:bold;
   text-transform:capitalize;
}

#snatchhInline .textbox{
	width:250px !important;
}

#snatchhInline .button{
	width:100% !important;
}

#snatchhInline section{
	display:none;
}

#snatchhInline section img{
	display:inline-block;
	margin-right:5px;
	margin-top:3px;
}

.back{
	display:inline-block;
	padding:5px 15px !important;
	margin-top:-4px !important;
	background-color:#ddd;
	color:#000 !important;
	border-radius:5px;
}

.back:hover{
	text-decoration:none !important;
	background-color:#CCCCCC;
}

.similaritems{
	display:none;
	float:right;
	width:250px;
	background-color:#F1F1F1;
	margin-left:4px;
	margin-top:40px;
}

.similaritems h2{
	display:block;
	padding:5px;
	text-align:center;
	background-color:#ddd;
	font-family:Arial, Helvetica, sans-serif;
	font-size:16px;
}

.similaritems ul li a{
    display:block;
	padding:5px;
	text-align:left;
	font-size:16px;
	border-bottom:1px solid #ddd;
	white-space:normal;
	word-wrap:break-word !important;
	line-height:20px;
}

.similaritems ul li:last-child a{
	border-bottom:none;
}

.similaritems ul li a:hover{
	text-decoration:underline;
}

.share{

}

.share tr td{
	font-size:20px;
	font-weight:bold;
	color:#06F;
	padding:5px;
	padding-top:20px;
	padding-right:10px;
	vertical-align:middle;
}

#noty{
	font-size:14px;
	color:#F00;
}

</style>

<!-- Add fancyBox -->
<link rel="stylesheet" href="plugins/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="plugins/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

<!-- Optionally add helpers - button, thumbnail and/or media -->
<link rel="stylesheet" href="plugins/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
<script type="text/javascript" src="plugins/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="plugins/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

<link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
<script type="text/javascript" src="plugins/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('.fancybox').fancybox();
		
					$('.images').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});
			
			function LoadSimilarItems(){
				var category = $('.itemCat').attr('data-category');
				var item_id = $('.itemCat').attr('data-item-id');
				var listData = { category : category , item_id : item_id , action : 'Load-similar-items' } ;
				$.post('engine/ajax/server.php', listData ,function(response){
                eval(response);
				});
			}
			
			function LoadSimilar(data){
				$('.similaritems').fadeIn('slow',function(){
					$(this).find('ul').html(data);
				});
			}
		LoadSimilarItems(); // load similar items
		
		    $('#snatchhInline .button').on('click',function(){
			var email = $.trim($('#emailAdd').val());
			var phone = $.trim($('#phoneNum').val());
			
			$('#snatchhInline .req').each(function(){
				if($(this).val() == ''){
					$('#noty').html( $(this).attr('data-alert') );
					exit();
				}
			});
			
			// validate email
				 if(!Valid_email(email)){
                $('#noty').html('Invalid email address');
	            exit();
	             }
				 
				 if(!isInt(phone)){
                  $('#noty').html('Invalid phone number');
	               exit()
	               }
	 
			
			var item_id =  $('.itemCat').attr('data-item-id');
			var snatchhData = { email : email , phone : phone , item_id : item_id , action : 'snatchh-item'} ;
			$.post('engine/ajax/server.php', snatchhData);
		    $('#snatchhInline table').fadeOut('fast', function(){
			$('#snatchhInline section').fadeIn('fast');
			$('.snatchhAction').hide();
			FB.XFBML.parse();  // re initalize facebook like box
		    });
            });
			
			$('.snatchhAction').click(function(){
				$('#snatchhInline .button').removeAttr('disabled');
				});
		
	});
</script>

<div class="products">

<div class="section">

<label class="title"><?php echo $LISTING['title'] ;?></label>

<div class="pictures" >
<label>click to view images</label>
<ul>
<?php

$IMG = explode(' || ' , $LISTING['pictures'] );
foreach($IMG as $img){
	$imgfile = 'engine/uploads/'.$img ;
	if(file_exists($imgfile)){
echo "<li><a href='$imgfile' data-fancybox-group='button' class='images'><img src='$imgfile' /></a></li>" ;
	}
}
?>
</ul>
</div>

<?php
$category_link =" <a href='./category/".$LISTING['category']."' class='category'>". $LISTING['category']."</a>" ;
$time = time_since($LISTING['datestamp']);
?>

<?php
// if user is reffered 
$back = '' ;
if(isset($_SERVER['HTTP_REFERER'])){
$back = "<a href='".$_SERVER['HTTP_REFERER']."' class='back tooltip' title='click here to go back'>&laquo; back</a>" ;
}

?>

<div class="itemCat" data-category='<?php echo $LISTING['category'] ;?>' data-item-id='<?php echo $lid ;?>'>
<b>Posted under > </b>  <?php echo $category_link  ; ?>
<span><?php echo $time ?> </span>
<?php echo $back ; ?>
</div>

<p class="description"><?php echo $LISTING['description'] ; ?></p>

<table class='first'>
<tr>
<td><span class="price"><?php echo $LISTING['price'] ; ?></span></td>
<td><a href="#snatchhInline" class="snatchhAction tooltip fancybox" title="To purchase this item click here">Snatchh! this item</a></td>
</tr>
</table>

<br /><br /><br />
<?php
 // SET SHARING PARAMS
// Facebook Sharer
$fb = "http://www.facebook.com/sharer/sharer.php?u=".$url ;
$twLink = "http://twitter.com/intent/tweet?text=".$url.' '.$LISTING['title'].' Price: N'.$LISTING['price'];
//$tw = substr($twLink, 0, 137).".." ;  /// shorten for twitter
$tw = $twLink ;
?>

<table class="share">
<tr>
<td>share this post</td>
<td>
<a href="<?php echo $fb ; ?>"><img src="img/facebook.png" class="tooltip" title="share this post on facebook" alt="share on facebook"/></a>
</td>
<td>
<a href="<?php echo $tw ; ?>"><img src="img/twitter.png" class="tooltip" title="share this post on twitter, add #snatchh after your post"  alt="share on twitter"/></a>
</td>
</tr>
</table>

<div class="clear"></div>

<div id="snatchhInline" style="width:250px;">
<table>
<caption id="noty"></caption>
<tr><td><label>email</label></td></tr>
<tr><td><input type="text" class="textbox tooltip req" data-alert='enter email address' autocomplete="off" title="enter a valid email address" id="emailAdd" placeholder="email address here" /></td></tr>
<tr><td><label>phone</label></td></tr>
<tr><td><input type="text" class="textbox tooltip req" data-alert='enter phone number' autocomplete="off" id="phoneNum" title="enter only <b>one</b> valid phone number" placeholder="phone number here" /></td></tr>
<tr><td align="center"><input type="button" class="button" value="Snatchh! it" /></td></tr>
</table>
<section>
<label><img src="img/success.png" width="20px" align="success" align="middle" />Snatchh Succesful !</label>
<p>An email has been sent to the owner of this item, you will be contacted by them soon via email or phone.</p>
<br>
<p><a href="https://twitter.com/snatchhIT" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @snatchhIT</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></p>
<br>
<p><div class="fb-like" data-href="https://www.facebook.com/pages/Snatchh/548665121873819" data-width="50" data-height="50" data-colorscheme="light" data-layout="standard" data-action="like" data-show-faces="false" data-send="false"></div></p>
</section>
</div>

</div>

<div class="similaritems">
<h2>Similar Items</h2>
<ul>
</ul>
</div>

<div class="clear"></div>
</div> <!-- End of products-->

<div class='clear'></div>
</div><!-- End of Main Div-->

<?php include('inc/footer.php'); ?>

<?php ob_flush(); flush() ; ?>