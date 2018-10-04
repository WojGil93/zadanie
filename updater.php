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

for($i=0; $i<count($rates);$i++){ // pętla dokonująca aktualizacji wartości kursu pojedyńczej waluty w bazie

	$id = $i + 1;
	$mid = $rates[$i]->mid;
	$date = date('Y-m-d H:i:s');

	$query = $conn->query("UPDATE exchange_rates SET mid='".$mid."', updated_at='".$date."' WHERE id=".$id);
}

?>