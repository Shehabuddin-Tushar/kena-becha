<?php       

include('config.php');

if(isset($_POST['form1']))
{
	$title=$_POST['title'];
	$taka=$_POST['taka'];
	$address=$_POST['address'];
	$number=$_POST['number'];
	$description=$_POST['description'];
	$cat_id=$_POST['cat_id'];
	$area_id=$_POST['area_id'];
	
	

 try{
	 
    
	 
   if(empty($title))
   { throw new exception('title cannot be empty');
	   
	   }
	   
   $title2=strlen($title);
   
   if($title2>25)
   { throw new exception('title must be 25 character or under 25 character');
	   }	
	
	 if(empty($taka))
   { throw new exception('taka field cannot be empty');
	   
	   }
	   
     if(empty($address))
   { throw new exception('address cannot be empty');
	   
	   }
	   
	   
	 if(empty($number))
   { throw new exception('number cannot be empty');
	   
	   }
	   
	   
	  if(empty($description))
   { throw new exception('description cannot be empty');
	   
	   }
	   
	   
	   
	   
	 if(empty($cat_id))
	 {
		throw new exception('catagory cannot be empty'); 
		 }
		 
     if(empty($area_id))
	 {
		throw new exception('area cannot be empty'); 
		 }
	   
	   
	   
	 
	
	
	

	
	
	
	   $statement=$db->prepare("SHOW TABLE STATUS LIKE 'tbl_post'");	
		$statement->execute();
		$result=$statement->fetchAll();
		foreach($result as $row)
		$new_id=$row[10];	
			
			
		$up_filename=$_FILES["post_image"]["name"];
		$file_basename=substr($up_filename,0,strripos($up_filename,'.'));	
		$file_ext=substr($up_filename,strripos($up_filename,'.'));		
	    $f1=$new_id. $file_ext;
		
		if(($file_ext!='.png')&&($file_ext!='.jpg')&&($file_ext!='.jpeg')&&($file_ext!='.gif'))
		 throw new exception("only png,jpeg,gif and jpg format image allwed to upload");
		
			
			
		move_uploaded_file($_FILES["post_image"]["tmp_name"],"upload/".$f1);	
	
	
	
	    $date1=date('Y-m-d');
	
	
	  
		$statement=$db->prepare("insert into tbl_post (post_title,taka,address,number,description,post_image,date,cat_id,area_id)values(?,?,?,?,?,?,?,?,?)");
		$statement->execute(array($title,$taka,$address,$number,$description,$f1,$date1,$cat_id,$area_id));
	
		
		$success_message="Post is inserted successfully";
	
	
	
	
 }
	
		
	
	
	
	
	
	catch(exception $e)
	{
		
		
		$error_message=$e->getMessage();
		
		
		
		
		
		
		
		}
	
	
	
	
	
	
	
	}




















?>


















<?php include('header.php');?>





<div class="all_ad floatright">
<h4>Post your advertisement</h4>
<a class="fa fa-home home" href="index.php">Home</a>

<?php
if(isset($error_message)){ echo "<div class='error'>".$error_message."</div>";}
 if(isset($success_message)){ echo "<div class='success'>".$success_message."</div>";}





?>  

<div class="advertisement">

<form action="" method="post" enctype="multipart/form-data">
<table>
<tr><td>Title</td></tr>
<tr><td> <input type="text" placeholder="Enter title 25 or under 25 caracter" name="title"></td></tr>


<tr><td>TAKA</td></tr>
<tr><td> <input type="text" placeholder="Must be Enter Price" name="taka"></td></tr>

<tr><td>Your permanent address</td></tr>
<tr><td> <input type="text" placeholder="Must be Enter Address" name="address"></td></tr>

<tr><td>Mobile number</td></tr>
<tr><td> <input type="text" placeholder="Must be Enter mobile number" name="number"></td></tr>

<tr><td>Description</td></tr>
<tr><td><textarea class="description" name="description" placeholder="Must be enter description"></textarea></td></tr>





<tr><td>Featured Image</td></tr>
<tr><td><input type="file" name="post_image"></td></tr>


<tr><td>Select a Catagory</td></tr>
<tr>
    <td>
       <select name="cat_id">
       <option value="">Select a catagories</option>
        <?php
   include ('config.php');
 
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
    </td>
</tr>


<tr><td>Select a Area</td></tr>
<tr>
    <td>
       <select name="area_id">
       <option value="">Select a area</option>
       
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
    </td>
</tr>

<tr><td><input type="submit" value="Post your ad" name="form1"></td></tr>

</table>
</form>

</div>















</div>




















<?php include('footer.php');?>