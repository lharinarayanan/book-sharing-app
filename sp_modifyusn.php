<?php
include('sp_session.php');
$mn="";$sq="";$name="";
function test_input($data) {
               $data = trim($data);
               $data = stripslashes($data);
               $data = htmlspecialchars($data);
               return $data;
                          }
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
          $name = test_input($_POST["UserName"]);
      
      
$sq = "UPDATE user SET name='$name' WHERE id='$userid' ";
$pq = "UPDATE books SET name='$name' WHERE name='$user_check'";
if (mysqli_query($conn, $sq) && mysqli_query($conn, $pq) ) {
    echo "";
    $_SESSION['login_user']=$name;
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
	<title>Modify User Name</title>
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
              #o{text-align: center;}
              #l{
                 padding-left: 10px;
                 padding-top: 14px;
                 padding-bottom: 14px;
                 width: 15%;
              }

	</style>
	<script type="text/javascript">
      function validateForm() {
      var x = document.forms["usnmodify"]["UserName"].value;		
      var i=0;
      var j=x.length;
      var eval=1;
      if (x == "") {
        document.getElementById('userid').innerHTML="<span style='color: blue;'>**Name must be filled out";
        eval=0;
        //alert("ch");
          }
     else{
      var e=9;
      for( ;i<j;i++)
      {
        if((x.charAt(x[i])>="A"&&x.charAt(x[i])<="Z")||(x.charAt(x[i])>="a"&&x.charAt(x[i])<="z"))
        {
          continue;
        }
        else
        {
           document.getElementById('userid').innerHTML="<span style='color: blue;'>**Name must contain alphabets only";
           eval=0;
           alert("h");
           break;}
    
    }
  }
 
            if(eval==1){
             document.getElementById('userid').innerHTML="";
             return true;
           }
          else{         
               return false;}
                                 }
       

	</script>
</head>
 <body>
  <h2 style="text-align: right;color: rgb(255,255,255);"><a href = "sp_logout.php">Sign Out</a></h2>     
      <h1>Change your User Name</h1><br>
 <form name="usnmodify"  onsubmit="return validateForm()" method="post" id="abc" autocomplete="off">
              <div id="o">  
                <input type="text" name="UserName" value="<?php echo $user_check ?>" id="l" required ><span id="userid"></span>
                <input type="submit" name="submit" value="EDIT">
              </div> 
 </body>
</html>