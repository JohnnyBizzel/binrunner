<?php
session_start();
include 'include.php';
if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
$binrunner=$userRow['binrunner'];

?>
<html >
        <h1 class="top-header3">bin runner</h1>
        


<nav class="navbar navbar-default">
  <a class="navbar-brand" href="#">Menu</a>
  <div class="container-fluid">
        <button class = "navbar-toggle" data-toggle ="collapse" data-target =".navHeader-Collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
      <div class = "collapse navbar-collapse navHeader-Collapse">
                
           <ul class = "nav navbar-nav navbar-left">                      
               <li><a href="About.php">About</a></li>
               <li><a href="Setting.php">Setting's</a></li>
                <?php if($binrunner==TRUE){  ?> <li><a href="runnerjob.php">Runner Job's</a></li>  <?php } ?>
                <?php if($binrunner==TRUE){  ?> <li><a href="runnermap.php">Runner Map's</a></li>  <?php } ?>
                <?php if($binrunner==TRUE){  ?> <li><a href="competition.php">Competition</a></li>  <?php } ?>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="test.php">test</a></li>
                <li><a href="test2.php">test2</a></li>
                
                </ul>
                
                
                <ul class = "nav navbar-nav navbar-right"> 
                <li style="float:right"><a  href="logout.php?logout"><?php echo $userRow['firstname'];echo(' '); echo $userRow['lastname'] ; ?> Sign Out</a></li>
                                      
          </ul>
                
      </div>
        
        
        

  </div>   
</nav>  

   
</html>