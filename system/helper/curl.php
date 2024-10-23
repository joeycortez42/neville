<?php
/**
 * Neville Curl
 *
 * @package		Neville
 * @since		0.5.0
 *
 * @param string
 * @param int
 *
 * @throws string
 *
 * @returns string
 */
function curl($url, $port = 80) {
	$cookie = '/tmp/cookie.txt';

	$cookieContents = file_get_contents($cookie);

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, TRUE);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
	curl_setopt($curl, CURLOPT_CAINFO, DIR_APP . "cacert.pem");
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);

	curl_setopt($curl, CURLOPT_COOKIESESSION, TRUE);
	curl_setopt($curl, CURLOPT_COOKIEFILE, $cookie);
	curl_setopt($curl, CURLOPT_COOKIEJAR, $cookie);

	// curl_setopt($curl, CURLOPT_COOKIE, $cookieContents);

	curl_setopt($curl, CURLOPT_PORT, $port);

	$response = curl_exec($curl);

	if (curl_exec($curl) === false) {
		throw new \Exception('Curl error: ' . curl_error($curl) . ' - ' . curl_error($curl));
	}

	curl_close($curl);

	return $response;
}
