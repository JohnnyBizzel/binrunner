
<html lang="en">
<?php   include 'include.php';
?>
<body>
    <h1 class="top-header1">bin runner</font></h1>  
<div class="top-header2">

  <button href="#" data-toggle="modal" data-target="#login-modal" class="btn btn-primary">Login</button>
  <button href="#" data-toggle="modal" data-target="#login-modal1" class="btn btn-primary">Password Reset</button>
  <button href="#" data-toggle="modal" data-target="#login-modal2" class="btn btn-primary">Sign Up</button>
  
</div>


<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Login to Your Account</h1><br>
				  <form method="post"> 
					<input type="text" name="email1" placeholder="E-mail">
					<input type="password" name="password" placeholder="Password">
					<input type="submit" name="Login" class="login loginmodal-submit" value="Login">
				  </form>
				</div>
			</div>
		  </div>
    
<div class="modal fade" id="login-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>password reset</h1><br>
				  <form method="post"> 
					<input type="text" name="email" placeholder="E-mail">
					<input type="submit" name="submit" class="login loginmodal-submit" value="Submit">
				  </form>
				</div>
			</div>
		  </div>    
</body>
<div class="modal fade" id="login-modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Sign Up</h1><br>
				  <form method="post"> 
                                        <input type="text" name="firstname" placeholder="First Name">
                                        <input type="text" name="lastname" placeholder="Last Name">
                                        <input type="text" name="email01" placeholder="E-mail">
                                        <input type="password" name="password01" placeholder="Password">
                                        <input type="password" name="password02" placeholder="Confirm Password ">
					<input type="submit" name="signup" class="login loginmodal-submit" value="Sign Up">
				  </form>
				</div>
			</div>
		  </div>    
</body>




</html>

<?php

//session_start();

if(isset($_SESSION['user'])!="")
{
 header("Location: Setting.php");
 exit;
}



if(isset($_POST['Login']))
    {
                    $email=$_POST['email1'];
                    $password=$_POST['password'];
                    $email = mysql_real_escape_string($_POST['email1']);
                    $password = mysql_real_escape_string($_POST['password']);
                    $res=mysql_query("SELECT * FROM users WHERE email='$email'");
                    $row=mysql_fetch_array($res);

                    if($row['adminactive'])
                        {
                        if($row['password']==md5($password))
                            {
                                if($row['active']){   
                                    $_SESSION['user'] = $row['user_id'];
                                    header("Location: startlogon.php");
                                    exit;
                                    }
                                else 
                                    {
                                     ?>
                                     <script>alert('your acont is not active');</script>
                                      <?php
                                     }
                            }
                                else
                                {
                                ?>
                                <script>alert('wrong details');</script>
                                <?php
                                }
                        }
                        else
                            {
                            ?>
                            <script>alert('you have been blocked by the Administrator');</script>
                            <?php
                            }
                    } 

 
                    
                    
//   session_start();                 
               

if(isset($_POST['submit']))
    
 {
    $email=$_POST['email'];
    $random1 = rand(111111, 99999999);
    $okaye = preg_match('/^[A-z0-9_\-]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z.]{2,4}$/', $email ); 

if($email == "") 
     {
     ?>      
                    <script>alert('enter an E-mail address');</script>
     <?php
    } 
 else if($okaye == FALSE)    
 {
    
    ?>
             <script>alert('your E-mail is not right \nPlease try again ');</script>
     
   <?php   
 }else { 
     
                    $email = mysql_real_escape_string($_POST['email']);
                    $res=mysql_query("SELECT * FROM users WHERE email='$email'");
                    $row=mysql_fetch_array($res);
                    $firstname =$row['firstname'];
                    
                 
      
       if($row['email']){

                $email1 =$row['email'];
                $firstname =$row['firstname'];
                $lastname =$row['lastname'];
                $listid =$row['user_id'];
                
                $result = mysql_query("UPDATE users SET random='$random1' WHERE user_id=$listid");
                    

                
                
                    mailspw($email1,$firstname,$lastname,$random1,$listid);

            ?>
                <script>alert('Please check your email to reset your password');</script>
            <?php

            }
             else{
            echo "email is not valid";
            exit;
            }
    }
}
 
//session_start();


if(['btn-signup']==TRUE){
    
}
    
if(isset($_POST['signup']))
 {
 $firstname = mysql_real_escape_string($_POST['firstname']);
 $lastname = mysql_real_escape_string($_POST['lastname']);
 $email1 = mysql_real_escape_string($_POST['email01']);
 $psw00 = (mysql_real_escape_string($_POST['password01']));
 $upass = md5(mysql_real_escape_string($_POST['password01']));
 $upasss = md5(mysql_real_escape_string($_POST['password02']));
  $xx = 0;
  $xx ++;
  $random = rand(111111, 99999999);
  
}

 //echo $xx;

$okaye = preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/', $email1 );

  //   /^[a-zA-Z][0-9a-zA-Z_!$@#^&]{5,20}$/
$okayp = preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,128}$/', $psw00 );
//$okayp = preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,128}$/', $upasss );
$okayfn = preg_match('/^[a-zA-Z ]*$/', $firstname );
$okayln = preg_match('/^[a-zA-Z ]*$/', $lastname );


        
 if(($firstname == "" || $lastname == "" || $email1 == "" || $upass == "" || $upasss == "")   && $xx >= 1 )
     {
     ?>
      
       <script>"Alert.render('You need to fill in every field for signup')">Infinity Custom Alert </script>

     <?php
     $xx = 0;
 } 

if(($okayln == FALSE) && $xx >= 1)    
 {
    ?>
      
       <script>alert('Last Name must have English characters');</script>
        <script>alert('You need to fill in every field for signup');</script>
     
   <?php   
    $xx = 0;
 } 
 
 
 
 

 if(($okaye == FALSE) && $xx >= 1)    
 {
    ?>
             <script>alert('your e-mail is not right \nPlease try again ');</script>
     
   <?php   
    $xx = 0;
 }
  if(($okayfn == FALSE) && $xx >= 1 )    
 {
    ?>
            <script>alert('First Name must have English characters');</script>
      
   <?php   
    $xx = 0;
 }
   if(($upass != $upasss)  && $xx >= 1 )    
 {
    ?>
      
      <script>alert('your password is not right \nPasswords must be the same \nPlease try again');</script>
      
   <?php  
   
    $xx = 0;
 }
 
 
 if(($okayp == FALSE) && $xx >= 1)    
 {
    ?>
      
       <script>alert('Your password failed for one of the following reasons');</script>
       <script>alert('You need at least one number, one lowercase and one uppercase letter \n and at least eight characters that are letters and numbers ');</script>
  
   <?php   
    $xx = 0;
 } 
 
 
 
 if(1 == $xx)
 {
    if(mysql_query("INSERT INTO users(email,password,firstname,lastname,random) VALUES('$email1','$upass','$firstname','$lastname','$random')"))
        {
     
            ?>

                <script>alert('Successfully Registered \nPlease check your email for activation ');</script>
       
        <?php
    $listid = mysql_insert_id();    
    mails($email1,$firstname,$lastname,$random,$listid);
    //echo "$listid";   
       
 }
 

 else
 {
  ?>
        
        <script type="text/" >window.alert('error while registering \nPlease try again ');</script>
        <?php
 
        }

 }
 
 
 
 
 
?>