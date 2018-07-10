<?php
include('sp_config.php');
$uname=$_REQUEST['name'];
if(preg_match("/[^a-z0-9A-Z]/",$uname))//PHP REGEXP used here beside......
{
print "<span style=\"color:white;\">Username contains illegal charaters.</span>";
exit;
}

$data=mysqli_query($conn,"SELECT * FROM user where name='$uname'");
if(mysqli_num_rows($data)>0)
{
print "<span style=\"color:white;\">Username already exists :(</span>";
}
else
{
print "<span style=\"color:green;\">Username is available :)</span>";
}
?>