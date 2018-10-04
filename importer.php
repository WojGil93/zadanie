<?php

$conn = mysqli_connect("localhost","root","","zadanie");
mysqli_set_charset($conn,'utf8'); // ustawienie kodowania

	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

$response = file_get_contents("http://api.nbp.pl/api/exchangerates/tables/A", false); // link do danych w API

$data = json_decode($response); // dekodowanie na format json

$rates = $data[0]->rates;

for($i=0; $i<count($rates);$i++){ // pętla dokonująca zapisu pojedyńczej waluty w bazie

	$id = $i + 1;
	$currency = $rates[$i]->currency;
	$code = $rates[$i]->code;
	$mid = $rates[$i]->mid;
	$date = date('Y-m-d H:i:s');

	$query = $conn->query("INSERT INTO exchange_rates(id, currency, code, mid, created_at, updated_at) VALUES(".$id.",'".$currency ."','".$code."',".$mid.",'".$date."','".$date."'); ");
}

?>