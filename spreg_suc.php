<?php 
   // define variables and set to empty values
  $name = $email  = $address = $tel = $pass=$imagetmp=$file_size=$file_type="";
  $errors= array();
  $imagename="";
  $expensions= array("jpeg","jpg","png");


    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
          $name = test_input($_POST["UserName"]);
          $pass = test_input($_POST["Password"]);
          $email = test_input($_POST["Email"]);
          $tel = test_input($_POST["telephone"]);
          $address = test_input($_POST["address"]);
          if(isset($_FILES['image'])){
           $imagename= $_FILES['image']['name'];
         }

          $imagetmp  = addslashes (file_get_contents($_FILES['image']['tmp_name']));
          $file_size = $_FILES['image']['size'];
          $file_type = $_FILES['image']['type'];
          
         



          //Get the content of the image and then add slashes to it 
          
          /*$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed for image file , please choose a JPEG or PNG file.Your image cannot be uploaded";
      }
      
      
      if(empty($errors)==true){
         //move_uploaded_file($file_tmp,"images/".$file_name);
         //echo "Success in uploading image file";
      }
      else{
         print_r($errors);
      }
   
*/
         
 /*if(!empty($_POST['hobies'])) {
// Counting number of checked checkboxes.
$checked_count = count($_POST['check_list']);
//echo "You have selected following ".$checked_count." option(s): <br/>";
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $selected) {
echo "<p>".$selected ."</p>";
}
 $hobby = test_input($_POST["hobies"]);
*/                                            }
        
          function test_input($data) {
               $data = trim($data);
               $data = stripslashes($data);
               $data = htmlspecialchars($data);
               return $data;
                          }
                          
         /*                            
echo "Your input is received as "."<br>"."Name : ".$name;
echo "<br>"."Password is : ".$pass;
echo "<br>"."Email is : ".$email;
echo "<br>"."Telephone nnumber is : ".$tel;
echo "<br>"."Address is : ".$address;
echo "<br>"."Gender is : ".$sex;
echo "<br>"."City is : ".$city;
echo "<br>Your details as stored in database will be";
*/
    $dbhost='localhost';
    $dbuser='root';
    $conn= mysqli_connect($dbhost,$dbuser);
     if(!$conn)
    {
	    die('could not connect'.mysql_error());
    }
     mysqli_select_db($conn,'hari_db');
       /*if(!$dbsel)
     {
	      die('c8ould not select db'.mysql_error());
      }*/
      //Password Encryption function
        $hashed_password = hash('sha512', $pass);
        $sql="INSERT INTO user(name,email,telephone,password,image) VALUES ('$name','$email','$tel','$hashed_password','$imagename')";
          $retval = mysqli_query($conn,$sql);
          if(!$retval)
         {
	         die("<br>could not insert data".mysqli_error($conn));
         }
            mysqli_close($conn);
          ?>

    <!DOCTYPE html>
    <html>
    <head>
      <title>Registration Success</title>
        <style type="text/css">
        body   {
                   background-color: rgba(224,178,42,0.3);
               }
        header {
                     padding-top: 10px;
                     padding-bottom: 30px;
                     background-color: rgb(120,250,30);             
               }    
        #blink    {
                    padding-top: 80px;  
                    color: rgb(80,200,255);
                    font-style: bold;
                    padding-left: 160px;
                    font-size: 40px;

                    }
                    span{
                           font-size: 50px;
                           font-family: cursive;
                           color: rgb(219,99,30);
                           animation: blink 1s linear infinite;
                        }
                   @keyframes blink{
                                     0%{opacity: 0;}
                                     50%{opacity: .5;}
                                     100%{opacity: 1;}
                                    }
         #btn       {

                    padding-top: 30px;
                    padding-left: 250px;
                    width: 19%;
                    background-color: red;
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
         
         <header>
          <h1 style="text-align: center;font-size: 40px; color: rgb(232,88,186); font-style: bold;text-shadow: 2px 2px 8px #FF0000;">DESI BOOKS</h1></header>

         <div id="blink"><span>You have Registered Successfully.</span><br> Please login to your account.

         <button id="btn" onclick="location.href='sp_login.php'">Go to login Page</button>
         </div>


     


    </body>
    </html>