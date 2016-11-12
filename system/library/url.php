<?php
	class Url {
		private $url;
		private $ssl;
		private $rewrite = array();

		public function __construct($url, $ssl = '') {
			$this->url = $url;
			$this->ssl = $ssl;
		}

		public function addRewrite($rewrite) {
			$this->rewrite[] = $rewrite;
		}

		public function link($route, $args = '', $secure = false) {
			if ($this->ssl && $secure) {
				$url = $this->ssl;
			} else {
				$url = $this->url;
			}

			$url .= 'index.php?route=' . $route;

			if ($args) {
				$url .= str_replace('&', '&amp;', '&' . ltrim($args, '&'));
			}

			foreach ($this->rewrite as $rewrite) {
				$url = $rewrite->rewrite($url);
			}

			return $url;
		}
	}
?>