<?php
	function fillSelect($id, $name, $class, $array) {
		$html = '<select id="' . $id . '" name="' . $name . '" class="' . $class . '">';
	
		foreach ($array AS $key => $value) {
			$html .= '<option value="' . $key . '">' . $value . '</option>';
		}
		
		$html .= '</select>';
		
		return($html);
	}
?>