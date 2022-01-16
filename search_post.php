<?php

if(isset($_POST['form1']))
{
	
	$cat_id=$_POST['cat_id'];
	$area_id=$_POST['area_id'];
	
	}


else{
	
	header('location:index.php');
	
	}

















?>














<?php include ('header.php');?>





<div class="all_ad floatright">
<h4>search ads in Bangladesh</h4>
<a class="fa fa-home home" href="index.php">Home</a>

<?php
include('config.php');

$statement=$db->prepare("select * from tbl_post  where cat_id=? and area_id=? order by post_id desc");
$statement->execute(array($cat_id,$area_id));
$result=$statement->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $row)

{
	?>
	<div class="image floatleft">
   <img src="upload/<?php echo $row['post_image'];?>" class="floatleft">
   <h1 class="floatleft"><?php echo $row['post_title'];?></h1>
   <p class="floatleft"><?php echo $row['date'];?></p>
   <span class="floatright"><?php echo $row['taka'];?></span>
   <a class="floatright" href="index2.php?id=<?php echo $row['post_id'];    ?>">Details</a>
    </div>
	
	
	
	
	
	
	
	
	
	<?php
	}








?>







</div>



<?php include ('footer.php');?>      

        

