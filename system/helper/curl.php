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

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE);
		curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
		curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
		curl_setopt($ch, CURLOPT_PORT, $port);

		$output = curl_exec($ch);

		if (curl_exec($ch) === false) {
			throw new \Exception('Curl error: ' . curl_error($ch));
		}

		curl_close($ch);

		return $output;
	}
