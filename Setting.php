  <?php
        include "navbar.php";
                    $binrunner1 = $userRow['binrunner']; 
                    $checked1 = ($binrunner1) ? 'checked="checked"' : ''; 
                    $binout1 = $userRow['binout'];
                    $checked2 = ($binout1) ? 'checked="checked"' : '';
?>
<html>
     <form role="form" method="post">
      
          <div id="TestBoxTop">
          <input type="checkbox" <?php echo $checked1; ?> name="binrunner" ><b> ..Do you want to be a bin runner / take bins out?</b>
          <button style="float: right; margin: 2.5px;"   type="submit" class="btn btn-primary btn-lg"   name="SAVE">  SAVE  </button><br>
          <input type="checkbox" <?php echo $checked2; ?> name="binout" > <b>..Do you want your bin taken out:</b><br>
          </div>
     
         <div id="TestBox1out">
            <div id="testBox1">
                <div id="testBoxIn">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12"> 
                        <?php include 'Setting/box1.php';?>
                    </div>                      
                </div>
            </div>
            <div id="testBox2">
                <div id="testBoxIn">
                    <?php include 'Setting/box2.php';?>
                </div>
            </div> 
            </div>

            <script>
            var input = document.getElementById('autocomplete');
            var autocomplete = new google.maps.places.Autocomplete(input);
            </script>          
</form>            

 </body> 
</html>






<?php include "footer.php";
?>



<?php


$id= $userRow['user_id'];

 if(isset($_POST['SAVE'])){
     

        if($binout=$_POST['binout'] == TRUE )   
        {   
        $result = mysql_query("UPDATE users SET binout='1' WHERE user_id=$id");
        }  
        elseif($binout=$_POST['binout']== FALSE )   
        {
        $result = mysql_query("UPDATE users SET binout='0' WHERE user_id=$id");
        } 
        
        if($binrunner=$_POST['binrunner'] == TRUE )   
        {   
        $result = mysql_query("UPDATE users SET binrunner='1' WHERE user_id=$id");
        }  
        elseif($binrunner=$_POST['binrunner']== FALSE)   
        {  
        $result = mysql_query("UPDATE users SET binrunner='0' WHERE user_id=$id");
        }
        
        if($firstname=$_POST['firstname']==TRUE )   
        {   $firstname=$_POST['firstname'];
        $result = mysql_query("UPDATE users SET firstname='$firstname' WHERE user_id=$id") ;
        }
        if($lastname=$_POST['lastname']==TRUE )   
        {   $lastname=$_POST['lastname'];
        $result = mysql_query("UPDATE users SET lastname='$lastname' WHERE user_id=$id") ;
        } 
        if($phone=$_POST['phone']==TRUE )   
        { $phone=$_POST['phone'];
        $result = mysql_query("UPDATE users SET phone='$phone' WHERE user_id=$id") ;
        } 
        if($email=$_POST['email']==TRUE )   
        { $email=$_POST['email'];
        $result = mysql_query("UPDATE users SET email='$email' WHERE user_id=$id") ;
        }
        if($numberA=$_POST['numberA']==TRUE )   
        { $numberA=$_POST['numberA'];
        $result = mysql_query("UPDATE users SET numberA='$numberA' WHERE user_id=$id") ;
        }
        if($addressA=$_POST['addressA']==TRUE ) 
        { $addressA=$_POST['addressA'];
        $result = mysql_query("UPDATE users SET addressA='$addressA' WHERE user_id=$id") ;
        
        $result = mysql_query("UPDATE users SET addressA='$addressA' WHERE user_id=$id"); 
        
       
        $address =   $addressA; 
        //$address = '3500 Jean Talon Ouest, Montreal, QC H3R 2E8 Canada';
	$coordinates = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($address) . '&sensor=true');
	$coordinates = json_decode($coordinates);
 
	 'Latitude:' . $coordinates->results[0]->geometry->location->lat;
	 'Longitude:' . $coordinates->results[0]->geometry->location->lng;
 
	$lat = $coordinates->results[0]->geometry->location->lat;
	$lng = $coordinates->results[0]->geometry->location->lng;
              
                $result = mysql_query("UPDATE users SET lat='$lat' WHERE user_id=$id");
                $result = mysql_query("UPDATE users SET lng='$lng' WHERE user_id=$id");
        }
        
        
        if($binslocatedA=$_POST['binslocatedA']==TRUE )   
        { $binslocatedA=$_POST['binslocatedA'];
        $result = mysql_query("UPDATE users SET binslocatedA='$binslocatedA' WHERE user_id=$id") ;
        }
        if($gateA=$_POST['gateA']==TRUE )   
        { $gateA=$_POST['gateA'];
        $result = mysql_query("UPDATE users SET gateA='$gateA' WHERE user_id=$id") ;
        }
        if($obstaclesA=$_POST['obstaclesA']==TRUE )   
        { $obstaclesA=$_POST['obstaclesA'];
        $result = mysql_query("UPDATE users SET obstaclesA='$obstaclesA' WHERE user_id=$id") ;
        }
        
        
        
        
        
        
        /* box  2  */
        
        //AAAAAAAAAAA
    
        
        if($RUbinout=$_POST['RUbinout'] != TRUE )   
        {   
        $result = mysql_query("UPDATE users SET RUbinout='0' WHERE user_id=$id");
        }  
        elseif($RUbinout=$_POST['RUbinout']!= FALSE )   
        {
        $result = mysql_query("UPDATE users SET RUbinout='1' WHERE user_id=$id");
        } 
        if($rubbishcolorA=$_POST['rubbishcolorA']==TRUE )   
        { $rubbishcolorA=$_POST['rubbishcolorA'];
        $result = mysql_query("UPDATE users SET rubbishcolorA='$rubbishcolorA' WHERE user_id=$id") ;
        }
        if($rubbishtimeFA=$_POST['rubbishtimeFA']==TRUE )   
        { $rubbishtimeFA=$_POST['rubbishtimeFA'];
        $result = mysql_query("UPDATE users SET rubbishtimeFA='$rubbishtimeFA' WHERE user_id=$id") ;
        }
        if($dateAR=$_POST['dateAR']==TRUE )   
        {   
        $myinput= $_POST['dateAR']; 
        $sqldate=date('Y-m-d',strtotime($myinput));  
        $result = mysql_query("UPDATE users SET dateAR='$sqldate' WHERE user_id=$id") ;
        }
        if($returnRA=$_POST['returnRA']==TRUE )   
        { $returnRA=$_POST['returnRA'];
        $result = mysql_query("UPDATE users SET returnRA='$returnRA' WHERE user_id=$id") ;
        }
        
        //BBBBBBBBBBB
               
        if($RRbinout=$_POST['RRbinout'] == TRUE )   
        {   
        $result = mysql_query("UPDATE users SET RRbinout='1' WHERE user_id=$id");
        }  
        elseif($RRbinout=$_POST['RRbinout']== FALSE )   
        {
        $result = mysql_query("UPDATE users SET RRbinout='0' WHERE user_id=$id");
        } 
        if($rubbishcolorB=$_POST['rubbishcolorB']==TRUE )   
        { $rubbishcolorB=$_POST['rubbishcolorB'];
        $result = mysql_query("UPDATE users SET rubbishcolorB='$rubbishcolorB' WHERE user_id=$id") ;
        }
        if($rubbishtimeFA=$_POST['rubbishtimeFB']==TRUE )   
        { $rubbishtimeFB=$_POST['rubbishtimeFB'];
        $result = mysql_query("UPDATE users SET rubbishtimeFB='$rubbishtimeFB' WHERE user_id=$id") ;
        }
        if($dateBR=$_POST['dateBR']==TRUE )   
        {   
        $myinput= $_POST['dateBR']; 
        $sqldate=date('Y-m-d',strtotime($myinput));  
        $result = mysql_query("UPDATE users SET dateBR='$sqldate' WHERE user_id=$id") ;
        }
        if($returnRB=$_POST['returnRB']==TRUE )   
        { $returnRB=$_POST['returnRB'];
        $result = mysql_query("UPDATE users SET returnRB='$returnRB' WHERE user_id=$id") ;
        }

        //CCCCCCCCCCCCCCCCCCC
        
        if($RWbinout=$_POST['RWbinout'] == TRUE )   
        {   
        $result = mysql_query("UPDATE users SET RWbinout='1' WHERE user_id=$id");
        }  
        elseif($RWbinout=$_POST['RWbinout']== FALSE )   
        {
        $result = mysql_query("UPDATE users SET RWbinout='0' WHERE user_id=$id");
        } 
        if($rubbishcolorC=$_POST['rubbishcolorC']==TRUE )   
        { $rubbishcolorC=$_POST['rubbishcolorC'];
        $result = mysql_query("UPDATE users SET rubbishcolorC='$rubbishcolorC' WHERE user_id=$id") ;
        }
        if($rubbishtimeFC=$_POST['rubbishtimeFC']==TRUE )   
        { $rubbishtimeFC=$_POST['rubbishtimeFC'];
        $result = mysql_query("UPDATE users SET rubbishtimeFC='$rubbishtimeFC' WHERE user_id=$id") ;
        }
        if($dateCR=$_POST['dateCR']==TRUE )   
        {   
        $myinput= $_POST['dateCR']; 
        $sqldate=date('Y-m-d',strtotime($myinput));  
        $result = mysql_query("UPDATE users SET dateCR='$sqldate' WHERE user_id=$id") ;
        }
        if($returnRC=$_POST['returnRC']==TRUE )   
        { $returnRC=$_POST['returnRC'];
        $result = mysql_query("UPDATE users SET returnRC='$returnRC' WHERE user_id=$id") ;
        }  
     ?>
  <meta http-equiv="refresh" content="0.005"/> 
 <?php
 exit;
        }
        ?>



 


