  <?php
            include "navbar.php";        
        ?>
<html>
  <body> 
      <div id="conBox1">
        
                <form method="post">
               
        
                    <b>From <?php echo $userRow['firstname']; ?> <?php echo $userRow['lastname']; ?> </b><br><br>

    <label for="inputdefault">Your message:</label><br><br>
    <textarea name="message" rows="25" cols="75"></textarea><br>
    <button style="float: left; margin: 5px;"   type="submit" class="btn btn-primary btn-lg"   name="SAVE">  SEND  </button><br>

    </form> 
</div>
</body>

    
</html>

<?php
$message=$_POST['message'];
if(isset($_POST['SAVE']) && $message != "" ){
    
               $firstname= $userRow['firstname'];
               $lastname= $userRow['lastname'] ;
    
    $message=$_POST['message'];
mailsct($firstname,$lastname,$message);
?>
<script>alert('your message has been successfully sent');</script>

<?php


 exit;
}
 else {
    echo 'no';    
}



?>

   <?php    
include "footer.php";

     ?> 
