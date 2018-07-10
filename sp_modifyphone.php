<?php
include('sp_session.php');
$mn="";$sq="";$phiod="";
function test_input($data) {
               $data = trim($data);
               $data = stripslashes($data);
               $data = htmlspecialchars($data);
               return $data;
                          }
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
          $phiod = test_input($_POST["Phone"]);
      
      
$sq = "UPDATE user SET telephone='$phiod' WHERE id='$userid' ";
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
	<title>Modify phone</title>
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
                  font-size: 15px;          }
              #l{
                 padding-left: 10px;
                 padding-top: 14px;
                 padding-bottom: 14px;
                 width: 15%;
              }

	</style>
  <script type="text/javascript">
    function validateForm() {
      var w = document.forms["phodify"]["Phone"].value;
      var eval=1;
      var i=0;
      var j=w.length;
      if(w=="")
       {
       document.getElementById('e').innerHTML="<span style='color: blue;'>**phone no. must be filled out";
        eval=0;
      }
    else{
           
           for( ;i<j;i++)
        {
          if((w[i]>=0&&w[i]<=9))
        {
          continue;
        }
        else
        {
        document.getElementById('e').innerHTML="<span style='color: blue;'>**phone number must contain only numbers";
        eval=0;
        break;}
    }
  }   
       if(eval==1)
       {
      document.getElementById('e').innerHTML="";
      return true;      
     }
   else {return false;}
}
  </script>
</head>
 <body>
                <h2 style="text-align: right;color: rgb(255,255,255);"><a href = "sp_logout.php">Sign Out</a></h2>     
                 <h1>Change your Phone Number</h1><br>
                <form name="phodify"  onsubmit="return validateForm()" method="post"  id="abc"    autocomplete="off">
                <div id="o">  
                <input type="telephone"  name="Phone" value="<?php echo $pho?>" id="l" required  ><span id="e"></span>
                <input type="submit" name="submit" value="EDIT">
                </div>
 </body>
</html>


