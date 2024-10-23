<?php
/**
 * Neville URL Class
 *
 * @package		Neville
 * @since		0.1.0
 */
class Url {
	private $url;
	private $rewrite = array();

	/**
	 * Constructor
	 *
	 * @param	string	$url
	 */
	public function __construct($url) {
		$this->url = $url;
	}

	/**
	 * Add URL for processing
	 *
	 * @param string	$rewrite
	 */
	// public function addRewrite($rewrite) {
	// 	$this->rewrite[] = $rewrite;
	// }

	/**
	 * Retrieve values for URL Class
	 *
	 * @param	string	$route
	 * @param	string	$args
	 *
	 * @return	string
	 */
	public function link($route, $args = '') {
		$url = $this->url . 'index.php?route=' . (string)$route;

		if ($args) {
			if (is_array($args)) {
				$url .= '&amp;' . http_build_query($args, '', '&amp;');
			} else {
				$url .= str_replace('&', '&amp;', '&' . ltrim($args, '&'));
			}
		}

		// foreach ($this->rewrite as $rewrite) {
		// 	$url = $rewrite->rewrite($url);
		// }

		return $url;
	}
}
