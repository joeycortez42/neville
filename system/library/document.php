<?php
	class Document {
		private $title;
		private $description;
		private $keywords;
		private $styles = array();
		private $scripts = array();

		public function setTitle($title) {
			$this->title = $title;
		}

		public function getTitle() {
			return $this->title;
		}

		public function setDescription($description) {
			$this->description = $description;
		}

		public function getDescription() {
			return $this->description;
		}

		public function setKeywords($keywords) {
			$this->keywords = $keywords;
		}

		public function getKeywords() {
			return $this->keywords;
		}

		public function addStyle($href, $rel = 'stylesheet', $media = 'screen') {
			$this->styles[md5($href)] = array(
				'href'  => $href,
				'rel'   => $rel,
				'media' => $media
			);
		}

		public function getStyles() {
			return $this->styles;
		}

		public function addScript($script) {
			$this->scripts[md5($script)] = $script;
		}

		public function getScripts() {
			return $this->scripts;
		}
	}
?>