<link rel='icon'href='img/logo.png'>
<?php 
ob_start(); 
$PAGE = 'search' ;
$Keywords = "" ;
$Description = "" ;
$title = $PAGE.'  - it or loose it' ;
$Meta = "<meta name='robots' content='noindex, nofollow' />" ;
?>

<?php include('inc/header.php'); ?>
	<!-- Visible plugin -->
	<script type='text/javascript' src='plugins/visible/jquery.visible.min.js'></script>
    	<script>
		
	$(document).ready(function() {
    var Sphrase = $.cookie('Sphrase') ;
	var Scategory = $.cookie('Scategory') ;
	

	if( Scategory && Sphrase ){ 
	var h3 = "searching for : '" + Sphrase + "'" ;
	/// update search box 
	$('#searchPhrase').val(Sphrase) ;
	if( Scategory != 0 && Scategory != 'all'){
		h3 += " in " +  Scategory ;
		$('#searchCategory').attr('data-value', Scategory);
		$('#searchCategory').find('label').html(Scategory);
	}
	$('#searchtitle').text(h3);  
	// end of update //
	SearchListings('.listings',0,Scategory,Sphrase) ;// initialize search on page load
	}
	else{
		alert('No search term !');
		window.location = './home' ;  /// if no search term is set, go back to home page
	}
	
	$(window).scroll(function(){
	if($('#showmore').visible()){
	$('#showmore').tooltipster('show');
	}
	if($('#feedbacklink').visible()){
	$('#feedbacklink').tooltipster('show');
	}
	}); 
	
	function SearchListings(updateDiv,count,category,phrase){
    dataToSend = { action : 'SearchListings' , count : count , category : category , updateDiv : updateDiv  , phrase : phrase } ;
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
	 SearchListings(updateDiv,count,category,phrase)  ; // call function again
	});
    }
	});	
	}// end of loadlisting function
	
	function ShowLoading(){
	$('#showmore').attr('disabled','disabled');
	$('#label').html('searching please wait');
	$('#MoreIcon').show();
	}
	
	function HideLoading(){
	$('#showmore').removeAttr('disabled');
	$('#label').html('Show more results');
	$('#MoreIcon').hide();
	}
	
	$('#showmore').on('click', function(e){
	e.preventDefault();
	var count = Number($(this).attr('data-count') );
	SearchListings('.listings',count,Scategory,Sphrase) ;
	});
	
    });
	</script>
    
    <style type="text/css">
	#MoreIcon{
		display:none;;
	}
	
	#searchtitle{
		text-transform:lowercase !important;
	}

	</style>

<div class="products">
<h3 id='searchtitle'></h3> 

<div class="listings">

</div><!-- End of Listings-->

<div class='showMore'><a href='#' class="tooltip" data-count='0' id='showmore' title="Click here to see more listings">
<label id="label">show more results</label><br>
 <img src='plugins/fancybox/source/fancybox_loading.gif' id='MoreIcon' alt='showmore' /></a></div>

</div> <!-- End of products-->

<div class='clear'></div>

</div><!-- End of Main Div-->

<?php include('inc/footer.php'); ?>

<?php ob_flush(); flush() ; ?>