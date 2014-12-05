<link rel="icon" href="img/logo.png" >

<?php 
ob_start(); 
$title = 'About us - Snatchh!' ;
$Keywords = "About snatchh" ;
$Description = "Snatchh.com is a new way for students to buy and sell within their respective schools" ;
$Meta = " " ;
?>

<?php include('inc/header.php'); ?>

<div class="products grey">
<h3>About</h3>

<div class="section">
<p>Snatchh.com is a new way for students to buy and sell within their respective schools.<br />
The website is a platform to aid students transact locally with much ease.<br />
Before now Ads were placed on walls and bathroom doors, but today those ads can be placed on a website where everyone is sure to see them.<br />
Why not <a href="./place-free-ad">post an ad</a>, using our vast network of students and als help to keep our walls and doors clean, and even save time and money printing and pasting flyers.<br />
In neeed of a new item ? why not <a href="./home">browse our categories</a> of listings where you are sure to find students willing to sell that item you want to buy, cheaper than you can imagine.</p>

</div>

</div> <!-- End of products-->

<div class='clear'></div>

</div><!-- End of Main Div-->

<?php include('inc/footer.php'); ?>

<?php ob_flush(); flush() ; ?>