<?php
   include('sp_config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"SELECT name from user where name = '$user_check' ");
   
   $id = mysqli_query($conn,"SELECT id from user where name = '$user_check' ");
   $emi = mysqli_query($conn,"SELECT email from user where name = '$user_check' ");
   $Ph  = mysqli_query($conn,"SELECT telephone from user where name = '$user_check' ");
   $pas = mysqli_query($conn,"SELECT password from user where name = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $rowid =  mysqli_fetch_array($id,MYSQLI_ASSOC);
   $emid = mysqli_fetch_array($emi,MYSQLI_ASSOC);
   $ph = mysqli_fetch_array($Ph,MYSQLI_ASSOC);
   $pass = mysqli_fetch_array($pas,MYSQLI_ASSOC);
   $passwor = $pass['password'];
   $pho = $ph['telephone'];
   $userid = $rowid['id']; 
   $login_session = $row['name'];
   $emiid = $emid['email'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:sp_login.php");
   }
?>