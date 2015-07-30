<?php
	function fillSelect($id, $name, $class, $style, $array, $default='Select', $active='', $multiple=false, $single=false) {
		$html = '<select id="' . $id . '" name="' . $name . '" class="' . $class . '"';
		
		if ($multiple) { $html .= ' multiple'; }
		if ($style) { $html .= ' style="' . $style . '"'; }
			
		$html .= '>';
		
		$html .= '<option value="">' . $default . '</option>';
		
		if ($array) {
			foreach ($array AS $key => $value) {
				if ($active != '') {
					if ($single == 'true') {
						if ($value == $active) { $selected = ' selected'; } else { $selected = ''; }
					} else {
						if ($key == $active) { $selected = ' selected'; } else { $selected = ''; }
					}
				}
				if ($single == 'true') { $key = $value; }

				$html .= '<option value="' . $key . '"' . $selected . '>' . $value . '</option>';
				$selected = '';
			}
		}
		
		$html .= '</select>';
		
		return($html);
	}
?>