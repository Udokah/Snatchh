<link rel='icon'href='img/logo.png'>
<?php 
ob_start(); 
$title = 'Feedback - Snatchh!' ;
$Keywords = "" ;
$Description = "" ;
$Meta = "<meta name='robots' content='noindex, nofollow' />" ;
?>

<?php include('inc/header.php'); ?>

<style type="text/css">

#feedbackForm{
	margin-left:240px;
	display:block;
	text-align:center;
}

#feedbackForm label{
	font-size:20px;
	font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
	line-height:24px;
	display:block;
	padding:5px;
	color:#666;
	text-shadow: 0 1px rgba(0,0,0,0.1);
}

table{
	text-align:center;
}

table label{
	text-align:left;
}

table tr td{
	padding:5px;
}

table .button{
	margin-top:15px;
	margin-bottom:15px;
	width:100%;
}

</style>

<script>
$(document).ready(function() {
    
	$('#feedbackForm').submit(function(e){
		e.preventDefault();	
			$('#feedbackForm .req').each(function(){
				if($(this).val() == ''){
					$(this).focus();
					new Messi($(this).attr('data-alert'));
					exit();
				}
			});
			
     var email = $.trim($('#email').val());
	 var feedback = $.trim($('#feedback').val());
	 
	 			// validate email
				 if(!Valid_email(email)){
             new Messi('Invalid email address !');
	            exit();
	             }
			var FeedbackData = { email : email , feedback : feedback , action :  'send-feedback'} ;				
				$.ajax({
				url: 'engine/ajax/server.php',
				data: FeedbackData,
				success: function(returnedData){
				eval(returnedData);
				},
				});
			   });
			
			function mailsent(){
			$('#feedbackForm').fadeOut('fast',function(){
		new Messi('Thank your for your feedback, it will be duly noted..', {title: 'Message sent',  titleClass: 'success', buttons: [{id: 0, label: 'Ok', val: 'close'}], callback: function() { 
			history.go(-1);
			 }});
			});
			}
			
			function mailError(){
		new Messi('Feedback was not sent, please try again.', {title: 'Error occured', titleClass: 'anim error', buttons: [{id: 0, label: 'Close', val: 'X'}]});
			$('#feedbackForm').find('button').val('re-send').removeAttr('disabled');
			}
			
	
});
</script>

<div class="products grey">
<h3>Send us your feedback</h3>

<div class="section">

<form id="feedbackForm" class="myform">
<table>
<tr><td><label>Email</label></td></tr>
<tr><td><input type='text' class="textbox tooltip req" data-alert="enter your email address"  title="Please enter only one (1) valid email address <br>e.g janedoe@yourmail.com" maxlength="50" autocomplete="off" autofocus id='email' placeholder="Enter your email address " /></td></tr>
<tr><td><label>Message</label></td></tr>
<tr><td><textarea id='feedback' class="textarea tooltip req" data-alert="enter your message" title="Note that you can only enter a maximum of 400 characters <br> including white spaces. Let your message be straight to the point <br>and as short as possible." maxlength="400"  placeholder="Enter your message here"></textarea></td></tr>
<tr><td><input type='submit' class="button" value="send feedback" /></td></tr>
</table>
</form>

</div>
</div> <!-- End of products-->

<div class='clear'></div>

</div><!-- End of Main Div-->

<?php include('inc/footer.php'); ?>

<?php ob_flush(); flush() ; ?>