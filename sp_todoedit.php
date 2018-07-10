<?php
include('sp_session.php');
 $todo_id= $_GET['id'];
 $record = "SELECT todotitle,task FROM todo WHERE id='$todo_id'";
 $spr = mysqli_query($conn,$record);
 $ntitle = mysqli_fetch_array($spr,MYSQLI_ASSOC);
 $note = $ntitle['todotitle'];
 $head = $ntitle['task'];
$mn="";$sq="";$name="";
function test_input($data) {
               $data = trim($data);
               $data = stripslashes($data);
               $data = htmlspecialchars($data);
               return $data;
                          }
  if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                             $name = test_input($_POST["Title"]);
                             $mn   = test_input($_POST["Task"]);      
      
    $sq = "UPDATE todo SET task='$mn',todotitle='$name',tdate=now() WHERE id='$todo_id' ";
if (mysqli_query($conn, $sq)) {
    echo "";
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
  <title>Modify Todo</title>
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
              #b{
                 padding-left: 10px;
                 padding-top: 14px;
                 padding-bottom: 14px;
                 width: 15%;
              }

  </style>
  <script type="text/javascript">
  </script>
</head>
 <body>
  <h2 style="text-align: right;color: rgb(255,255,255);"><a href = "sp_logout.php">Sign Out</a></h2>     
      <h1>Change your Todo</h1><br>
 <form name="notemodify"  method="post" id="abc" autocomplete="off">
              <div id="o">  
                <input type="text" name="Title" value="<?php echo $note ?>" id="l" placeholder="Title" required ><br>      
                <input type="text" name="Task" value="<?php echo $head ?>" id="b" placeholder="task" required ><br>
                <input type="submit" name="submit" value="EDIT">
              </div> 
 </body>
</html>