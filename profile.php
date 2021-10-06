<?php

session_start();

if(
        isset($_SESSION['email'])
        && !empty($_SESSION['email'])

){
    
$link = mysqli_connect("localhost", "root", "", "farm_together");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$m =  $_SESSION['email'];


$sql = "select * from farmer Where '$m'=email ";  
$result = mysqli_query($link, $sql);  
        $row=$result->fetch_assoc();
        $id = (int) $row['farm_id'];
        $n =  (string)$row['name'];
        $em =  (string)$row['email'];
        $cn = (string) $row['contact_number'];

     ?>
     <a href="farm_ui.php">Newsfeed</a>
     <h1>Profile</h1>
     <br>
     <h2>Name: <?php
  echo $n;

?></h2>
<br>
<h2>Email: <?php
  echo $em;

?></h2>
<br>
<h2>Phone: <?php
  echo $cn;

?></h2>
<h1>Posts:</h1>
<br>


<style>
	#ptable{
    	width:100%;
    	border: 1px solid blue;
    }
    #ptable th,#ptable td{
    	border: 1px solid blue;
    	border-collapse: collapse;
    	text-align: center; 
    }
    #ptable tr:hover{
    	background-color: bisque;
    }
</style>
     

    <table id="ptable"> <thead>
			<tr>
               <th>Title</th>
               <th>Location</th>
               <th>Min_invest</th>
               <th>est_ret_profit</th>
               <th>farm_type</th>
               <th>Description</th>
               <th>picture</th>
               <th>Profit Deadline</th>
               <th>Edit/Delete</th>
               
			</tr>
		</thead>



<?php
            try{     
                 $conn = new
                   PDO("mysql:host=localhost;dbname=farm_together;","root","");
                   $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
               $mysqlquery= "SELECT title,location,min_invest,est_ret_profit,farm_type,description,picture,profit_deadline,post_id FROM post WHERE Farmerfarm_id='$id'";
                   //echo $mysqlquery;
                   $returnobj = $conn->query($mysqlquery);
                   $returntable=$returnobj->fetchALL();
                   
                   if($returnobj->rowCount() == 0){
                              ?><tr>
               		<td colspan="5">
               			No post found.
               		</td>
               	</tr>
               	<?php
                   }
                   else{
                   	foreach ($returntable as $row) {
                   	?>
                            <tr>
                            	
                                 <td> <?php echo $row['title'] ?> </td>
                                 <td> <?php echo $row['location'] ?> </td>
                                 <td> <?php echo $row['min_invest'] ?> </td>
                                 <td> <?php echo $row['est_ret_profit'] ?> </td>
                                 <td> <?php echo $row['farm_type'] ?> </td>
                                 <td> <?php echo $row['description'] ?> </td>
                                 <td> <img src="<?php echo $row['picture'] ?>" width="200" height="200" /> </td>
                                 <td> <?php echo $row['profit_deadline'] ?> </td>
                                 <td><input type="button" name="Edit" value="Edit" onclick="editfn(<?php
                                        echo $row['post_id'];


                                 	?>)"><br><input type="button" name="Delete" value="Delete" onclick="deletefn(<?php
                                        echo $row['post_id'];


                                 	?>)"></td>
                             
                                    
                            </tr>
                            <?php
                         
                    }
               }
     }




catch(PDOException $ex){
               	?><tr>
               		<td colspan="5">
               			No post found.
               		</td>
               	</tr>
               	<?php
               }
?>
<script>
	function editfn(pid){
		location.assign('edit.php?prid='+pid);
	}
	</script> 
<script>
	function deletefn(pid){
		location.assign('delete.php?prid='+pid);
	}
</script>



<?php
 }


?>
