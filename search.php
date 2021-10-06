<?php
session_start();

if(
        isset($_SESSION['email'])
        && !empty($_SESSION['email'])

){
 
     $t = $_REQUEST['term'];  
    // echo $t;



    ?>

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
               <th>Interest</th>
			</tr>
		</thead>
<?php
    try{
                   $conn = new
                   PDO("mysql:host=localhost;dbname=farm_together;","root","");
                   $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                   $mysqlquery= "SELECT title,location,min_invest,est_ret_profit,farm_type,description,picture,profit_deadline FROM post WHERE farm_type='$t'";
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
                                 <td> <form method="POST" action="Email.php" enctype="multipart/form-data">
                                <button type="submit" name="submit">Send Email
                                </button>
                     </form> </td> 
                                    
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
            </table>
<?php
}

?>