<?php
/**
 * Neville eMail Class
 *
 * @package		Neville
 * @since		0.4.2
 */
class Mail {
	public $to;
	public $from;
	public $subject;
	public $textContent;
	public $htmlContent;
	public $body;
	public $attachments;
	public $headers;
	public $headerString;
	public $boundaryHash;
	public $sent;

	/**
	 * Retrieve values for Mail Class
	 *
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 */
	public function __construct($to, $from, $subject, $textContent = "", $htmlContent = "") {
		$this->to            = $to;
		$this->from          = $from;
		$this->subject       = $subject;
		$this->textContent   = $textContent;
		$this->htmlContent   = $htmlContent;
		$this->body          = "";
		$this->attachments   = array();
		$this->headers       = array();
		$this->boundaryHash  = md5(date('r', time()));
	}

	/**
	 * Send email
	 *
	 * @returns bool
	 */
	public function send() {
		$this->_prepareHeaders();
		$this->_prepareBody();

		if (!empty($this->attachments)) {
			$this->_prepareAttachments();
		}

		$this->sent = mail($this->to, $this->subject, $this->body, $this->headerString);
		return $this->sent;
	}

	/**
	 * Add email header
	 *
	 * @@param string
	 */
	public function addHeader($header) {
		$this->headers[] = $header;
	}

	/**
	 * Add file as attachment
	 *
	 * @@param string
	 */
	public function addAttachment($file) {
		$this->attachments[] = $file;
	}

	/**
	 * Set email bodies
	 */
	private function _prepareBody() {
		$this->body .= "--PHP-mixed-{" . $this->boundary_hash . "}\n";
		$this->body .= "Content-Type: multipart/alternative; boundary=\"PHP-alt-{" . $this->boundary_hash . "}\"\n\n";
		if (!empty($this->textContent)) {
			$this->_prepareText();
		}

		if (!empty($this->htmlContent)) {
			$this->_prepareHtml();
		}
		$this->body .= "--PHP-alt-{" . $this->boundary_hash . "}--\n\n";
	}

	/**
	 * Set email header
	 */
	private function _prepareHeaders() {
		$this->_setDefaultHeaders();
		$this->header_string = implode("\r\n", $this->headers) . "\r\n";
	}

	/**
	 * Set default email header
	 */
	private function _setDefaultHeaders() {
		$this->headers[] = 'MIME-Version: 1.0';
		$this->headers[] = "From: {" . $this->from . "}";
		$this->headers[] = "Content-type: multipart/mixed; boundary=\"PHP-mixed-{" . $this->boundary_hash . "}\"";
	}

	/**
	 * Add attachments to email
	 */
	private function _prepareAttachments() {
		foreach ($this->attachments as $attachment) {
			$filename = basename($attachment);

			$this->body .= "--PHP-mixed-{" . $this->boundary_hash . "}\n";
			$this->body .= "Content-Type: application/octet-stream; name=\"{" . $filename . "}\"\n";
			$this->body .= "Content-Transfer-Encoding: base64\n";
			$this->body .= "Content-Disposition: attachment\n\n";
			$this->body .= chunk_split(base64_encode(file_get_contents($attachment)));
			$this->body .= "\n\n";
		}
		$this->body .= "--PHP-mixed-{" . $this->boundary_hash . "}--\n\n";
	}

	/**
	 * Set text email body
	 */
	private function _prepareText() {
		$this->body .= "--PHP-alt-{" . $this->boundary_hash . "}\n";
		$this->body .= "Content-Type: text/plain; charset=\"iso-8859-1\"\n";
		$this->body .= "Content-Transfer-Encoding: 7bit\n\n";
		$this->body .= $this->textContent . "\n\n";
	}

	/**
	 * Set HTML email body
	 */
	private function _prepareHtml() {
		$this->body .= "--PHP-alt-{" . $this->boundary_hash . "}\n";
		$this->body .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
		$this->body .= "Content-Transfer-Encoding: 7bit\n\n";
		$this->body .= $this->htmlContent . "\n\n";
	}
}
