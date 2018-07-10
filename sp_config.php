<?php
    $dbhost='localhost';
    $dbuser='root';
    $conn= mysqli_connect($dbhost,$dbuser);
     if(!$conn)
    {
      die('could not connect'.mysql_error());
    }
     mysqli_select_db($conn,'hari_db');
 ?>