<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://alpha-vantage.p.rapidapi.com/query?to_currency=PEN&function=CURRENCY_EXCHANGE_RATE&from_currency=USD",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: alpha-vantage.p.rapidapi.com",
		"x-rapidapi-key: eee8abdc64mshbcc21d434354492p1a6f40jsn14e4d9d57eaa"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

$numero = json_decode($response, true);
$datos = $numero["Realtime Currency Exchange Rate"]["5. Exchange Rate"];
$val = round($datos, 3);

    $data["site"]["dollar"]["price_d"] = $val;
    $data["site"]["dollar"]["price_c"] = ($val - 0.02);
    $data["site"]["dollar"]["price_v"] = ($val + 0.06);

    $data["site"]["Face-to-face"]["price_sunat_c"] =  round(($val * 1.004549331816889),3);
    $data["site"]["Face-to-face"]["price_sunat_v"] =  round(($val * 1.005686664771112),3);
    $data["site"]["Face-to-face"]["price_paralelo_c"] = round(($val * 0.9980096673301109),3);
    $data["site"]["Face-to-face"]["price_paralelo_v"] = round(($val * 1.005117998294001),3);

    //Face-to-face
    $data["site"]["online-Change"]["price_wester_union_c"] =  round(($val * 0.9980096673301109),3);
    $data["site"]["online-Change"]["price_wester_union_v"] =  round(($val * 1.005686664771112),3);
    $data["site"]["online-Change"]["price_cambia_fx_c"] = round(($val * 0.9994313335228888),3);
    $data["site"]["online-Change"]["price_cambia_fx_v"] = round(($val * 1.004264998578334),3);
    $data["site"]["online-Change"]["price_cambio_seguro_c"] = round(($val * 0.9971566676144441),3);
    $data["site"]["online-Change"]["price_cambio_seguro_v"] = round(($val * 1.004833665055445),3);
    $data["site"]["online-Change"]["price_cambio_inka_c"] = round(($val * 0.9980096673301109),3);
    $data["site"]["online-Change"]["price_cambio_inka_v"] = round(($val * 1.004264998578334),3);
    $data["site"]["online-Change"]["price_dollar_house_c"] = round(($val * 0.9997156667614444),3);
    $data["site"]["online-Change"]["price_dollar_house_v"] = round(($val * 1.002558999147),3);
    $data["site"]["online-Change"]["price_a_como_c"] = round(($val * 0.9994313335228888),3);
    $data["site"]["online-Change"]["price_a_como_v"] = round(($val * 1.002843332385556),3);
    $data["site"]["online-Change"]["price_cambix_c"] = round(($val * 0.995166334944555),3);
    $data["site"]["online-Change"]["price_cambix_v"] = round(($val * 1.006539664486779),3);
    $data["site"]["online-Change"]["price_tu_cambista_c"] = round(($val * 1.000284333238556),3);
    $data["site"]["online-Change"]["price_tu_cambista_v"] = round(($val * 1.003696332101223),3);
    $data["site"]["online-Change"]["price_t_kambio_c"] = round(($val * 1.000852999715667),3);
    $data["site"]["online-Change"]["price_t_kambio_v"] = round(($val * 1.004833665055445),3);

    //Interbank
    $data["site"]["Interbank"]["price_bcp_c"] =  round(($val * 0.9766846744384419),3);
    $data["site"]["Interbank"]["price_bcp_v"] =  round(($val * 1.016491327836224),3);
    $data["site"]["Interbank"]["price_interbank_c"] = round(($val * 0.9937446687517771),3);
    $data["site"]["Interbank"]["price_interbank_v"] = round(($val * 1.006539664486779),3);
    $data["site"]["Interbank"]["price_bbva_c"] = round(($val * 0.9843616718794427),3);
    $data["site"]["Interbank"]["price_bbva_v"] = round(($val * 1.015353994882002),3);
    $data["site"]["Interbank"]["price_scotiabank_c"] = round(($val * 0.9707136764287745),3);
    $data["site"]["Interbank"]["price_scotiabank_v"] = round(($val * 1.031276656241115),3);
    $data["site"]["Interbank"]["price_nacion_c"] = round(($val * 0.9923230025589991),3);
    $data["site"]["Interbank"]["price_nacion_v"] = round(($val * 1.015069661643446),3);


// if ($err) {
// 	echo "cURL Error #:" . $err;
// } else {
// 	echo $response;
// }


$fh = fopen(__DIR__ ."/calc3.json", 'w') or die("Error opening output file");
fwrite($fh, json_encode($data));
fclose($fh);

?>
