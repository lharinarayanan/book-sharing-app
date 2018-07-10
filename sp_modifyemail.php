<?php
include('sp_session.php');
$mn="";$sq="";$emiod="";
function test_input($data) {
               $data = trim($data);
               $data = stripslashes($data);
               $data = htmlspecialchars($data);
               return $data;
                          }
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
          $emiod = test_input($_POST["Email"]);
      
      
$sq = "UPDATE user SET email='$emiod' WHERE id='$userid' ";
if (mysqli_query($conn, $sq)) {
    echo "";
    //$_SESSION['login_user']=$name;
    header("location:sp_welcome.php");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Modify Email</title>
	<style type="text/css">
		body{
			background-color: rgb(226,15,93);
		}
    h1{
                 text-align: center;
                 color: yellow;
                 font-weight: bold;
                 font-size: 35px;
                 font-family: Ariel;
                 padding-top: 20px;
                 padding-bottom: 20px;
              }
              #o{text-align: center;
                font-size: 15px;}
     #l{
                 padding-left: 10px;
                 padding-top: 14px;
                 padding-bottom: 14px;
                 width: 15%;
              }
	</style>
</head>
 <body>
  <h2 style="text-align: right;color: rgb(255,255,255);"><a href = "sp_logout.php">Sign Out</a></h2>     
      <h1>Change your Email</h1><br>
 <form name="emmodify" enctype="multipart/form-data onsubmit="return validateForm()" method="post"  id="abc"    autocomplete="off" >
             <div id="o">
                <input type="email"  name="Email" value="<?php echo $emiid ?>" id="l" required ><span id="e"></span>
                <input type="submit" name="submit" value="EDIT">
              </div>
 </body>
</html>