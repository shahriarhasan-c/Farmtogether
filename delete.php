<?php

session_start();

if(
        isset($_SESSION['email'])
        && !empty($_SESSION['email'])

        

){
        if(isset($_GET['prid'])&& !empty($_GET['prid']))
{   
        $id = $_GET['prid'];     	
	try{
        	$conn = new
                   PDO("mysql:host=localhost;dbname=farm_together;","root","");
                   $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
               $mysqlquery= "DELETE FROM post WHERE post_id='$id' ";
               $conn->exec($mysqlquery);
               ?>
               <script>location.assign("profile.php");</script>
               <?php
        }
        catch(PDOException $ex){
        	?>
        	<script>location.assign("profile.php");</script>
        	<?php
        }
}
}
else{
	?>
	<script>location.assign("farm_ui.php")</script>
	<?php
}


?>
