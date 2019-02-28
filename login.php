<?php
   include("config.php");
   session_start();
 
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,md5 ($_POST['password'])); 
      
      $sql = "SELECT uid FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      
      
      if($count == 1) {
        
         $_SESSION['username']=$myusername;
		 $_SESSION['uid']=$row['uid'];
         $_SESSION['test']=1;
         header('Location: index.php');
      }else {
          // $_SESSION['test']=0;
           $message = "Username or Password is incorrect.\\nTry again.";
            echo "<script type='text/javascript'>alert('$message');window.location = 'login.html';</script>";
			
      
       }
   }
  
?>