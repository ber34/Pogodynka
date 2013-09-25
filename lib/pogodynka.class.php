<?php
/*
 *  @version POGODYNKA v1.0
 *  @autor Adam Berger$
 *  Copyright 2013 POGODYNKA
 *  <ber34@o2.pl>
 * Licensed under the Apache License v2.0
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
class POGODYNKA{

     /* Adres Połączenia */
    const URL_POGODYNKA = 'http://api.pogodynka.net/weather';
	
	/* http://dev.pogodynka.net/dev/doc */
	
	/* Klucz API */
	protected $api_key = 'CmqtJqCHZuTSB4fc5bVj'; /* API Adam */

	/* TYPY xml, json, php */ 
	private $type = 'json';
	/* Miasto dla którego chcesz otrzymać pogode domyślne Warszawa */
	public $city;
	public $html;
	public $cities;
	public $datatime= '2013-09-22';
	
	public $kody_pogody = array(
    '113' => 'Bezchmurnie / słonecznie.',
    '116' => 'Częściowe zachmurzenie.',
    '119' => 'Pochmurnie.',
    '122' => 'Całkowite zachmurzenie.',
    '143' => 'Mgła.',
    '176' => 'Przelotne opady deszczu w okolicach.',
    '179' => 'Przelotne opady śniegu w okolicach.',
    '182' => 'Przelotne opady deszczu ze śniegiem w okolicach.',
    '185' => 'W pobliżu, czasami mżawka.',
    '200' => 'Burze w okolicach.',
    '227' => 'Zawieje śnieżne.',
    '230' => 'Słaba lub umiarkowana zamieć śnieżna.',
    '248' => 'Mgła.',
    '260' => 'Mgła lodowa.',
    '263' => 'Miejscami słaba mżawka.',
    '266' => 'Słaba mżawka.',
    '281' => 'Mżawka.',
    '284' => 'Intensywna mżawka.',
    '293' => 'Miejscami nieznaczne opady deszczu.',
    '296' => 'Nieznaczne opady deszczu.',
    '299' => 'Czasami umiarkowane opady deszczu.',
    '302' => 'Umiarkowane opady deszczu.',
    '305' => 'Czasami opady ulewnego deszczu.',
    '308' => 'Ulewny deszcz.',
    '311' => 'Opady zimengo deszczu.',
    '314' => 'Umiarkowane lub silne opady zimengo deszczu.',
    '317' => 'Nieznaczne opady deszczu ze śniegiem.',
    '320' => 'Umiarkowane lub silne opady deszczu ze śniegiem.',
    '323' => 'Miejscami opady śniegu.',
    '326' => 'Opady śniegu.',
    '329' => 'Miejscami umiarkowane opady śniegu.',
    '332' => 'Umiarkowane opady śniegu.',
    '335' => 'Miejscami silne opady śniegu.',
    '338' => 'Silne opady śniegu.',
    '350' => 'Opady gradu.',
    '353' => 'Nieznaczne opady deszczu.',
    '356' => 'Umiarkowane lub silne opady deszczu.',
    '359' => 'Ulewne opady deszczu.',
    '362' => 'Nieznaczne opady deszczu ze śniegiem.',
    '365' => 'Umiarkowane lub silne opady deszczu ze śniegiem.',
    '368' => 'Nieznaczne opady śniegu.',
    '371' => 'Umiarkowane lub silne opady śniegu.',
    '374' => 'Nieznaczne opady gradu.',
    '377' => 'Umiarkowane, miejscami silne opady gradu.',
    '386' => 'Miejscami możliwe nieznaczne opady deszczu, możliwa burza.',
    '389' => 'Umiarkowane opady deszczu, miejscami silne, możliwa burza.',
    '392' => 'Miejscami możliwe nieznaczne opady śniegu, możliwe burze.',
	'395' => 'Umiarkowane opady śniegu, miejscami silne, możliwa burza.'
	);
	public $icons = array(
		'113' => 'sunny.png',
		'116' => 'm-cloudy.png',
		'119' => 'm-cloudy.png',
		'122' => 'm-cloudy.png',
		'143' => 'fog.png',
		'176' => 'showers.png',
		'179' => 'snow.png',
		'182' => 'showers.png',
		'185' => 'freezing-rain.png',
		'200' => 'thunder-storm.png',
		'227' => 'blowing-snow.png',
		'230' => 'blowing-snow.png',
		'248' => 'fog.png',
		'260' => 'freezing-rain.png',
		'263' => 'drizzle.png',
		'266' => 'drizzle.png',
		'281' => 'drizzle.png',
		'284' => 'drizzle.png',
		'293' => 'drizzle.png',
		'296' => 'drizzle.png',
		'299' => 'drizzle.png',
		'302' => 'drizzle.png',
		'305' => 'showers.png',
		'308' => 'showers.png',
		'311' => 'freezing-rain.png',
		'314' => 'freezing-rain.png',
		'317' => 'rainy-snow.png',
		'320' => 'rainy-snow.png',
		'323' => 'rainy-snow.png',
		'326' => 'snow.png',
		'329' => 'snow.png',
		'332' => 'snow.png',
		'335' => 'snow.png',
		'338' => 'snow.png',
		'350' => 'flurries.png',
		'353' => 'drizzle.png',
		'356' => 'rainy.png',
		'359' => 'rainy.png',
		'362' => 'rainy-snow.png',
		'365' => 'rainy-snow.png',
		'368' => 'snow.png',
		'371' => 'snow.png',
		'374' => 'blizzard.png',
		'377' => 'blizzard.png',
		'386' => 't-storm-rain.png',
		'389' => 't-storm-rain.png',
		'392' => 't-storm-rain.png',
		'395' => 't-storm-rain.png'
	);
	
	public function __construct() 
	{ 
        $this->url_pogodynka = self::URL_POGODYNKA;   /// adres polaczenia
    }
	
	public function set_city($city){
	 /*
	  $m = preg_match_all('/[a-zA-ZąęćłńóśźżĄĆĘŁŃÓŚŹŻ]/', $city, $match, PREG_PATTERN_ORDER); 
	  print_r($match);
		  */
		  if(!empty($city)){
		          $this->city =  $city;
		    }else{$this->city = 'Poznań';}
	}
	public function get_city(){
	  
		if(is_string($this->city)){
				 return $this->city;
		}
	}
	public function set_cities($cities){
	 /*
	  $m = preg_match_all('/[a-zA-ZąęćłńóśźżĄĆĘŁŃÓŚŹŻ]/', $city, $match, PREG_PATTERN_ORDER); 
	  print_r($match);
		  */
		  if(!empty($cities)){
		          $this->cities =  $cities;
		    }else{$this->cities = 'Poznań,Warszawa';}
	}
	public function get_cities(){
	  
		if(is_string($this->cities)){
			return $this->cities;
		}
	}
	public function set_data($datatime){
	 /*
	  $m = preg_match_all('/[a-zA-ZąęćłńóśźżĄĆĘŁŃÓŚŹŻ]/', $city, $match, PREG_PATTERN_ORDER); 
	  print_r($match);
	  */
	  if(!empty($datatime)){
		$this->datatime =  $datatime;
		}else{$this->datatime = date("Y-m-d");}
	}
	public function get_data(){
	  //print_r($this->datatime);
		if(is_array($this->datatime)){
		 foreach ($this->datatime as $this->cityall){
				 return $this->cityall;
				  }
		}
	}
	/*  Zwraca aktualną pogodę w podanej lokalizacji */
	public function get_weather_today_city_api(){
	$this->html ='<section>';
	/* Ustalamy adres serwera API */ 
	$server = $this->url_pogodynka.'/current.'.$this->type.'?key='.$this->api_key.'&';

     $params = array
	  (
		'city' => $this->get_city()
	  );

	  /* Wysyłamy request do API i pobieramy odpowiedź. */ 
	  $data = json_decode(file_get_contents($server . http_build_query($params)));
	  //print_r($data);
	
	 $this->html .='Aktualna temperatura w '.$this->city .': '.$data->response->temp_C.'&deg;C <br>';
	 $this->html .= $data->response->weatherDesc.'<br>';
	 //$this->html .= $this->kody_pogody[$data->response->weatherCode].'<br>';
	 $this->html .='<img src="http://localhost/pogoda/icons/250x250/'.$this->icons[$data->response->weatherCode].'" /></section>';
	 return $this->html;
	}
	public function get_weather_today_cities_api(){
	  /* Zwraca aktualną pogodę w kilku lokalizacjach (maksymalnie 10) */
	  
	  
	  
	 $this->html ='';
	/* Ustalamy adres serwera API */ 
	$server = $this->url_pogodynka.'/multiCurrent.'.$this->type.'?key='.$this->api_key.'&';

     $params = array(
		'cities' => $this->cities
	  );
    /* Wysyłamy request do API i pobieramy odpowiedź. */ 
	$data = json_decode(file_get_contents($server . http_build_query($params)));
	  
	 $cities = explode(",",$this->cities);
	//echo count($cities);
	for($i = 0; $i < count($cities); ++$i) {
	 //print_r($data);
	 $this->html .='Aktualna temperatura w '.$cities[$i] .': '.$data->response->city[$i]->temp_C.'&deg;C <br>';
	 $this->html .= $data->response->city[$i]->weatherDesc.'<br>';
	 $this->html .='<img src="http://localhost/pogoda/icons/250x250/'.$this->icons[$data->response->city[$i]->weatherCode].'" /><br>';
	 } 
	 return $this->html;
	}
	public function get_weather_today_city_astronomical_api(){
	/* Zwraca pogodę na dziś w podanej lokalizacji w tym także dane astronomiczne (Wschód Słońca, Zachód Słońca, Wschód Księżyca, Zachód Księżyca)  */
	  $this->html ='';
	  /* Ustalamy adres serwera API */ 
	  $server = $this->url_pogodynka.'/today.'.$this->type.'?key='.$this->api_key.'&';

     $params = array
	  (
		'city' => $this->get_city()
	  );
	  /* Wysyłamy request do API i pobieramy odpowiedź. */ 
	  $data = json_decode(file_get_contents($server . http_build_query($params)));
	   //print_r($data);
	 $this->html .= '<br> Dzisiaj '.$data->response->day->date.'<br>';
	 $this->html .= 'wschód słońca '.$data->response->day->astronomy->sunrise.'<br>';
	 $this->html .= 'zachód słońca '.$data->response->day->astronomy->sunset.'<br>';
	 $this->html .= 'Wschód Księżyca '.$data->response->day->astronomy->moonrise.'<br>';
	 $this->html .= 'Zachód Księżyca '.$data->response->day->astronomy->moonset.'<br>';
	 $this->html .= 'Maksymalna Temperatura '.$data->response->day->maxtempC.' &deg;C<br>';
	 $this->html .= 'Minimalna Temperatura '.$data->response->day->mintempC.' &deg;C<br>';
	 $this->html .= 'Aktualna temperatura w '.$this->city .': '.$data->response->current->temp_C.'&deg;C <br>';
	 $this->html .= $data->response->current->weatherDesc.'<br>';
	 $this->html .= 'Ciśnienie '.$data->response->current->pressure.' hPa<br>';
	 $this->html .='<img src="http://localhost/pogoda/icons/250x250/'.$this->icons[$data->response->current->weatherCode].'" />';
	 return $this->html;
	}
	public function get_weather_today_forecast_descriptive_api(){
	  /* Zwraca ogólną prognozę opisową na dzień dzisiejszy  */
	  $this->html ='';
	  /* Ustalamy adres serwera API */ 
	  $server = $this->url_pogodynka.'/todayDesc.'.$this->type.'?key='.$this->api_key.'&';
	 
	 $params = array
	  (
		'date' => date("Y-m-d") // $this->datatime
	  );
	  /* Wysyłamy request do API i pobieramy odpowiedź. */ 
	  $data = json_decode(file_get_contents($server));
	  print_r($data);
	  
	  return $this->html;
	}
	public function get_weather_earlier_api(){
	  /* Sprawdź pogodę jaka była wcześniej (dostępne tylko dla największych miast w Polsce) - dane od dnia 28 lutego 2013r.   */
	  $this->html ='';
	  /* Ustalamy adres serwera API */ 
	  $server = $this->url_pogodynka.'/historical.'.$this->type.'?key='.$this->api_key.'&';
	 
	 $params = array(
	    'city' => $this->get_city(),
		'date' => $this->datatime   ///date("Y-m-d") '2013-09-22'
	  );
	  /* Wysyłamy request do API i pobieramy odpowiedź. */ 
	  $data = json_decode(file_get_contents($server . http_build_query($params)));
	  print_r($data);
	 
	  return $this->html;
	
	}
	public function get_weather_seasons_api(){
	  /* Zwraca prognozę sezonową  */
	  $this->html ='';
	  /* Ustalamy adres serwera API */ 
	  $server = $this->url_pogodynka.'/seasonal.'.$this->type.'?key='.$this->api_key;
	  /* Wysyłamy request do API i pobieramy odpowiedź. */ 
	  $data = json_decode(file_get_contents($server));
	  return $data->response->forecast;
	}
	public function get_weather_of_the_day_api(){
	  /*  Pobranie pogody w danym dniu..  Maksymalna data nie może być późniejsza niż 14 dni ! */
	  $this->html ='';
	  /* Ustalamy adres serwera API */ 
	  $server = $this->url_pogodynka.'/date.'.$this->type.'?key='.$this->api_key.'&';
	 
	 $params = array(
	    'city' => $this->get_city(),
		'date' => '2013-09-22'   ///date("Y-m-d")
	  );
	  /* Wysyłamy request do API i pobieramy odpowiedź. */ 
	  $data = json_decode(file_get_contents($server . http_build_query($params)));
	  /// print_r($data);
	  if($data){
	    $this->html .= '<br> Dzień '.$data->response->weather->date.'<br>';
	 $this->html .= 'Temperatura Pierwszy Pomiar '.$data->response->weather->hourly[0]->tempC.'&deg;C<br>';
	 $this->html .= 'Temperatura Drugi Pomiar '.$data->response->weather->hourly[1]->tempC.'&deg;C<br>';
	 $this->html .= 'Temperatura Trzeci Pomiar '.$data->response->weather->hourly[2]->tempC.'&deg;C<br>';
	 $this->html .= 'Temperatura Czwarty Pomiar '.$data->response->weather->hourly[3]->tempC.'&deg;C<br>';
	 $this->html .= 'Temperatura Piąty Pomiar '.$data->response->weather->hourly[4]->tempC.'&deg;C<br>';
	 $this->html .= 'Temperatura Szósty Pomiar '.$data->response->weather->hourly[5]->tempC.'&deg;C<br>';
	 $this->html .= 'Temperatura Siódmy Pomiar '.$data->response->weather->hourly[6]->tempC.'&deg;C<br>';
	 $this->html .= 'Temperatura Ósmy Pomiar '.$data->response->weather->hourly[7]->tempC.'&deg;C<br>';
	 $this->html .= 'Maksymalna Temperatura '.$data->response->weather->maxtempC.' &deg;C<br>';
	 $this->html .= 'Minimalna Temperatura '.$data->response->weather->mintempC.' &deg;C<br>';
	 $this->html .= $data->response->weather->hourly[4]->weatherDesc.'<br>';
	 $this->html .= 'Ciśnienie '.$data->response->weather->hourly[7]->pressure.' hPa<br>';
	 $this->html .='<img src="http://localhost/pogoda/icons/250x250/'.$this->icons[$data->response->weather->hourly[4]->weatherCode].'" />';
	  return $this->html;
	}else{return $this->html="Błąd połączenia";}
	}
	public function get_weather_climate_information_api(){
	  /*  Zwraca informacje o klimacie w danej lokalizacji 
	  (średnia minimalna temperatura, średnia maksymalna temperatura,
	  rekordowa temperatura [najniższa, najwyższa], średnia ilość dni deszczowych) */
	  $this->html ='';
	  /* Ustalamy adres serwera API */ 
	  if( $server = $this->url_pogodynka.'/avgClimate.'.$this->type.'?key='.$this->api_key.'&'){
	 
	 $params = array(
	    'city' => $this->get_city(),
		'month'=> '6'
	  );
	  /* Wysyłamy request do API i pobieramy odpowiedź. */ 

	   if( $data = json_decode(file_get_contents($server . http_build_query($params)))){
	   print_r($data);
	    //$this->html .= '<br> Dzień '.$data->response->weather->date.'<br>';
	 return $this->html;
	 }else{return $this->html="Błąd połączenia";}}
	}
	public function get_the_warmest_cities_api(){
	  /* Najcieplejsze miasta w Polsce (dzisiaj)  */

	 $this->html ='';
	  /* Ustalamy adres serwera API */ 
	  $server = $this->url_pogodynka.'/rank.'.$this->type.'?key='.$this->api_key;
	  /* Wysyłamy request do API i pobieramy odpowiedź. */ 
	  if($data = json_decode(file_get_contents($server))){
	  return $data->response->forecast;
	 }else{return $this->html="Błąd połączenia";}
	}
}
