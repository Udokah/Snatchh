<?php 
// Browser Detection
require("Mobile_Detect.php") ;
$detect = new Mobile_Detect();
if ($detect->isMobile() or $detect->isTablet()) {
echo "<script> window.location='http://www.m.snatchh.com' ;</script>" ;
}
$Keywords .= " buy , sell , classifieds , shoes , bags , laptops , clothes , tablets, electronics , phones ,others, schools ,students" ;
?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo $title ; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" >
<meta charset="utf-8" >
<meta http-equiv="Content-Language" content="en-US" >
<meta name="Keywords" content="<?php echo $Keywords ; ?>" >
<meta name="Description" content="<?php echo $Description ; ?>" >
<link rel='icon'href='../img/logo.png'>

<?php echo $Meta ;  // custom meta from different pages ?>  

<?php
	if(!isset($PAGE)){
		$PAGE = '' ;
	}
/// show header links based on page, only category page has ../ before links
if(isset($_GET['cat'])){
	echo "
	<script src='../js/jquery-1.9.1.min.js' type='text/javascript'></script>
<script src='../js/script.js' type='text/javascript'></script>

<link type='text/css' href='../css/general.css' rel='stylesheet' media='screen' />

<!--[if IE 9]>
<link href='../css/iefix.css' rel='stylesheet' media='screen' type='text/css' />
<![endif]-->
     
	 <!-- Tooltip plugin -->
    <link rel='stylesheet' type='text/css' href='../plugins/tooltips/tooltipster.css' />
    <script type='text/javascript' src='../plugins/tooltips/jquery.tooltipster.min.js'></script>
	
	<!-- Visible plugin -->
	<script type='text/javascript' src='../plugins/visible/jquery.visible.min.js'></script>
		<link rel='stylesheet' href='../plugins/messi/messi.min.css' />
       <script type='../text/javascript' src='plugins/messi/messi.min.js'></script>
	   <script src='../js/jquery.cookie.js'></script>
	" ;
}
elseif(isset($_GET['lid'])){
	echo "
	<script src='../../../../js/jquery-1.9.1.min.js' type='text/javascript'></script>
<script src='../../../../js/script.js' type='text/javascript'></script>

<link type='text/css' href='../../../../css/general.css' rel='stylesheet' media='screen' />

<!--[if IE 9]>
<link href='../../../../css/iefix.css' rel='stylesheet' media='screen' type='text/css' />
<![endif]-->
     
	 <!-- Tooltip plugin -->
    <link rel='stylesheet' type='text/css' href='../../../../plugins/tooltips/tooltipster.css' />
    <script type='text/javascript' src='../../../../plugins/tooltips/jquery.tooltipster.min.js'></script>
	
	<!-- Visible plugin -->
	<script type='text/javascript' src='../../../../plugins/visible/jquery.visible.min.js'></script>
	<link rel='stylesheet' href='../../../../plugins/messi/messi.min.css' />
    <script type='text/javascript' src='plugins/messi/messi.min.js'></script>
		<script src='../../../../js/jquery.cookie.js'></script>
	" ;
}
else{
	echo "
	<script src='js/jquery-1.9.1.min.js' type='text/javascript'></script>
<script src='js/script.js' type='text/javascript'></script>

<link type='text/css' href='css/general.css' rel='stylesheet' media='screen' />

<!--[if IE 9]>
<link href='css/iefix.css' rel='stylesheet' media='screen' type='text/css' />
<![endif]-->
     
	 <!-- Tooltip plugin -->
    <link rel='stylesheet' type='text/css' href='plugins/tooltips/tooltipster.css' />
    <script type='text/javascript' src='plugins/tooltips/jquery.tooltipster.min.js'></script>
	<link rel='stylesheet' href='plugins/messi/messi.min.css' />
    <script type='text/javascript' src='plugins/messi/messi.min.js'></script>
	
	<script src='js/jquery.cookie.js'></script>

	" ;
}

?>
   
    <base href="<?php echo $_SERVER['SCRIPT_NAME']; ?>" />
    <!-- Load Messi -->
<link rel="stylesheet" href="plugins/messi/messi.min.css" />
<script type="text/javascript" src="plugins/messi/messi.min.js"></script>
    
    <script type="text/javascript">
	$(document).ready(function() {
        $('#Searchform').submit(function(e) {
		e.preventDefault();
        PerformSearch();
        });
	   $('#searchbutton').click(function(e) {
		e.preventDefault();
        PerformSearch();
        });
		
   // function to perform search
	function  PerformSearch(){
	var Scategory = $('#searchCategory').attr('data-value');
	var Sphrase = $.trim($('#searchPhrase').val());
	 
	 if( Sphrase == 0){
	 exit(); 
	 }
      
	  /// store in cookes
	  $.cookie('Sphrase', Sphrase, { path: '/' });
	  $.cookie('Scategory', Scategory, { path: '/' });
	  
	  window.location = './search' ;
	  
	}
		
    });

	</script>
	
	</head>
<body>
<script>
/// Google analytics tracking
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-45337167-1', 'snatchh.com');
  ga('send', 'pageview');

</script>

<div class='wrapper'>

<div class="header">
<table>
<tr>
<td>
<div class="logo">
<a href="./home"><img src="img/Snatchh!.png" alt="Snatchh! Logo" /></a>
<span>..snatchh! it or loose it..</span>
</div>
</td>
<td>
<?php $categories = array('electronics','gadgets','clothes','footwears','others');  // IMPORTANT ?>
<div class="search">
<form action='#' class='form' id="Searchform">
<div class='ui-select' id="searchCategory" data-value='0'>
<i><label>category</label><span></span></i>
<ul>
<li><a href="all">All</a></li>
<?php
foreach($categories as $value){
	if($value == $PAGE){
		$class = 'current' ;
	}
	else{
		$class = '' ;
   }
	echo "<li><a href='$value'>$value</a></li>" ;
}
?>
</ul>
</div>
<input type="text" class="searchbox tooltip" id="searchPhrase" title="Enter the name, type or color of the item you want to search for,<br> also dont forget to select the category of the item." placeholder="Search for items here" autocomplete="off" />
</form>
<input type="submit" class='submit' id="searchbutton" value="search" />
<div class='PlaceAd'><label id="or">or</label><a href="./place-free-ad" class='tooltip' id='PlaceAd' title="Click here if you want to post an item  <br> you are willing to sell.">+ Place free Ad</a></div>
</div>
</td>
</tr>
</table>
</div>
<div class="main">

<div class="categories">
<div class="dropdown"> <span class="dropdown-toggle" tabindex="0"></span>
  <div class="dropdown-text">Categories <i class="icon-user icon"></i></div>
  <ul class="dropdown-content">
    <?php 
// Add home link
if($PAGE !== 'home'){
		echo "<li><a href='./home'>Home</a></li>" ;
}

foreach($categories as $value){
	if($value == $PAGE){
		$class = 'current' ;
	}
	else{
		$class = '' ;
   }
	echo "<li><a href='category/$value' class='$class'>$value</a></li>" ;
}

?>
  </ul>
</div>
</div><!-- End of categories -->