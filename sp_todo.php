<?php
   
   include('sp_session.php');
   $ses_note = mysqli_query($conn,"SELECT id,todotitle,task,tdate from todo where name = '$user_check' order by tdate asc");
   
  
  
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
  <title>Todo Page</title>
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
      input[type="checkbox"]{
  width: 20px; /*Desired width*/
  height: 20px; /*Desired height*/
  cursor: pointer;

}  

input[type=checkbox]:checked + label {
  color:red;
  text-decoration: line-through;
}                                          
    </style>
    <script type="text/javascript">
      function hello(){
                          
                    var ele = document.getElementById("stri");
                    ele.style.textDecoration = 'line-through';
                    //ele.style.setProperty("text-decoration","line-through");
      }
      function bye(){
                          
                    var ele = document.getElementById("stri");
                    ele.style.textDecoration = 'none';
                    //ele.style.setProperty("text-decoration","bold");
      }
    </script>
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
               <div id="stri">
      
               <input type="checkbox" value="second_checkbox" id="cbox2"><label for="cbox2">
               Todo <?php echo $i?>&nbsp;&nbsp;&nbsp;:
               <?php echo $row['todotitle']?>--
               <span id="l"><?php echo $row['task']?></span></label>
             
               </div>
               <!--<button onclick="hello()">Check</button>
               <button onclick="bye()">Uncheck</button><br>-->
               <a href="sp_todoedit.php?id=<?php echo $row['id']?>" style="color: black;">Edit Todo</a><br>
               <a href="sp_tododelete.php?id=<?php echo $row['id']?>">Delete</a><br>
               <span><?php echo $row['tdate']?></span>
                 <?php $i++;?>
             </div>        

         <?php }
         
         if($j==2)
          echo "<strong style='font-size:30px; padding-left:180px; padding-bottom:50px;'>"."No todo task"."</strong>";
      ?>    
     <div id="Tele"><span id="pass"><button onclick="location.href='sp_newtodo.php'" style="color: black;">Add Todo</button></span></div>
      
  </div>
</body>
</html>