<?php
 if(!isset($_REQUEST['id']))
{
	header('location:index.php');
	
	}
else{
	
	$id=$_REQUEST['id'];
	
	
	}





?>









<?php include ('header.php');?>





<div class="all_ad floatright">
<h4>POST AD DETAILS</h4>


<?php

$statement=$db->prepare("select * from tbl_post where post_id=?");
$statement->execute(array($id));
$result=$statement->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $row)
{
	
	?>
	
	<div class="details_post">
    <h1>Title:<?php echo $row['post_title'];?></h1>
    <h2>Address:<?php echo $row['address']; ?></h2>
    <h2>Phone number:<?php echo $row['number']; ?></h2>
    <br>
    <h2>Description</h2>
    <p style="text-align:justify;"><?php echo $row['description']; ?></p>




</div>
	
	
	
	
	
	
	
	
	
	
	
	
	<?php
	}









?>
<!--<div class="details_post">
<h1>computer oparetor</h1>
<h2>Address:matuail mogolnogor demra dhaka</h2>
<h2>Phone number:01857193407</h2>
<br>
<h2>Description</h2>
<p>I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.I sell my computer.</p>




</div>-->






</div>



<?php include ('footer.php');?>      

        

