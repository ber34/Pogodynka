<?php
include_once('lib/pogodynka.class.php');
$weather = new POGODYNKA();
$weather->set_city('Katowice');
$weather->set_cities("Warszawa,Katowice,Poznań");/* Zwraca aktualną pogodę w kilku lokalizacjach (maksymalnie 10) */
echo $weather->get_cities().'<br>';
echo $weather->get_city();
//$wether_today = $weather->get_weather_today();


//echo $weather->get_city();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta charset="utf-8" />
<title>Pogodynka</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
<script>
$(function() {
 $( "#tabs" ).tabs();
});
</script>
</head>
<body>
<div id="tabs" style="width:32%;">
<ul>
<li style="width:20%; font-size:14px;"><a href="#tabs-1"><b>Pogoda</b></a></li>
<li style="width:38%; font-size:13px;"><a href="#tabs-2"><b>Dane Astronomiczne</b></a></li>
<li style="width:38%; font-size:13px;"><a href="#tabs-3"><b>Prognoza sezonowa</b></a></li>
</ul>
<div id="tabs-1" style="text-algin:center;  margin: 0 auto;">
<p>
<?php 
echo $weather->get_weather_today_city_api();// ok
//echo $weather->get_weather_today_cities_api();// ok
//echo $weather->get_weather_today_city_astronomical_api();
//echo $weather->get_weather_today_forecast_descriptive_api();
//echo $weather->get_weather_earlier_api(); // nie dziala
 //echo $weather->get_weather_seasons_api(); // ok
 // echo $weather->get_weather_of_the_day_api();// ok
// echo $weather->get_weather_climate_information_api();
///echo $weather->get_the_warmest_cities_api();
 ?>
</p>
</div>
<div id="tabs-2" style="text-algin:center;  margin: 0 auto;">
<p>
<?php 
//echo $weather->get_weather_today_city_api();// ok
//echo $weather->get_weather_today_cities_api();// ok
 echo $weather->get_weather_today_city_astronomical_api();
//echo $weather->get_weather_today_forecast_descriptive_api();
//echo $weather->get_weather_earlier_api(); // nie dziala
 //echo $weather->get_weather_seasons_api(); // ok
 // echo $weather->get_weather_of_the_day_api();// ok
// echo $weather->get_weather_climate_information_api();
///echo $weather->get_the_warmest_cities_api();
 ?>
</p>
</div>
<div id="tabs-3" style="text-algin:center;  margin: 0 auto;">
<p>
<?php 
//echo $weather->get_weather_today_city_api();
//echo $weather->get_weather_today_cities_api();
 //echo $weather->get_weather_today_city_astronomical_api();
 //echo $weather->get_weather_today_forecast_descriptive_api(); // nie dziala
 //echo $weather->get_weather_earlier_api(); // nie dziala
  echo $weather->get_weather_seasons_api(); // ok
 // echo $weather->get_weather_of_the_day_api();// ok
 //echo $weather->get_weather_climate_information_api();// nie dziala
///echo $weather->get_the_warmest_cities_api(); // ok
 ?>
</p>

</div>
</div>
 </body>
</html>
