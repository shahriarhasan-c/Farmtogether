<?php


session_start();
if( 
           isset($_SESSION['email'])
           && !empty($_SESSION['email'])
   
){
	unset($_SESSION['email']);
	session_destroy();
	
	 header("Location: index.html");
	
}
else{
	
	 header("Location:index.html");
	}
?>