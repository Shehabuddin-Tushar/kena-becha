<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Kena-becha.com</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!--bootstrap-->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        
        <!--nivo slider css-->
        <link rel="stylesheet" href="css/nivo-slider.css">
        <link rel="stylesheet" href="css/themes/default/default.css">
        
        <!--owl_carousel css-->
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.transitions.css">
        
        <!--uikit css-->
        <link rel="stylesheet" href="css/uikit.css">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        
        <!--fonts css-->
         <link rel="stylesheet" href="css/font-awesome.min.css">
         <!--html5 boilerplate css-->
        <link rel="stylesheet" href="css/normalize.css">
        <!--main css-->
        <link rel="stylesheet" href="style.css">
        
        <!--responsive css-->
        <link rel="stylesheet" href="responsive.css">
        
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
<div class="body_bg">        

 <div class="column">

   <div class="header">

  <div class="logo floatleft">
   <a href="">Kena-becha.com</a>
  
  
  </div>


  <div class="login floatright">
   <a class="log" href="">Log in</a>
   <a class="add" href="post_ad.php">Post your ad</a>
  
  </div>

</div>
<!--end header area-->
<?php  include ('config.php'); ?>

<div class="mainmenu">

 <div class="search_area floatleft">
  <form action="whatsearch.php" method="GET">
  <input type="text" name="search" placeholder="what are you looking for?">
  <input type="submit" name="submit" value="Search">
  </form>
 
 </div>
 
 <div class="catagories floatleft">
 <form action="search_post.php" method="post" enctype="multipart/form-data">
 <select name="cat_id">
 <option>Select a catagory</option>
 
 
 
 <?php
  
 
   $statement=$db->prepare("select * from tbl_catagory");
   $statement->execute();
   $result=$statement->fetchAll(PDO::FETCH_ASSOC);
   foreach($result as $row)
   {
	 ?>  
	   
	    <option value="<?php echo $row['cat_id'];      ?>"><?php echo $row['cat_name'];    ?></option>
	   
	   
	   
	   
	 <?php  
	   }
 
 
 
 
 
 
 
 
 
 
 
 ?>
 
 </select>
 
 <select name="area_id">
 <option>select a area</option>
 


 
 <?php
 
   include('config.php');
   
   $statement=$db->prepare("select * from tbl_area");
   $statement->execute();
   $result=$statement->fetchAll(PDO::FETCH_ASSOC);
   foreach($result as $row)
   {
	 ?>  
	   
	   <option value="<?php echo $row['area_id'];    ?>"><?php echo $row['area_name'];  ?></option>
	   
	   
	   
	   
	   
	  <?php 
	   }
 
 
 
 
 
 
 
 
 
 ?>
 
 </select>
 
 <input type="submit" value="search" name="form1">
 </form>
 </div>
 
 
 
 
 
</div>

<!--end main menu area-->



<div class="blank">



</div>
<!--end blank-->
<div class="cat_and_ad">
<div class="all_post floatleft">

<div class="catagory_items">
<h4>All catagories</h4>

<?php
include('config.php');

$statement=$db->prepare("select * from tbl_catagory");
$statement->execute();
$result=$statement->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $row)
{
  ?>	
	<a href=""><?php echo $row['cat_name'];?> <span>
	
	<?php
	
	$statement1=$db->prepare("select * from tbl_post where cat_id=?");
	$statement1->execute(array($row['cat_id']));
	$total_num=$statement1->rowCount();
	echo $total_num;
	           
   ?></span></a>
    <br><br>
	
	
	
	<?php
	}








?>

</div>


<div class="area_items">
<h4>All of Bangladesh</h4>
<?php

include('config.php');

$statement=$db->prepare("select * from tbl_area");
$statement->execute();
$result=$statement->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $row)
{
	?>
	
       <a href=""><?php echo $row['area_name'];?> <span>
       
       <?php
	
	$statement2=$db->prepare("select * from tbl_post where area_id=?");
	$statement2->execute(array($row['area_id']));
	$total_num=$statement2->rowCount();
	echo $total_num;
	           
   ?>
       
       
       
       </span></a>
       <br><br>
	
	
	
	
	
	
	<?php
	}
















?>



</div>









</div>
