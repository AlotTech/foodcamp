<?php
$key = "google.maps.MapTypeControlStyle.HORIZONTAL_BAR";
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\services\DirectionsWayPoint;
use dosamigos\google\maps\services\TravelMode;
use dosamigos\google\maps\overlays\PolylineOptions;
use dosamigos\google\maps\services\DirectionsRenderer;
use dosamigos\google\maps\services\DirectionsService;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\services\DirectionsRequest;
use dosamigos\google\maps\overlays\Polygon;
use dosamigos\google\maps\layers\BicyclingLayer;
use yii\helpers\Html;

$js = "function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = 'Geolocation is not supported by this browser.';
    }
}

function showPosition(position) {
    x.innerHTML = 'Latitude: ' + position.coords.latitude + 
    '<br>Longitude: ' + position.coords.longitude;
}";
$this->registerJs($js);
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-1">
		</div>
		<div class="col-md-10">

<?php

echo '<h3>Map with a Marker</h3>';
 
$coord = new LatLng(['lat' =>"25.774252", 'lng' =>"-80.190262"]);
$coords = [
    ['lat' => 25.774252, 'lng' => -80.190262,'address'=> Html::a('more', ['/site/list'])],
    ['lat' => 18.466465, 'lng' => -66.118292,'address'=>'<a href="www.google.com">tes</a'],
    ['lat' => 32.321384, 'lng' => -64.75737,'address'=>'<a href="www.google.com">tes</a'],
];

$map = new Map([
    'center' => $coord,
    'zoom' => 14,
    'width'=>"100%",
]);




foreach ($coords as $f) {
 //die(print_r($f["lat"]));
    $obj = new LatLng(['lat' => $f["lat"], 'lng' => $f["lng"]]);
    $marker = new Marker([
                'position' => $obj,
               'title' => "coba",
                'animation' => 'google.maps.Animation.DROP',
                'visible'=>'true'
            ]);
     $marker->attachInfoWindow(new InfoWindow(['content' =>$f["address"]]));
     $map->addOverlay($marker);
}    

echo '<div class="iframe-container">';
// Display the map -finally :)
echo $map->display();

echo '</div>';

function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
 $PublicIP = get_client_ip(); 
 $json  = file_get_contents("https://freegeoip.net/json/$PublicIP");
 $json  =  json_decode($json ,true);
 echo "tes ".$json;
 echo  $country =  $json['country_name'];
 echo $region= $json['region_name'];
echo  $city = $json['city'];

?>
<button on="getLocation()">Try It</button>



<style type="text/css">
	.iframe-container{
    position: relative;
    width: 100%;
    padding-bottom: 56.25%; /* Ratio 16:9 ( 100%/16*9 = 56.25% ) */
}
.iframe-container > *{
    display: block;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    margin: 0;
    padding: 0;
    height: 100%;
    width: 100%;
}

</style>
		</div>
		<div class="col-md-1">
		</div>
	</div>
</div>