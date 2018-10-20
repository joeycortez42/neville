<?php
/**
 * Neville URL Class
 *
 * @package		Neville
 * @since		0.1.0
 */
class Url {
	private $url;
	private $ssl;
	private $rewrite = array();

	/**
	 * Retrieve values for URL Class
	 *
	 * @param string
	 * @param string
	 */
	public function __construct($url, $ssl = '') {
		$this->url = $url;
		$this->ssl = $ssl;
	}

	/**
	 * Assign URL for processing
	 *
	 * @param string
	 */
	public function addRewrite($rewrite) {
		$this->rewrite[] = $rewrite;
	}

	/**
	 * Retrieve values for URL Class
	 *
	 * @param string
	 * @param string
	 * @param bool
	 *
	 * @returns string
	 */
	public function link($route, $args = '', $secure = false) {
		if ($this->ssl && $secure) {
			$url = $this->ssl;
		} else {
			$url = $this->url;
		}

		$url .= '/' . $route;

		if ($args) {
			if (is_array($args)) {
				$url .= '&amp;' . http_build_query($args);
			} else {
				$url .= str_replace('&', '&amp;', '&' . ltrim($args, '&'));
			}
		}

		foreach ($this->rewrite as $rewrite) {
			$url = $rewrite->rewrite($url);
		}

		return $url;
	}
}
