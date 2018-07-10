<?php 
   include('sp_session.php');
   
   $note_id= $_GET['id']; 
   $ses_note = mysqli_query($conn,"DELETE from notes where id = '$note_id' ");
   if(!$ses_note)
   {
   	echo "Delete unsuccessful";
   }
  
   	     header("Location: sp_welcome.php");
    
?>