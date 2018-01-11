<?php
/**
 * Neville Controller Common Upload
 *
 * @package		Neville
 * @since		0.8.0
 */
	class ControllerCommonUpload extends Controller {
		/**
		 * Index
		 */
		public function index() {
			//$data['url_signout'] = $this->url->link('account/logout', '', '');

			//uploads/ab/23/4c/restofhash.jpg

			$path = DIR_APP . 'upload/';

			$uploadHandler = new UploadHandler(
				array(
					'accept_file_types' => '/\.(txt|xls?x|csv|TXT|XLS?S|CSV)$/i',
					'upload_dir' => $path,
					'filename_randomise' => true
				)
			);
		}
	}
