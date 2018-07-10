<?php
include('sp_session.php');
$passold=$passnew=$error=$hash_password=$has_password="";
   function test_input($data) {
               $data = trim($data);
               $data = stripslashes($data);
               $data = htmlspecialchars($data);
               return $data;
                                 }
             //                    echo $passwor;
  
     if ($_SERVER["REQUEST_METHOD"] == "POST") { 
          $passold = test_input($_POST["oldpass"]);
          $passnew = test_input($_POST["newpass"]);
                                               
     
      $hash_password = hash('sha512', $passold);
      if($passwor==$hash_password)
      {
        $error="";
        $has_password = hash('sha512', $passnew);
        $pq = "UPDATE user SET password='$has_password' WHERE id='$userid' ";
       if (mysqli_query($conn, $pq)) {
             echo "";
  
    } 
else {
    echo "Error updating record: " . mysqli_error($conn);
  }

        header("location:sp_welcome.php");
      }
      else
      {
         $error="Incorrect Password entered";
      }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" description="Password Check" >
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Password Changing</title>
        <style>
           body{
                 background-color: rgba(21,118,12,0.9);
                }
             h1{
                 text-align: center;
                 color: rgb(200,10,70);
                 font-weight: bold;
                 font-size: 35px;
                 font-family: Ariel;
                 padding-top: 20px;
                 padding-bottom: 20px;
              } 
              #pqr{
                text-align: center;
                align-content: center;
                padding-top: 10px;
              }  
              #t{
                 padding-left: 10px;
                 padding-top: 14px;
                 padding-bottom: 14px;
                 width: 25%;
              }
              #p{
                 padding-left: 10px;
                 padding-top: 14px;
                 padding-bottom: 14px;
                 width: 25%;
              }
           #co1{
                 padding-bottom: 15px;
                }
            #su {
                  background-color: orange;
                  cursor: pointer;
                  color: blue;
                  width: 15%;
                  padding-top: 10px;
                  padding-bottom:  10px;
                  font-style: italic;
                  font-weight: bold;
            }    
                

        </style>


</head>
<body>
<h2 style="text-align: right;color: rgb(255,255,255);"><a href = "sp_logout.php">Sign Out</a></h2>     
      <h1>Change your Password</h1><br>
      <form name="passwordcheck" method="post" id="pqr" autocomplete="off">
          <div id="co1">
          <input type="password" name="oldpass" placeholder="Enter existing password" id="t" required><span id="error" style="color: red;"><?php echo "$error";  ?></div><br>
          <div id="co1">
          <input type="password" name="newpass" placeholder="Enter new password" id="p" required></div><br>
          <input type="submit" name="subpass" id="su" value="Change Password">

</body>
</html>