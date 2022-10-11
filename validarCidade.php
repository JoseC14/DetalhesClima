<?php

$nomecidade=$_POST['cidade'];
$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://api.hgbrasil.com/weather?key=xxxxx&city_name=$nomecidade",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET"
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	$obj=json_decode($response);
   $array = get_object_vars($obj);

  $data = $array['results'];
$previsaosemana = $data->forecast;

$previsaosegunda = $previsaosemana[0];
$previsaoterca = $previsaosemana[1];
$previsaoquarta = $previsaosemana[2];
$previsaoquinta = $previsaosemana[3];
$previsaosexta = $previsaosemana[4];
$previsaosabado = $previsaosemana[5];
$previsaodomingo = $previsaosemana[6];
}
echo "
   <h1>Cidade: $data->city</h1>
<table style='border: 1px solid black; width:100%'>
<tr style='border: 1px solid black'>
     <th style='border: 1px solid black'>Data</th>
     <th style='border: 1px solid black'>Dia</th>
     <th style='border: 1px solid black'>Max.Temperatura</th>
     <th style='border: 1px solid black'>Min.Temperatura</th>
     <th style='border: 1px solid black'>Clima</th>
</tr>
<br>
<tr style='border: 1px solid black'>
   <td style='border: 1px solid black'>$previsaosegunda->date</td>
   <td style='border: 1px solid black'>$previsaosegunda->weekday</td>
   <td style='border: 1px solid black'>$previsaosegunda->max oC</td>
   <td style='border: 1px solid black'>$previsaosegunda->min oC</td>
   <td style='border: 1px solid black'>$previsaosegunda->description</td>
   
</tr>
<tr style='border: 1px solid black'>
   <td style='border: 1px solid black'>$previsaoterca->date</td>
   <td style='border: 1px solid black'>$previsaoterca->weekday</td>
   <td style='border: 1px solid black'>$previsaoterca->max oC</td>
   <td style='border: 1px solid black'>$previsaoterca->min oC</td>
   <td style='border: 1px solid black'>$previsaoterca->description</td>
   
</tr>
<tr style='border: 1px solid black'>
   <td style='border: 1px solid black'>$previsaoquarta->date</td>
   <td style='border: 1px solid black'>$previsaoquarta->weekday</td>
   <td style='border: 1px solid black'>$previsaoquarta->max oC</td>
   <td style='border: 1px solid black'>$previsaoquarta->min oC</td>
   <td style='border: 1px solid black'>$previsaoquarta->description</td>
   
</tr>
<tr style='border: 1px solid black'>
   <td style='border: 1px solid black'>$previsaoquinta->date</td>
   <td style='border: 1px solid black'>$previsaoquinta->weekday</td>
   <td style='border: 1px solid black'>$previsaoquinta->max oC</td>
   <td style='border: 1px solid black'>$previsaoquinta->min oC</td>
   <td style='border: 1px solid black'>$previsaoquinta->description</td>
   
</tr>
<tr style='border: 1px solid black'>
   <td style='border: 1px solid black'>$previsaosexta->date</td>
   <td style='border: 1px solid black'>$previsaosexta->weekday</td>
   <td style='border: 1px solid black'>$previsaosexta->max oC</td>
   <td style='border: 1px solid black'>$previsaosexta->min oC</td>
   <td style='border: 1px solid black'>$previsaosexta->description</td>
   
</tr>
<tr style='border: 1px solid black'>
   <td style='border: 1px solid black'>$previsaosabado->date</td>
   <td style='border: 1px solid black'>$previsaosabado->weekday</td>
   <td style='border: 1px solid black'>$previsaosabado->max  oC</td>
   <td style='border: 1px solid black'>$previsaosabado->min oC</td>
   <td style='border: 1px solid black'>$previsaosabado->description</td>
   
</tr>
<tr style='border: 1px solid black'>
   <td style='border: 1px solid black'>$previsaodomingo->date</td>
   <td style='border: 1px solid black'>$previsaodomingo->weekday</td>
   <td style='border: 1px solid black'>$previsaodomingo->max oC</td>
   <td style='border: 1px solid black'>$previsaodomingo->min oC</td>
   <td style='border: 1px solid black'>$previsaodomingo->description</td>
   
</tr>
</table>";

    
