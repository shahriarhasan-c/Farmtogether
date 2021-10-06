<?php
session_start();

if(
        isset($_SESSION['email'])
        && !empty($_SESSION['email'])

){

try{
	$conn=new PDO('mysql:host=localhost:3306;dbname=farm_together;',"root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            


if(isset($_FILES['pimage'])
    && !empty($_FILES['pimage'])
){
	$nimg = $_FILES["pimage"];
    $image_name=$nimg['name'];
    $img_tmp_path=$nimg['tmp_name'];
    $to = "post_img/$image_name";
    $m =  $_SESSION['email'];

$sql = "select farm_id from farmer Where '$m'=email ";  
$result = $conn->query($sql);  
        $row=$result->fetch();
        $id = (int) $row['farm_id'];


   $ti = $_POST['title'];
  $lo = $_POST['location'];
$min = $_POST['min_inv'];
$es = $_POST['est'];
$type = $_POST['farm_t'];
$d = $_POST['des'];
$pr = $_POST['prd'];

    $conn->exec("INSERT INTO post (Farmerfarm_id,title, location, min_invest, est_ret_profit, farm_type, description,picture, profit_deadline) VALUES ($id,'$ti', '$lo','$min' ,'$es', '$type', '$d','$to', '$pr')");
    move_uploaded_file($img_tmp_path, $to);
   
?>
                            <script>location.assign("farm_ui.php");</script>
                          <?php




}
 

}
catch(PDOException $e){
            echo 'Connection failed: ' . $e->getMessage();
      }
}
else
{
        ?>
                            <script>location.assign("login.html");</script>
                          <?php
       
}
 
?>