<?php

session_start();

if(
        isset($_SESSION['email'])
        && !empty($_SESSION['email'])

        

){
        if(isset($_GET['prid'])&& !empty($_GET['prid']))
{   
 $id = $_GET['prid']; 
 
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
               
               
      </tr>
    </thead>
    <?php
          	
	try{
        	$conn = new
                   PDO("mysql:host=localhost;dbname=farm_together;","root","");
                   $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
               $mysqlquery= "SELECT title,location,min_invest,est_ret_profit,farm_type,description,picture,profit_deadline,post_id FROM post WHERE post_id='$id'";
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
                           <form action="update.php" method="POST">
                            <tr>

                                 <td> <textarea type="text" name="ti"><?php echo $row['title'] ?></textarea>   </td>
                                 <td><textarea type="" name="lo"><?php echo $row['location'] ?></textarea>    </td>
                                 <td> <textarea type="" name="mi"><?php echo $row['min_invest'] ?></textarea>   </td>
                                 <td><textarea type="" name="es" ><?php echo $row['est_ret_profit'] ?></textarea>  </td>
                                 <td><textarea type="" name="fa"><?php echo $row['farm_type'] ?></textarea>  </td>
                                 <td><textarea type="" name="de"> <?php echo $row['description'] ?></textarea>   </td>
                                 <td> <img src="<?php echo $row['picture'] ?>" width="200" height="200" /> </td>
                                 <td><textarea type="" name="pr"><?php echo $row['profit_deadline'] ?></textarea>    </td>
                                <td><textarea readonly="" name="pi"><?php echo $row['post_id'] ?></textarea> </td>
                                    
                            </tr>
                            <br>
                                <button type="submit" class="registerbtn">Update</button>

                               <?php
        }
      }
    }
        catch(PDOException $ex){
        	?>
        	<tr>
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


}


?>
