<?php
	class Response {
		private $headers = array();
		private $output;
		
		public function addHeader($header) {
			$this->headers[] = $header;
		}
	
		public function redirect($url) {
			header('Location: ' . $url);
			exit;
		}
			
		public function setOutput($output) {
			$this->output = $output;
		}
	
		public function output() {
			if ($this->output) {
				$ouput = $this->output;
					
				if (!headers_sent()) {
					foreach ($this->headers as $header) {
						header($header, true);
					}
				}

				echo $ouput;
			}
		}
	}
?>