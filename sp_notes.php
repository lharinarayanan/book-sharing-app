<?php
   
   include('sp_session.php');
   $ses_note = mysqli_query($conn,"SELECT id,title,note,notetime from notes where name = '$user_check' order by notetime asc");
   
  
  
   //$sq = "SELECT image FROM user WHERE name = '$user_check'";
   //$result = mysqli_query("$sq");
  
   //$img   = $row['image'];
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
  <title>Note Page</title>
  <style type="text/css">
  body {

  }
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
      font-size: 35px;
      padding-left: 180px;
      padding-bottom: 30px;
    }
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
          #l {font-size: 25px;}                                         
    </style>
</head>
<body>
  
  <div id="gt">
     <?php
           $i=1;
           $j=2;

           while($row = mysqli_fetch_array($ses_note,MYSQLI_ASSOC)){
           $j=3;

           ?> 
             <div id="una">
               <span>Note <?php echo $i?></span><br>
               <span><?php echo $row['title']?></span><br>
               <span id="l"><?php echo $row['note']?></span><br>

               <a href="sp_noteedit.php?id=<?php echo $row['id']?>" style="color: black;">Edit Note</a><br>
               <a href="sp_notedelete.php?id=<?php echo $row['id']?>">Delete</a><br>
               <span><?php echo $row['notetime']?></span>
                 <?php $i++;?>
             </div>        

         <?php }
         
         if($j==2)
          echo "<strong style='font-size:30px; padding-left:180px; padding-bottom:50px;'>"."No notes"."</strong>";
      ?>    
     <div id="Tele"><span id="pass"><button onclick="location.href='sp_newnote.php'" style="color: black;">Add Note</button></span></div>
      
  </div>
</body>
</html>

