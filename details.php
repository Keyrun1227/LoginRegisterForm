<?php
include_once  "config.php";
session_start();

if(!isset($_SESSION['admin_name'])){
	header('location:login_form.php');
 }
$query="select * from user_form";
$result=mysqli_query($conn,$query); 
$_SESSION['download']="download";
?> 
<!DOCTYPE html> 
<html> 
	<head>
		<title> REGISTERATION DETAILS </title> 
        <style>
	        .button{
			display: inline-block; 
			text-decoration:none;
            padding:10px 30px;
            font-size: 20px;
            background: #333;
            color:#fff;
            margin:0 5px;
            text-transform: capitalize;
            }

            .button:hover {
				background: crimson;
            }

		</style>
	</head> 
	<body> 
	<table align="center" border="1px" style="width:600px; line-height:40px;"> 
	<tr> 
		<th colspan="4"><h2>EVENT REGISTERATION DETAILS</h2></th> 
		</tr> 
			  <th> ID </th> 
			  <th> Name </th> 
			  <th> Email </th>  
              <th> User-Type </th> 
			  
		</tr> 
		
		<?php 
        while($rows=mysqli_fetch_assoc($result)) 
		{ 
        ?>
		<tr> <td><?php echo $rows['id']; ?></td> 
		<td><?php echo $rows['name']; ?></td> 
		<td><?php echo $rows['email']; ?></td> 
    
		<td><?php echo $rows['user_type']; ?></td> 
		</tr>
        <?php
         } 
        ?> 

	</table><br><br>
	<center>
	<a href="pdf.php" name="pdf"  class="button">Download</a>
      <a href="logout.php" class="button">Logout</a>
	  <center>
	</body> 
</html>

