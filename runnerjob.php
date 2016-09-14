  <?php
        include "navbar.php";
        
     ?>

<html >
    <body>
        
        <div id="jobsBoxTop">
            <b>Your Location
<input id="searchInput1" class="controls" type="text" placeholder="Enter a location">
        
                   <script>
function initMap() {
    var input = document.getElementById('searchInput1');
    var autocomplete = new google.maps.places.Autocomplete(input);
}
</script>
                 
        
        search area
                  <select id="colorA"  name="rubbishcolorA">
     <?php if($rubbishcolorA4==TRUE){	echo  "<option>".   $userRow{'rubbishcolorA'} . "</option>";  } 
    
   else {  ?><option value="">Select...</option> <?php } ?>
   <option value="0.5">500m</option>
   <option value="1">1 Km</option>
   <option value="1.5">1.5 Km</option>
   <option value="2">2 Km</option>
   <option value="3">3 Km</option>
   <option value="4">4 Km</option>
   <option value="5">5 Km</option>
   <option value="10">10 Km</option>
   <option value="20">20 Km</option>
   <option value="25">25 Km</option>
   <option value="50">50 Km</option>
   <option value="100">100 Km</option>
   </select>
     
                 
        <?php  //echo "______________________            " ;?>
        search by day's</b>
          <select id="colorA"  name="rubbishcolorA">
     <?php if($rubbishcolorA4==TRUE){	echo  "<option>".   $userRow{'rubbishcolorA'} . "</option>";  } 
    
   else {  ?><option value="">Select...</option> <?php } ?>
   <option value="weekday">weekday</option>
   <option value="weekends">weekends</option>
   <option value="all days">all days</option>
   <option value="Monday">Monday</option>
   <option value="Tuesday">Tuesday</option>
   <option value="Wednesday">Wednesday</option>
   <option value="Thursday">Thursday</option>
   <option value="Friday">Friday</option>
   <option value="Saturday">Saturday</option>
   <option value="Sunday">Sunday</option>
          </select>
              <button style="float: right; "   type="submit" class="btn btn-primary btn-xs"   name="search">  Search  Jobs  </button>
        </div>
                            
        
        
        
        
          <div id="jobsBox">
                    <div id="jobsBoxIn">
                        <div id="jobsBoxIn2">
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                            <h3 class="top-header4">Job's finder</h3>
                            <hr>
                            <hr>
                            
                            <h3 class="top-header4">Job to do</h3>
                            
                            <hr>
                            <hr>
                            </div>
                            
                            
                            </div>
                        
                        
                            
                            
                            
                            
                            
                            
                            
                            
                            
                        
                          
                            
                 
    
      
        
        
        
        
        
        
        
      
              
              
              
              
              <div id="jobsBoxIn3">
              <section id="wrapper">
    
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <article>

    </article>
<script>
    
function success(position) {
  var mapcanvas = document.createElement('div');
  mapcanvas.id = 'mapcontainer';
  mapcanvas.style.height = '600px';
  mapcanvas.style.width = '96%';

  document.querySelector('article').appendChild(mapcanvas);
  
  

  var coords = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
  
  var options = {
    zoom: 15,
    center: coords,
    mapTypeControl: false,
    navigationControlOptions: {
    	style: google.maps.NavigationControlStyle.SMALL
    },
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map(document.getElementById("mapcontainer"), options);
  
  
  
  

  var marker = new google.maps.Marker({
      position: coords,
      map: map,
      title:"You are here!"
  });
  
  
  
  
  
}

if (navigator.geolocation) {
    
    
    
  navigator.geolocation.getCurrentPosition(success);
  
  
  
} else {
  error('Geo Location is not supported');
}

</script>
</section>
              
              
        </div>    
                        </div>
              </div>
        
        
    </body>
</html>


<?php include "footer.php"; ?>