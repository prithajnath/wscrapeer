
<?php
$city = "";

if ($_GET["city"]){
$city = $_GET["city"];
$city = str_replace(" ","",$city);
}
$content = file_get_contents("http://www.weather-forecast.com/locations/".$city."/forecasts/latest");
preg_match('/<span class="phrase">(.*?)</s',$content,$match);

echo $match[1];

echo "<br></br>";





?>