<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "farm_together");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$user = mysqli_real_escape_string($link, $_REQUEST['username']);
$em = mysqli_real_escape_string($link, $_REQUEST['email']);
$ct = mysqli_real_escape_string($link, $_REQUEST['cnt']);
$pass = mysqli_real_escape_string($link, $_REQUEST['psw']);
$pass1 = mysqli_real_escape_string($link, $_REQUEST['psw_rep']);
		
if($pass!=$pass1) {
echo "Your passwords did not match";
exit;
}

$pass=md5($pass);
// Attempt insert query execution
$sql = "INSERT INTO investor (name, email, contact_number, password) VALUES ('$user', '$em','$ct' ,'$pass')";
if(mysqli_query($link, $sql)){
    header("Location:index.html");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>