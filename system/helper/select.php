<?php
/**
 * Neville Select Generator
 *
 * @package		Neville
 * @since		0.4.4
 *
 * @param string
 * @param string
 * @param string
 * @param string
 * @param array
 * @param string
 * @param string
 * @param bool
 * @param bool
 *
 * @returns string
 */
function fillSelect($id, $name, $class, $style, $array, $default = 'Select', $active = '', $multiple = false, $single = false) {
	$html = '<select class="' . $class . '" id="' . $id . '" name="' . $name . '"';

	if ($multiple) {
		$html .= ' multiple';
	}

	if ($style) {
		$html .= ' style="' . $style . '"';
	}

	$html .= '>';
	$html .= '<option value="">' . $default . '</option>';

	if ($array) {
		foreach ($array as $key => $value) {
			if ($active !== '') {
				if ($single === true) {
					if ($key == $active) {
						$selected = ' selected';
					} else {
						$selected = '';
					}
				} else {
					if ($key == $active) {
						$selected = ' selected';
					} else {
						$selected = '';
					}
				}
			} else {
				$selected = '';
			}

			if ($single === true) {
				//$key = $value;
			}

			$html .= '<option value="' . $key . '"' . $selected . '>' . $value . '</option>';
			$selected = '';
		}
	}

	$html .= '</select>';

	return $html;
}
