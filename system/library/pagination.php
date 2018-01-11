<?php
/**
 * Neville Pagination Class
 *
 * @package		Neville
 * @since		0.4.0
 */
	class Pagination {
		public $total = 0;
		public $page = 0;
		public $limit = 20;

		/**
		 * Output pagination
		 *
		 * @returns string
		 */
		public function output() {
			$total = $this->total;
			$sortField = $this->sortField;
			$sortOrder = $this->sortOrder;
			$limit = $this->limit;
			$page = $this->page;

			if ($page === 0) {
				$page = 1;
			}

			$numPages = ceil($total / $limit);

			$output = '';
			//$output = 'Page: ' . $page . ', Num Pages: ' . $num_pages . ', Limit: ' . $limit . ', Total: ' . $total . '<br />';

			if ($numPages > 1) {
				$i = 0; $numPages++;
				$output .= '<nav><ul class="pagination">';

				for ($item = 1; $item < $numPages; $item++) {
					if ($item === $page) {
						$output .= '<li class="disabled"><a title="' . $item . '">' . $item . '</a></li>';
						$i++;
					} elseif ($numPages < 9) {
						$output .= '<li><a title="' . $item . '">' . $item . '</a></li>';
					} elseif ($page < 5 && $item < 9) {
						$output .= '<li><a title="' . $item . '">' . $item . '</a></li>';
						$i++;
					} elseif ($item > 6 && $item === ($page + 4)) {
						$label = $page + 1; //Next
						$output .= '<li><a title="' . $label . '">»</a></li>';
						$i++;
					} elseif ($item === ($page - 4)) {
						$label = $page - 1; //Prev
						$output .= '<li><a title="' . $label . '">«</a></li>';
						$i++;
					} elseif (($item > ($page - 4) && $item < ($page + 4))) {
						$output .= '<li><a" title="' . $item . '">' . $item . '</a></li>';
						$i++;
					}
				}

				$output .= '</ul></nav>';
			}

			return $output;
		}
	}
