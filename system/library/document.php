<?php
/**
 * Neville Document Class
 *
 * @package		Neville
 * @since		0.1.0
 */
class Document {
	private $title;
	private $description;
	private $keywords;
	private $class;
	private $links = array();
	private $styles = array();
	private $scripts = array();

	/**
	 * Set page title
	 *
	 * @param string
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Retrieve page title
	 *
	 * @returns string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Set page description
	 *
	 * @param string
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Retrieve page description
	 *
	 * @returns string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Set page keywords
	 *
	 * @param string
	 */
	public function setKeywords($keywords) {
		$this->keywords = $keywords;
	}

	/**
	 * Retrieve page keywords
	 *
	 * @returns string
	 */
	public function getKeywords() {
		return $this->keywords;
	}

	/**
	 * Set body class
	 *
	 * @param string
	 */
	public function setClass($class) {
		$this->class = $class;
	}

	/**
	 * Retrieve body class
	 *
	 * @returns string
	 */
	public function getClass() {
		return $this->class;
	}

	public function addLink($href, $rel) {
		$this->links[$href] = array(
			'href' => $href,
			'rel'  => $rel
		);
	}

	public function getLinks() {
		return $this->links;
	}

	/**
	 * Set stylesheets
	 *
	 * @param string
	 * @param string
	 * @param string
	 */
	public function addStyle($href, $rel = 'stylesheet', $media = 'screen') {
		$this->styles[$href] = array(
			'href'  => $href,
			'rel'   => $rel,
			'media' => $media
		);
	}

	/**
	 * Retrieve stylesheets
	 *
	 * @returns array
	 */
	public function getStyles() {
		return $this->styles;
	}

	/**
	 * Set javascript
	 *
	 * @param string
	 * @param string
	 */
	public function addScript($href, $postion = 'header') {
		$this->scripts[$postion][$href] = $href;
	}

	/**
	 * Retrieve javascripts
	 *
	 * @param string
	 *
	 * @returns array
	 */
	public function getScripts($postion = 'header') {
		if (isset($this->scripts[$postion])) {
			return $this->scripts[$postion];
		} else {
			return array();
		}
	}
}
