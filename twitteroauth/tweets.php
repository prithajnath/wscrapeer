
<?php
$city = "";

if ($_GET["city"]){
$city = $_GET["city"];
$city = str_replace(" ","",$city);
}
$content = file_get_contents("http://www.weather-forecast.com/locations/".$city."/forecasts/latest");
preg_match('/<span class="phrase">(.*?)</s',$content,$match);

//echo $match[1];

//echo "<br></br>";


// Twitter shit


include("twitteroauth/autoload.php");

use Abraham\TwitterOAuth\TwitterOAuth;






$apikey = "PuRv17UvVgNIDbZC8TylUXk7m";

$apisec = "osEgD9qgsreJBhoT1pxAMFJqgZUjRNHwr65FzSfRL7Liv4r2AO";
    
$accesstoken = "52714853-kZsh9nq2cisrLJ3MJbOLIkFscl8BJzvzppA9qGHs5";

$a_secret = "1cMh9KPWOLAQ1nIHQrhYqmWfT1N9JX7jHp6T9SQfwMTY0";


$connect = new TwitterOAuth($apikey,$apisec,$accesstoken,$a_secret);

$tweets = $connect->get("search/tweets", array("q" => $city . "weather"));
//print_r($tweets->statuses);


//$count = 0;


foreach($tweets->statuses as $tweet){

//$count = $count + 1;    


//echo $count; 
    
print($tweet->text);

echo "<br></br>";

}


?>