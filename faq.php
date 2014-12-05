<link rel="icon" href="img/logo.png" >

<?php 
ob_start(); 
$title = 'Frequently Asked Questions - Snatchh!' ;
$Keywords = "faq , frequently asked questions" ;
$Description = "Frequently asked questions about Snatchh!" ;
$Meta = "" ;
?>

<?php include('inc/header.php'); ?>

<style type="text/css">

.section ul li{
	display:block !important;
	padding:5px 10px !important;
	background-image:none !important;
	list-style-type:circle !important;
}

.section ul li a{
	display:inline-block !important;
	clear:right !important;	
	font-weight:bold;
	font-size:21px;
}

.section ul li a:hover{
	color:#CC3300;
}

.section ul li span{
	display:block;
	width:800px !important;
	background-color:#fff;
	padding:5px;
	color:#666666;
	border:1px dashed #ccc;
	font-family:Arial, Helvetica, sans-serif;
	font-size:18px;
}

.section ul li span a{
	font-weight: normal !important;
	font-size:17px;
	text-decoration:underline;
	color:#333;
}

</style>

<script>
$(document).ready(function() {
	$('.section ul li span').hide();
	
	$('.section ul li a').on('click', function(e){
	e.preventDefault();
	$(this).next('span').slideToggle('fast');
	});
    
});
</script>

<div class="products grey">
<h3>FREQUENTLY ASKED QUESTIONS</h3>

<div class="section">
<ul>
<li>
<a href=''>What is snatchh.com ?</a><span> snatchh.com is a platform where students buy and sell items.</span>
</li>

<li> 
<a href=''>Who can use snatchh.com</a><span>snatchh.com is open to all students within Unilag who want to buy or sell an item.</span>
</li>

<li> 
<a href=''>Is it free?</a><span>  Yes it is free and we will make sure it continues to remain so. </span>
</li>

<li>
<a href=''>What can be done on snatchh.com ?</a><span> on snatchh.com students can buy and sell items. </span>
</li>

<li>
<a href=''>Will there be an app for snatchh.com? </a><span> yes. Applications for Android, blackberry and ios platforms would soon be made available in their respective app stores. </span>
</li>

<li>
<a href=''>Do I have to sign up? </a><span>No. Sign up is not necessary. </span>
</li>

<li>
<a href=''>How do I buy an item I like? </a><span>To buy an item click on the click on the item to view it, then click on the "snatchh!" button, then follow the instructions. 
</span>
</li>

<li>
<a href=''>How do I post an add?</a><span> Click on the "place free ad button" and follow the instructions.
or <a href="./place-free-ad">click here now</a>
</span> 
</li>

<li>
<a href=''>How can long distance transactions be made?</a><span> For now focus is on local transactions. </span>
</li>

<li>
<a href=''>How safe is snatchh.com?</a><span> Because there are no actual financial transactions being made on the website, buyers and sellers have to meet in person for transactions to be made. Hence safety and assurance is guaranteed.</span>
</li> 

<li>
<a href=''>Any provisions for privacy?</a><span> When an ad is listed, the phone number and email is kept private and you are notified via email about potential buyers. Also contact details of interested buyers are kept private and made available only to the seller. </span>
</li>

<li>
<a href=''>How do I edit or delete a post?</a><span> An email containing a link to edit or delete a post would be sent to you after you post an ad. Note: all ads would be automatically deleted after 30 days. </span>
</li>

<li>
<a href=''>Any provisions for those who want to sign up?</a><span> For now there is none.</span> 
</li>

<li>
<a href=''>How do I optimize the potentials of snatchh.com?</a><span> By sharing your ads on social networks, such as Facebook and Twitter. </span>
</li>

<li>
<a href=''>Why go social?</a><span> Going social helps to share your ads amongst your friends and followers om social media. It helps to drive sales for your ads. It also keeps you in the know of any great listing that yoy may want to snatchh! 
</span>
</li>

<li>
<a href=''>Are there any restrictions?</a><span> Yes there are, visit our <a href="./terms">Terms and conditions</a> to find out more. 
</span>
</li>
</ul>

</div>

</div> <!-- End of products-->

<div class='clear'></div>

</div><!-- End of Main Div-->

<?php include('inc/footer.php'); ?>

<?php ob_flush(); flush() ; ?>