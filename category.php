<link rel='icon'href='img/logo.png'>
<?php 
ob_start(); 
$PAGE = '' ;
if(isset($_GET['cat'])){
	$PAGE = $_GET['cat'] ;
}
$Keywords = " listings , category " ;
$Description = "In neeed of a new item ? why not browse our categories of listings where you are sure to find students willing to sell that item you want to buy, cheaper than you can imagine." ;
$title = $PAGE.'  - Snatchh - a new way to buy and sell for students' ;
$Meta = "" ;
?>

<?php include('inc/header.php'); ?>
	<!-- Visible plugin -->
	<script type='text/javascript' src='plugins/visible/jquery.visible.min.js'></script>
    	<script>
		
	$(document).ready(function() {
	var category = '<?php echo $PAGE  ; ?>' ; 
	$(window).scroll(function(){
	if($('#showmore').visible()){
	$('#showmore').tooltipster('show');
	}
	if($('#feedbacklink').visible()){
	$('#feedbacklink').tooltipster('show');
	}
	}); 
	
	LoadListings('.listings',0,category) ;   /// Initialize first load with 0
	
	function LoadListings(updateDiv,count,category){
	dataToSend = { action : 'LoadLIstings' , count : count , category : category , updateDiv : updateDiv } ;
	ShowLoading() ;
	$.ajax({
	url: 'engine/ajax/server.php',
	data: dataToSend,
	success: function(returnedData){
	HideLoading() ;
	eval(returnedData);
	},
	error: function () {
    $('#label').html('error occured, re-loading').delay(500).fadeIn('fast',function(){
	LoadListings(updateDiv,count,category)  ; // call function again
	});
    }
	});	
	}// end of loadlisting function
	
	function ShowLoading(){
	$('#showmore').attr('disabled','disabled');
	$('#label').html('Loading please wait');
	$('#MoreIcon').show();
	}
	
	function HideLoading(){
	$('#showmore').removeAttr('disabled');
	$('#label').html('Show more items');
	$('#MoreIcon').hide();
	}
	
	$('#showmore').on('click', function(e){
	e.preventDefault();
	var count = Number($(this).attr('data-count') );
	LoadListings('.listings',count,category) ;
	});
	
    });
	</script>
    
    <style type="text/css">
	#MoreIcon{
		display:none;;
	}

	</style>

<div class="products">
<h3><?php echo $PAGE ; ?></h3>

<div class="listings">

</div><!-- End of Listings-->

<div class='showMore'><a href='#' class="tooltip" data-count='0' id='showmore' title="Click here to see more listings">
<label id="label">show more items</label><br>
 <img src='plugins/fancybox/source/fancybox_loading.gif' id='MoreIcon' alt='showmore' /></a></div>

</div> <!-- End of products-->

<div class='clear'></div>

</div><!-- End of Main Div-->

<?php include('inc/footer.php'); ?>

<?php ob_flush(); flush() ; ?>