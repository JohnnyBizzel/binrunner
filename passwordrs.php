<?php
        include "include.php";
       /* include "about.php";*/
       //echo $user;
        ?>
<html xmlns="http://www.w3.org/1999/xhtml">
   
</head>
<body>
<div id="dialogoverlay"></div>
     <div id="dialogbox">
         <div>
            <div id="dialogboxhead"></div>
            <div id="dialogboxBody"></div>
            <div id="dialogboxfoot"></div>
         </div>
     </div> 
    
  <body> 
       <div id="pwbox">
        <div id="pwboxIn">

 <form method="post">   
  <tr>
             <h1 class="header1">Password Change</h1><br>
             <input type="password" name="psw0" placeholder="Old Password" id="submit"/>
             <input type="password" name="psw1" placeholder="New Password" id="submit"/>
             <input type="password" name="psw2" placeholder="Confirm the Password" id="submit" />
<button type="submit" class="button" name="Submit">Submit</button>
    
 </form>
            
 </div>
 </div>

 




</body>
 <?php
 $id= $userRow['user_id'];
 if(isset($_POST['Submit']))
 {
  $psw00 = mysql_real_escape_string($_POST['psw0']);
  $psw10 = mysql_real_escape_string($_POST['psw1']);
  $psw20 = mysql_real_escape_string($_POST['psw2']);
  $psw30 = md5(mysql_real_escape_string($_POST['psw0']));
  $psw40 = md5(mysql_real_escape_string($_POST['psw2']));
  
  
  
  $okayp = preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,128}$/', $psw20 );
   //echo $psw00;
   
   
   if($psw00 == "" || $psw10 == "" || $psw20 == "")
        {
       
     ?>
     <script>alert('All fields must be filled in');</script>


     <?php

        } 
        else if ($psw10 != $psw20) {
         ?>   
        
        <script>alert('Passwords do not match');</script>    
        <?php
        } 
        else if($okayp == FALSE){
            
        ?>
            <script>alert('Your password failed for one of the following reasons');</script>
            <script>alert('You need at least one number, one lowercase and one uppercase letter \n and at least eight characters that are letters and numbers ');</script>
            <?php
        }
        
 else {


        if ($userRow['password']==$psw30)
                {
            
                //$result = mysql_query("UPDATE users SET password=$psw40 WHERE user_id=$id") ;
                $result = mysql_query("UPDATE users SET password='$psw40' WHERE user_id=$id");
                ?>
                <script>alert('Password update was successful');</script>
                <?php
                header("Location: setting.php");
                exit;
                 
                
                }
        else {
            ?>
                <script>alert('Your old password is incorrect');</script>
                <?php
            
            
            
        }
        
   

        }    
 }

 
 ?>
    
    
    
    
   <?php    
include "footer.php";
     ?> 
    
</html>