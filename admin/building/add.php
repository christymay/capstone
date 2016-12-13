<?php
include '../../inc/building.php';

$bldg = new Building;
$bldg->isloggedin();
if (isset($_POST['addbldg'])) {
  $res = $bldg->insert_building($_POST);
  if ($res) {
    echo "Successfully added!</br></br>";
  }else{
    echo "Fail to add user!</br></br>";
  }
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Add Building</title>
	<style>
	/* Always set the map height explicitly to define the size of the div
	* element that contains the map. */
	#map {
		height: 75%;
		width: 50%;
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
<form method="post">
	<label>Building Name:</label>
	<input type="text" class="form-control" name="building[bldg_name]" placeholder="Building Name" required>

	<label>Longitude:</label>
	<input type="text" class="form-control" id="longitude" name="building[bldg_long]" placeholder="Building Longitude" required>

	<label>Latitude:</label>
	<input type="text" class="form-control" id="latitude" name="building[bldg_lat]" placeholder="Building Latitude" required>


	<input type="submit" name="addbldg" value="Add">
</form>
<a href="<?php echo $bldg->base_url().'admin/building'; ?>">View Buildings</a>
<div id="map"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
    
      function initMap() {
        var myLatlng = {lat: 10.3540775, lng: 123.9115763};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: myLatlng
        });

        var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
          title: 'Click to zoom'
        });

        map.addListener('center_changed', function() {
          // 3 seconds after the center of the map has changed, pan back to the
          // marker.
          window.setTimeout(function() {
            map.panTo(marker.getPosition());
          }, 3000);
        });

        marker.addListener('click', function(args) {
          alert(args.latLng);
          map.setZoom(20);
          map.setCenter(marker.getPosition());
        });

        map.addListener('click', function(args) {
            var lat = args.latLng.lat();
			$('#latitude').val(lat);
            var lng = args.latLng.lng();
			$('#longitude').val(lng);
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbmiCN1HtLXfPso4bPEiCoyQnGTnfNl0c&callback=initMap">
    </script>
</body>
</html>
