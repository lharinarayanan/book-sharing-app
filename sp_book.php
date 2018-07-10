<?php
   
   include('sp_session.php');
    
   //$ses_empho = mysqli_query($conn,"SELECT user.name,image,email,telephone FROM user,frien  where user.id!='$userid' and user.name!=friend");
    $ses_empho = mysqli_query($conn,"SELECT * FROM books WHERE name = '$user_check'");
   //$row = mysqli_fetch_array($ses_empho,MYSQLI_ASSOC);
  
   $sq  =  "SELECT image FROM user WHERE name = '$user_check'";
   $res =   mysqli_query($conn,"$sq");
   $ro  =   mysqli_fetch_array($res,MYSQLI_ASSOC);  
   $h=9;
   $h-=2;
  //echo "Email:".$email."<br>";
   //echo "Telephone:".$telep."<br>";
   //header("Content-type: image/jpeg");
   //echo $row['image'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" content="Profile Page" description>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Books display</title>
  <style type="text/css">
  #image{
    padding-bottom: 10px;
    background-color: gold;
  }
  #gt{
       padding-top: 20px;
       padding-left: 180px;
       padding-bottom: 25px;

    }
    
    #una{
      padding-top: 30px;
      color: rgb(5,104,15);
      font-style: italic;
      font-weight: bold;
      font-size: 30px;
    
      padding-bottom: 10px;
      padding-left: 180px;
      
    }
    #Tele{
      color: rgb(5,104,15);
      font-style: italic;
      font-weight: bold;
      font-size: 30px;
      padding-left: 180px;
      padding-bottom: 30px;
    }
    #Tele{}
    #Edit {
             width: 19%;
             background-color: red;
             color: white;
             padding: 14px  0px;
             align-content: center;
             margin: 8px 0;
             border: 3px solid;
             border-radius: 4px;
             cursor: pointer;
                               }
    #unedit {
             padding-left: 38px;
             color: black;

            }
    #emedit {
             padding-left: 38px;
             color: black;

            }
    #phedit {
             padding-left: 38px;
             color: black;

            }
    #pass {
             padding-left: 14px;
             color: black;
          }
    #pass1 {
             padding-left: 14px;
             color: black;
          }              
          body{background-color: rgb(229,225,98);}                                                                 
    </style>
</head>
<body>
  <h2 style="text-align: right;color: rgb(255,255,255);"><a href = "sp_logout.php">Sign Out</a></h2>
  <h2 style="text-align: right;color: rgb(255,255,255);"><a href = "sp_welcome.php">Go Back</a></h2>
  <div id="image">
  <img src="<?php echo $ro['image']; ?>" height="10%" width="10%" altext="image" style="float: left; padding-bottom: 30px;padding-left: 50px;">
  <strong style="font-size: 15px; color: red; font-weight: bold; padding-left: 280px;">My Books
  </div>
   <?php

        while ($row = mysqli_fetch_array($ses_empho,MYSQLI_ASSOC)){
          if(mysqli_num_rows($ses_empho) ==0)
          {
            echo "<h1 style='font-style: bold; color:red; font-size:30px'>"."No books"."</h1>";
          }
                   
    ?> 
  <div id="gt">
    
      <img src="<?php echo $row['image']; ?>" height="10%" width="10%" altext="image" style="float: left;"> <div id="name" style="padding-left: 60px;padding-bottom: 10px;"><?php echo "Title:".$row['title'];?></div>
      <div id="phone" style="padding-left: 60px; padding-bottom: 10px;"><?php echo "Author:".$row['author']; ?><span id="pass" style="padding-left: 60px;"><a href="sp_bookdelete.php?id=<?php echo $row['title']; ?>">Remove Book</a></span></div>
      <div id="rating" style="padding-left: 60px; padding-bottom: 10px;"><?php echo"Rating:".$row['rating']; ?><br></div>
      <div id="status" style="padding-left: 60px;"><?php echo "Status:".$row['status']; ?><span id="pass1" style="padding-left: 60px;"><a href="sp_bookedit.php?id=<?php echo $row['title']; ?>">Edit Status/Comments/Ratings</a></span></div><br>
      <div id="comment" style="padding-left: 60px;"><?php echo "Comments:".$row['comments']; ?></div>

  
  </div> 
  <br><br>
   <?php }?>

  


     <!--   
     <div id="una"><?php //echo "USER NAME:". $name?><span id="unedit"><button onclick="location.href='modifyusername.php'">Edit</button></span></div>
     <div id="Email"><?php //echo "EMAIL:". $email?><span id="emedit"><button onclick="location.href='modifyemail.php'">Edit</button></span></div>
     <div id="Tele"><?php //echo "PHONE:".$telep?><span id="phedit"><button onclick="location.href='modifyphone.php'">Edit</button></span></div>
     <div id="Tele"><span id="pass"><button onclick="location.href='modifypass.php'">Password Edit</button></span></div>
      -->
  


</body>
</html>