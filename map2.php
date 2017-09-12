<!DOCTYPE html>
<html>
  <head>
    <title>Weather Location</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
		<script src="https://s3-us-west-2.amazonaws.com/reallysimpleweather/reallysimpleweather-1.1.0.min.js"></script>
    
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <script src="/scripts/jquery.min.js"></script>
   <script src="/bootstrap/js/bootstrap.min.js"></script>
<style type="text/css">
	.navbar{
		margin-top: 20px;
	}

      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 60%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

    </style>
  </head>
  <body>
 
    <nav class="navbar navbar-inverse" style="background-color:white;>
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header" ">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand" style="color:#000080;font-size=15px"><strong>DCB BANK</strong></a>
        </div>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            
            <form class="navbar-form navbar-left">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Login</a></li>
				<ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Info</a></li>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Soil<b class="caret"></b></a>
                    
                </li>
            </ul>
            </ul>
        </div>
    </nav>
	<br><br>
    <div class="col-md-7" style="margin-left: 20px" id="map"></div>
<br><br>
    <div class="col-md-4">
	<form id="theForm">
	<h2><center>Weather Details</center></h2>
	<br>
        <b>Location :                                         </b><input id="loc" for="loc" name="loc" required></input><br><br>
		<b>Average Minimum Temperature : </b><input id="loc1" for="loc1" name="loc1" required></input><br><br>
    <b>Average Maximum Temperature :     </b><input id="loc2"  for="loc2" name="loc2" required></input><br><br>
    <b>Average Rain Fall :                              </b><input id="loc3" for="loc3" name="loc3" required></input><br>
	
  </form>
  <button class = "btn btn-primary btn-lg" style="float:right;margin:20px" data-toggle = "modal" data-target = "#myModal">
              Submit!         
</button>
  

<!-- Modal -->
<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
               This Modal title
            </h4>
         </div>
         
         <div class = "modal-body">
            
			<?php
			$s=$_REQUEST['id']; 
			if ($s==1){
			echo '<img src="ok.png"></img>';
			echo "Loan can be aprooved";
			}else{
			echo '<img src="wrong.png"></img>';
			echo "this type of crop can not be grown in this area";
			}
			
			?>
         
         </div>
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-default" data-dismiss = "modal">
               Close
            </button>
            
            
         </div>
         
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div><!-- /.modal -->
	</div>
	
	
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBB7mVr1L_ghEGgfSpBZCA1FnQ-fYtse0A&libraries=places&callback=initMap"
    async defer></script>
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {

        });
				window.onload = function() {
    var latlng = new google.maps.LatLng(28.7041, 77.1025);
    var map = new google.maps.Map(document.getElementById('map'), {
        center: latlng,
        zoom: 11,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        title: 'Set lat/lon values for this property',
        draggable: true
    });
    google.maps.event.addListener(marker, 'dragend', function(a) {
        console.log(a);
				var geocoder = new google.maps.Geocoder;
				var infowindow = new google.maps.InfoWindow;

        var div = document.createElement('div');
				var lat = a.latLng.lat().toFixed(4);
				var lng = a.latLng.lng().toFixed(4);
        document.getElementsByTagName('body')[0].appendChild(div);
				GetAddress(lat,lng);
    });
};


function GetAddress(lat1,lng1) {
			var lat = parseFloat(document.getElementById("loc").value);
			var lat = parseFloat(lat1);
			document.getElementById("loc1").innerHTML =  " " + document.getElementById("loc").value;
			var lng = parseFloat(lng1);
			var latlng = new google.maps.LatLng(lat, lng);
			var geocoder = geocoder = new google.maps.Geocoder();
			geocoder.geocode({ 'latLng': latlng }, function (results, status) {
					if (status == google.maps.GeocoderStatus.OK) {
							if (results[1]) {
									document.getElementById("loc").value =  " " + results[1].formatted_address;
var locat=results[1].formatted_address;
data();
data2();
data3();


						}
					}
			});
	}

google.maps.event.addDomListener(window, 'load', initialize);

}


</script>


  </body>
  <script>
  function data(){

    var XHR = new XMLHttpRequest();

        // Bind the FormData object and the form element
        var FD = new FormData(form);

        // Define what happens on successful data submission
        XHR.addEventListener("load", function(event) {

          temp1=event.target.responseText;
          
          document.getElementById("loc1").value = ""+ temp1+"C";
        });

        // Define what happens in case of error
        XHR.addEventListener("error", function(event) {
          alert('Oups! Something goes wrong.');
        });

        // Set up our request
        XHR.open("POST", "curl_pastweather.php");

        // The data sent is what the user provided in the form
        XHR.send(FD);


      }
      function data2(){

        var XHR = new XMLHttpRequest();

            // Bind the FormData object and the form element
            var FD = new FormData(form);

            // Define what happens on successful data submission
            XHR.addEventListener("load", function(event) {
              temp2=event.target.responseText;

              document.getElementById("loc2").value = ""+ temp2+"C";
            });

            // Define what happens in case of error
            XHR.addEventListener("error", function(event) {
              alert('Oups! Something goes wrong.');
            });

            // Set up our request
            XHR.open("POST", "page2.php");

            // The data sent is what the user provided in the form
            XHR.send(FD);
          }
          function data3(){

            var XHR = new XMLHttpRequest();

                // Bind the FormData object and the form element
                var FD = new FormData(form);

                // Define what happens on successful data submission
                XHR.addEventListener("load", function(event) {
                  temp3=event.target.responseText;
                  document.getElementById("loc3").value = ""+ temp3+"cm";
                });

                // Define what happens in case of error
                XHR.addEventListener("error", function(event) {
                  alert('Oups! Something goes wrong.');
                });

                // Set up our request
                XHR.open("POST", "rain.php");

                // The data sent is what the user provided in the form
                XHR.send(FD);
              }
      // Access the form element...
      var form = document.getElementById("theForm");
  </script>


</html>
