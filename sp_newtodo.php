<?php
       include('sp_session.php');
       $sql=$retval=$title = $description="";
       $errors= array();
       function test_input($data) {
               $data = trim($data);
               $data = stripslashes($data);
               $data = htmlspecialchars($data);
               return $data;
                          }
 
       
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
          $title = test_input($_POST["Title"]);
          $description = test_input($_POST["todoDescription"]);
            
    $sql="INSERT INTO todo(name,todotitle,task,tdate) VALUES ('$user_check','$title','$description',now())";
       $retval = mysqli_query($conn,$sql);
          if(!$retval)
         {
	         die("<br>could not insert data".mysqli_error($conn));
         }
         else{
          header("location:sp_welcome.php");
          }
      }
   ?>
   <!DOCTYPE html>
   <html>
   <head>
   	<title>Create new Todo</title>
   	  <style>
         body{
              background-color: rgb(219,219,26);      
             }
         #header{
                   padding-top: 20px;
                   padding-left: 200px;
                }
        #h1{
        	font-weight: bold;
        	color: rgb(219,13,85);
        	font-size: 30px;
        	text-align: center;
        }
         input[type=text] {
                              width: 30%;
                              color: black;
                              padding: 20px 20px 20px 20px;
                              margin: 10px 0;
                              border: 5px solid;
                              border-color: rgb(180,180,180);
                              
                               }
          input[type=submit] {
                                 width: 19%;
                                 background-color: green;
                                 color: white;
                                 padding: 14px 20px;
                                 margin: 8px 0;
                                 border: 3px solid;
                                 border-radius: 4px;
                                 cursor: pointer;
                               } 
           #abc   {
                       text-align: center;
                  }
      </style>
   </head>
   <body>
   	<h2 style="text-align: right;color: rgb(255,255,255);"><a href = "sp_logout.php">Sign Out</a></h2>   
      <div id="header"><h1 style="color: blue;font-size: 35px;font-weight: bold;">Create your Todo</h1></div>
        <form method="post" autocomplete="off" id="abc">
                     <input name="Title" type="text" placeholder="Todo title"><br>
                     <input name="todoDescription" type="text" placeholder="Todo"><br>
                     <input type="submit" name="submit" value="submit">
        </form>
   </body>
   </html>