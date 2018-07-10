<?php
   
   include('sp_session.php');
   $ses_empho = mysqli_query($conn,"select name,email,telephone,image from user where id = '$userid' ");
   $row = mysqli_fetch_array($ses_empho,MYSQLI_ASSOC);
   $name =  $row['name'];
   $email = $row['email'];
   $telep = $row['telephone'];
   //$sq = "SELECT image FROM user WHERE name = '$user_check'";
   //$result = mysqli_query($conn,"$sq");
  
   $img   = $row['image'];
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
	<title>Profile Page</title>
	<style type="text/css">
	#gt{
       padding-left: 180px;

    }
    #email{
    	padding-top: 20px;
    	color: rgb(5,104,15);
    	font-style: italic;
    	font-weight: bold;
    	font-size: 30px;
    	padding-left: 180px;
    	padding-bottom: 30px;
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
    #Edit {
                                     width: 19%;
                                     background-color: red;
                                     color: white;
                                     padding: 14px 	0px;
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

                                                                                   
    </style>
</head>
<body>
  <img src="<?php echo $img;?>" height="30">
  <div id="gt">
     <div id="una"><?php echo "USER NAME:". $name?><span id="unedit"><button onclick="location.href='sp_modifyusn.php'">Edit</button></span></div>
     <div id="Email"><?php echo "EMAIL:". $email?><span id="emedit"><button onclick="location.href='sp_modifyemail.php'">Edit</button></span></div>
     <div id="Tele"><?php echo "PHONE:".$telep?><span id="phedit"><button onclick="location.href='sp_modifyphone.php'">Edit</button></span></div>
     <div id="Tele"><span id="pass"><button onclick="location.href='sp_modifypass.php'">Password Edit</button></span></div>
      
  </div>


</body>
</html>