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

if (isset($_POST["submit"]))
	{
		$file_tmp = $_FILES["pimage"]["tmp_name"];
		$file_name = $_FILES["pimage"]["name"];

		/*image name variable that you will insert in database ---*/
		$image_name = $_POST["img-name"];

		//image directory where actual image will be store
		$to= "post_img/".$file_name;	

	}
 
$sql = "select farm_id from farmer Where '$m'=email ";  
$result = mysqli_query($link, $sql);  
        $row=$result->fetch_assoc();
        $id = (int) $row['farm_id'];

 
// Escape user inputs for security
$ti = mysqli_real_escape_string($link, $_REQUEST['ti']);
$lo = mysqli_real_escape_string($link, $_REQUEST['lo']);
$min = mysqli_real_escape_string($link, $_REQUEST['mi']);
$es = mysqli_real_escape_string($link, $_REQUEST['es']);
$type = mysqli_real_escape_string($link, $_REQUEST['fa']);
$d = mysqli_real_escape_string($link, $_REQUEST['de']);
$pr = mysqli_real_escape_string($link, $_REQUEST['pr']);
$pi = mysqli_real_escape_string($link, $_REQUEST['pi']);

   
// Attempt insert query execution
$sql = "UPDATE post
          SET
           Farmerfarm_id='$id',title='$ti', location='$lo', min_invest='$min', est_ret_profit='$es', farm_type='$type', description='$d', profit_deadline='$pr' WHERE post_id = '$pi' " ;
if(mysqli_query($link, $sql)){
    header("Location:farm_ui.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);


}


else
{

}
 
?>