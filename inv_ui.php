
<?php

session_start();

if(
        isset($_SESSION['email'])
        && !empty($_SESSION['email'])

){
    
  ?>
    <!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
    background-color: #eee
}

.time {
    font-size: 9px !important
}

.socials i {
    margin-right: 14px;
    font-size: 17px;
    color: #d2c8c8;
    cursor: pointer
}

.feed-image img {
    width: 100%;
    height: auto
}
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

<body>
  

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="farm_ui.php">FarmTogether</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
       
        <li class="nav-item active">
          <a class="nav-link" aria-current="page" href="farm_ui.php">Newsfeed</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" aria-current="page" href="post.html">Post for Investor</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signup.html"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>

    </div>

  </div>
</nav>




<br>
<br>
<form action="search.php" method="post"> 
Search: <input type="text" name="term" placeholder="Farm_type" /><br /> 
<input type="submit" value="Submit" /> 
</form> 
<br>

<div>
	<table id="ptable">
		<thead>
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

        <tbody>
        	<?php
               try{
                   $conn = new
                   PDO("mysql:host=localhost;dbname=farm_together;","root","");
                   $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                   $mysqlquery= "SELECT title,location,min_invest,est_ret_profit,farm_type,description,picture,profit_deadline FROM post";
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


        </tbody>


	</table>


</div>





  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    function searchfn(){
      location.assign('search.php');
    }
  </script>
</body>
</head>
</html>

<?php
}

else{
	
	header("Location:login.html");
	
}

?>



