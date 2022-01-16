<?php
/*pagination start*/
$adjacents=7;

$statement=$db->prepare("select * from tbl_post order by post_id desc");
$statement->execute();
$total_pages=$statement->rowCount();


$targetpage=$_SERVER('PHP_SELF');
$limit=5;
$page=@$_GET['page'];
if($page)
      $start=($page-1) * $limit;

else
    $start=0;

$statement=$db->prepare("select * from tbl_post order by post_id desc LIMIT $start, $limit ");
$statement->execute();
$result=$statement->fetchAll(PDO::FETCH_ASSOC);



if($page==0) $page=1;
$prev=$page-1;
$next=$page+1;
$lastpage=ceil($total_pages/$limit);
$lpml=$lastpage-1;
$pagination="";



if($lastpage>1)
{
	$pagination.="<div class=\"pagination\">";

    if($page>1)
	    $pagination.="<a href=\"$targetpage?page=$prev\">&#171; previous</a>";
	   
	   
	   else
	   $pagination.="<span class=\"disabled\">&#171; previous</span>";

     if($lastpage<7 +($adjacent * 2))

      {
		  for($counter=1;$counter<=$lastpage; $counter++)

         {
			 if($counter==$page)
			    
				$pagination.="<span class=\"current\">$counter</span>";
             
			 else
			    $pagination.="<a href=\"$targetpage?page=$counter\">$counter</a>";

		 }
	  }
	  elseif($lastpage>5 + ($adjacents * 2)) //enough pages to hide some
	  {
		  if($page<1 + ($adjacents * 2))

          {
			  for($counter=1; $counter<4 +($adjacents * 2);$counter++)
              {
				  if($counter==$page)
				     $pagination.="<span class=\"current\">$counter</span>";
				  
				  
				  
				   else
                     $pagination.="<a href=\"$targetpage?page=$counter\">$counter</a>";

			  }

          
		  $pagination.="...";
		  $pagination.="<a href=\"$targetpage?page=$lpml\"$lpml</a>";
		  $pagination.="<a href=\"$targetpage?page=$lastpage\">$lastpage</a>"; 
		  
		  }
		
		elseif($lastpage-($adjacents * 2)>$page && $page>($adjacents*2))
		 { 
		  
		    $pagination.="<a href=\"$targetpage?page=1\">1</a>";
			$pagination.="<a href=\"$targetpage?page=2\">1</a>";
		    $pagination.="...";
		  
		  for($counter=$page-$adjacents; $counter<=$page+$adjacents;$counter++)
		  {
			  if($counter==$page)
		         $pagination.="<span class=\"current\">$counter</span>";
		      
			  else
			     $pagination.="<a href=\"$targetpage?page=$counter\">$counter</a>";
		  
		  }
		  
		  
		  $pagination.="...";
		  $pagination.="<a href=\"$targetpage?page=$lpml\"$lpml</a>";
		  $pagination.="<a href=\"$targetpage?page=$lastpage\">$lastpage</a>"; 
		 }
		 else
		  {
		     $pagination.="<a href=\"$targetpage?page=1\">1</a>";
			 $pagination.="<a href=\"$targetpage?page=2\">1</a>";
		     $pagination.="...";
		  
		   for($counter=$lastpage-(2 +($adjacents * 2));$counter<=$lastpage; $counter++)
		  
		   {
			  if($counter==$page)
			     $pagination.="<span class=\"current\">$counter</span>";
		       else
			     $pagination.="<a href=\"$targetpage?page=$counter\">$counter</a>";
		  
		   }
		  }
	  }

     if($page<$counter-1)
        $pagination.="<a href=\"$targetpage?page=$next\">next &#187;</a>";


      else
	   $pagination.="<span class=\"disabled\">next &#187; </span>";
       $pagination.="</div>\n";
	   
	   
}

/*pagination end*/
?>