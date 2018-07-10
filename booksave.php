<?php
 // write the insert querries here
  include('sp_session.php');
  $title  = $_GET['title'];
  $author = $_GET['author'];
  $image  = $_REQUEST['image'];
  $image.="&printsec=frontcover&img=1&zoom=5&source=gbs_api";
  $status = $rating = $comment = "";
  function test_input($data) {
               $data = trim($data);
               $data = stripslashes($data);
               $data = htmlspecialchars($data);
               return $data;
                          }
if ($_SERVER["REQUEST_METHOD"] == "POST") { 

          $status = test_input($_POST["Status"]);
          $rating = test_input($_POST["Rating"]);
          $comment  = test_input($_POST["Comments"]);

        $sql="INSERT INTO books(name,title,author,image,status,rating,comments) VALUES ('$user_check','$title','$author','$image','$status','$rating','$comment')";
          $retval = mysqli_query($conn,$sql);
          if(!$retval)
         {
             die("<br>could not insert data".mysqli_error($conn));
         }
          header("location:sp_welcome.php");

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Save your books here</title>
	<style type="text/css">
		body{
			align-content: center;
			align-items: center;
			text-align: center;
			background-color: rgba(210,100,40,0.3);
		}
		  input[type=text] {
                    width: 20%;
                    color: black;
                    padding: 10px 10px 10px 10px;
                    margin: 10px 0;
                    border: 5px solid;
                    border-color: rgb(180,180,180);
                    height: 
                    }         
          input[type=number] {
                    width: 20%;
                    color: black;
                    padding: 10px 10px 10px 10px;
                    margin: 10px 0;
                    border: 5px solid;
                    border-color: rgb(180,180,180);
                    height: 
                    }
           input[type=submit] {
                     width: 19%;
                     background-color: blue;
                     color: white;
                     padding: 14px 20px;
                     margin: 8px 0;
                     border: 3px solid;
                     border-radius: 4px;
                     cursor: pointer;
                     }
	</style>
</head>
<body>
 <!--Insert signout code here                -->
<h1 style="font-size: 40px; font-weight: bold; color: red;">Save Your Books To Your Shelf</h1>
<h2 style="text-align: right;color: rgb(255,255,255);"><a href = "sp_logout.php">Sign Out</a></h2>
<h2 style="text-align: right;color: rgb(255,255,255);"><a href = "mybooks.html">Go back</a></h2>
  <form action="" method="post" autocomplete="off">
        	         
        	           <h2 style="color: violet;font-size: 35px;text-align: center">Status  </h2>
                     <select name="Status" style="padding-left: 85px;padding-right: 85px; padding-top: 10px;padding-bottom: 10px;">
                          <option value="Read">Read</option>
                          <option value="CurrentlyReading">CurrentlyReading</option>
                          <option value="WantingToRead">WantingToRead</option>
                      </select><br>
                     <input type="number" name="Rating" placeholder="Rating" min="1" max="5" required><br>
                     <input type="text" name="Comments" placeholder="Comments/Reviews" required><br>   
                     <input type="submit" name="submit">
                 </form>
</body>
</html>
