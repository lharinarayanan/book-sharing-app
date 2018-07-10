<?php 
   include('sp_session.php');
   
   $todo_id= $_GET['id']; 
   $ses_note = mysqli_query($conn,"DELETE from todo where id = '$todo_id' ");
   if(!$ses_note)
   {
   	echo "Delete unsuccessful";
   }
  
   	     header("Location: sp_welcome.php");
    
?>