<?php

function conexao($url){

	$curl = curl_init();

	curl_setopt_array($curl, [
		CURLOPT_URL => "$url",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_SSL_VERIFYHOST => false,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => [
			"x-rapidapi-host: the-cocktail-db.p.rapidapi.com",
			"x-rapidapi-key: 09d8e86b69msh367d3917d7092d8p152d35jsnbed02402c430"
		],
	]);

	$err = curl_error($curl);
	$resultado = json_decode(curl_exec($curl));

	curl_close($curl);

	if (!$err) {
		return $resultado;
	} 
}