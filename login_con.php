<?php      
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "farm_together";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }
       
    $em = $_POST['email'];  
    $pa = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        //$em = stripcslashes($em);  
        //$password = stripcslashes($password);  
        //$email = mysqli_real_escape_string($con, $em);  
        //$pass = mysqli_real_escape_string($con, $password);  
       
        $pa=md5($pa);
        
        $sql = "select *from farmer where email = '$em' and password = '$pa'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
          session_start();
          $_SESSION['email'] = $em;
          header("Location:farm_ui.php");
        }
        
      else{
        echo $em;
        echo $pa;
             $sql1 = "select *from investor where email = '$em' and password = '$pa'";  
             $result = mysqli_query($con, $sql1);  
             $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
             $count1 = mysqli_num_rows($result);
              
             if($count1 == 1){  
                
              session_start();
          $_SESSION['email'] = $em;
          header("Location:inv_ui.php");
             } 
             else{  
                 echo "<h1> Login failed. Invalid Email or Password.</h1>";  
             }     
            }
?>    