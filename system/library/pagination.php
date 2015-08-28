<?php
	class Pagination {
		public $total = 0;
		public $page = 0;
		public $limit = 20;

		public function render() {
			$total = $this->total;
			$sortField = $this->sortField;
			$sortOrder = $this->sortOrder;
			$limit = $this->limit;
			$page = $this->page;

			if ($page == 0) { $page = 1; }

			$num_pages = ceil($total / $limit);

			$output = '';
			//$output = 'Page: ' . $page . ', Num Pages: ' . $num_pages . ', Limit: ' . $limit . ', Total: ' . $total . '<br />';

			if ($num_pages > 1) {
				$o = 0; $num_pages++;
				$output .= '<nav><ul class="pagination">';

				for ($p=1;$p<$num_pages;$p++) {
					if ($p == $page) {
						$output .= '<li class="disabled"><a title="' . $p . '">' . $p . '</a></li>';
						$o++;
					} else if ($num_pages < 9) {
						$output .= '<li><a title="' . $p . '">' . $p . '</a></li>';
					} else if ($page < 5 && $p < 9) {
						$output .= '<li><a title="' . $p . '">' . $p . '</a></li>';
						$o++;
					} else if ($p > 6 && $p == ($page + 4)) {
						$label = $page + 1; //Next
						$output .= '<li><a title="' . $label . '">»</a></li>';
						$o++;
					} else if ($p == ($page - 4)) {
						$label = $page - 1; //Prev
						$output .= '<li><a title="' . $label . '">«</a></li>';
						$o++;
					} else if (($p > ($page - 4) && $p < ($page + 4))) {
						$output .= '<li><a" title="' . $p . '">' . $p . '</a></li>';
						$o++;
					}
				}

				$output .= '</ul></nav>';
			}

			return $output;
		}
	}
?>