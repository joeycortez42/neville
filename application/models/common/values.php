<?php
	class ModelCommonValues extends Model {
		public function getStates($option) { 
			if ($option == 'full') {
				$states = array(''=>'Select State','AL'=>"Alabama",'AK'=>"Alaska",'AZ'=>"Arizona",'AR'=>"Arkansas",'CA'=>"California",'CO'=>"Colorado",'CT'=>"Connecticut",'DE'=>"Delaware",'DC'=>"District Of Columbia",'FL'=>"Florida",'GA'=>"Georgia",'HI'=>"Hawaii",'ID'=>"Idaho",'IL'=>"Illinois",'IN'=>"Indiana",'IA'=>"Iowa",'KS'=>"Kansas",'KY'=>"Kentucky",'LA'=>"Louisiana",'ME'=>"Maine",'MD'=>"Maryland",'MA'=>"Massachusetts",'MI'=>"Michigan",'MN'=>"Minnesota",'MS'=>"Mississippi",'MO'=>"Missouri",'MT'=>"Montana",'NE'=>"Nebraska",'NV'=>"Nevada",'NH'=>"New Hampshire",'NJ'=>"New Jersey",'NM'=>"New Mexico",'NY'=>"New York",'NC'=>"North Carolina",'ND'=>"North Dakota",'OH'=>"Ohio",'OK'=>"Oklahoma",'OR'=>"Oregon",'PA'=>"Pennsylvania",'RI'=>"Rhode Island",'SC'=>"South Carolina",'SD'=>"South Dakota",'TN'=>"Tennessee",'TX'=>"Texas",'UT'=>"Utah",'VT'=>"Vermont",'VA'=>"Virginia",'WA'=>"Washington",'WV'=>"West Virginia",'WI'=>"Wisconsin",'WY'=>"Wyoming");
			} else {
				$states = array('AL'=>"AL",'AK'=>"AK",'AZ'=>"AZ",'AR'=>"AR",'CA'=>"CA",'CO'=>"CO",'CT'=>"CT",'DE'=>"DE",'DC'=>"DC",'FL'=>"FL",'GA'=>"GA",'HI'=>"HI",'ID'=>"ID",'IL'=>"IL",'IN'=>"IN",'IA'=>"IA",'KS'=>"KS",'KY'=>"KY",'LA'=>"LA",'ME'=>"ME",'MD'=>"MD",'MA'=>"MA",'MI'=>"MI",'MN'=>"MN",'MS'=>"MS",'MO'=>"MO",'MT'=>"MT",'NE'=>"NE",'NV'=>"NV",'NH'=>"NH",'NJ'=>"NJ",'NM'=>"NM",'NY'=>"NY",'NC'=>"NC",'ND'=>"ND",'OH'=>"OH",'OK'=>"OK",'OR'=>"OR",'PA'=>"PA",'QC'=>"QC",'RI'=>"RI",'SC'=>"SC",'SD'=>"SD",'TN'=>"TN",'TX'=>"TX",'UT'=>"UT",'VT'=>"VT",'VA'=>"VA",'WA'=>"WA",'WV'=>"WV",'WI'=>"WI",'WY'=>"WY");
			}
			
			return $states;
		}
	}
?>