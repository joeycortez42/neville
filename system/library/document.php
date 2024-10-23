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
	 * @param	string	$title
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Get page title
	 *
	 * @return	string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Set page description
	 *
	 * @param	string	$description
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Get page description
	 *
	 * @return	string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Set page keywords
	 *
	 * @param	string	$keywords
	 */
	public function setKeywords($keywords) {
		$this->keywords = $keywords;
	}

	/**
	 * Get page keywords
	 *
	 * @return	string
	 */
	public function getKeywords() {
		return $this->keywords;
	}

	/**
	 * Set body class
	 *
	 * @param	string	$class
	 */
	public function setClass($class) {
		$this->class = $class;
	}

	/**
	 * Get body class
	 *
	 * @return	string
	 */
	public function getClass() {
		return $this->class;
	}

	/**
	 * Add link to links
	 *
	 * @param	string	$href
	 * @param	string	$rel
	 */
	public function addLink($href, $rel) {
		$this->links[$href] = array(
			'href' => $href,
			'rel'  => $rel
		);
	}

	/**
	 * Get links
	 *
	 * @return	array
	 */
	public function getLinks() {
		return $this->links;
	}

	/**
	 * Add stylesheet to stylesheets
	 *
	 * @param	string	$href
	 * @param	string	$rel
	 * @param	string	$media
	 */
	public function addStyle($href, $rel = 'stylesheet', $media = 'screen') {
		$this->styles[$href] = array(
			'href'  => $href,
			'rel'   => $rel,
			'media' => $media
		);
	}

	/**
	 * Get stylesheets
	 *
	 * @return	array
	 */
	public function getStyles() {
		return $this->styles;
	}

	/**
	 * Add script to scripts
	 *
	 * @param	string	$href
	 * @param	string	$postion
	 */
	public function addScript($href, $postion = 'header') {
		$this->scripts[$postion][$href] = $href;
	}

	/**
	 * Get scripts
	 *
	 * @param	string	$postion
	 *
	 * @return	array
	 */
	public function getScripts($postion = 'header') {
		if (isset($this->scripts[$postion])) {
			return $this->scripts[$postion];
		} else {
			return array();
		}
	}
}
