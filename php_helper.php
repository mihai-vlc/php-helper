<?php

/**
* PHP HELPER v 1.0 BETA
* Mihai Ionut Vilcu (ionutvmi@gmail.com)
* Jan 2013
* master-land.net
* 
*/

class master_php_helper {
	
	/**
	* form_start() - it will initialize the form header
	* @param string $action - the place where the data is sent
	* @param string $method - the method of the form
	* @param mixed $extra - extra attributes for your form, if it's a string it's considered the attribute `class`
	* @param bool $return - decide if the data should be echo or returned
	*/
	
	function form_start($return = 0, $action = "?", $method = "GET", $extra = ""){
		// we first generate the header
		$html = "<form action=\"$action\" method=\"$method\"";
		if(is_array($extra))
			foreach($extra as $k => $v)
				$html.=" $k=\"$v\"";
		else if($extra)
			$html.= " class=\"$extra\"";
		$html.= ">\n";
		
		if($return)
			return $html;
		else
			echo $html;
	}
	/**
	* form_input() - it will return an input or a textarea
	* @param string $type - the type of the input, it can also be set to be a textarea
	* @param mixed $extra - extra attributes for your input, if it's a string it's considered the attribute `class`
	* @param bool $return - decide if the data should be echo or returned
	* @param bool $endform - decide if to endform now
	*/
	function form_input($return = 0, $type="text", $name='input1', $extra = "", $endform = 0){
		$type = strtolower($type);
		if($type !='textarea')
			$html = "<input type=\"$type\" name=\"$name\"";
		else
			$html = "<textarea name=\"$name\"";
		
		if(is_array($extra))
			foreach($extra as $k => $v)
				($type  == 'textarea' && strtolower($k) == 'value') ? $value = $v."</textarea>" : $html.=" $k=\"$v\"";
		else if($extra)
			$html.= " class=\"$extra\"";
		$html.= ">$value\n";		
		
		if($endform)
			$html .= "</form>";
		
		if($return)
			return $html;
		else
			echo $html;		
	
	}
	/**
	* form_end() - it will end the form
	* @param bool $submit - add a submit button before ending the form
	* @param mixed $extra - extra attributes for your submit, if it's a string it's considered the attribute `class`
	* @param bool $return - decide if the data should be echo or returned
	*/	
	function form_end($return = 0,$submit = 0, $extra = ""){
		$html = "\n</form>\n";
		
		if($submit){
		$html = "<input type=\"submit\"";
	
		if(is_array($extra))
			foreach($extra as $k => $v)
				$html.=" $k=\"$v\"";
		else if($extra)
			$html.= " class=\"$extra\"";
		$html.= ">\n</form>\n";			
			
		}
		if($return)
			return $html;
		else
			echo $html;	
		
	}
	/**
	* table_start() - it will initialize the table header, it can also make a full tabel in one line of code
	* @param mixed $extra - extra attributes for your table, if it's a string it's considered the attribute `class`
	* @param mixed $extra2 - extra attributes for your rows, if it's a string it's considered the attribute `class`
	* @param mixed $extra3 - extra attributes for your cols, if it's a string it's considered the attribute `class`
	* @param array $data - an array in form of a matrix for the data in the table
	* @param bool $return - decide if the data should be echo or returned
	*/
	
	function table_start($return = 0, $extra = "", $rows = 1, $cols = 1, $data = '', $extra2 = '', $extra3 = ''){
		$html = "<table";
		if(is_array($extra)) // extra attributes for table tag
			foreach($extra as $k => $v)
				$html.=" $k=\"$v\"";
		else if($extra)
			$html.= " class=\"$extra\"";
		$html.= ">\n";
		if(is_array($data)){
			for($i=0; $i < abs($rows); ++$i){
				$html .= "\t<tr";
				if(is_array($extra2)) // extra attributes for tr tag
					foreach($extra2 as $k => $v)
						$html.=" $k=\"$v\"";
				else if($extra2)
					$html.= " class=\"$extra2\"";
				$html.= ">\n";

				for($j=0; $j < abs($cols); ++$j) {
					$html.= "\t\t<td";
					if(is_array($extra3)) // extra attributes for td tag
						foreach($extra3 as $k => $v)
							$html.=" $k=\"$v\"";
					else if($extra3)
						$html.= " class=\"$extra3\"";
					$html.= ">\n";				
					$html.= $data[$i][$j]."\n\t\t</td>\n";
				}
				$html.= "\t</tr>\n";
				
			}
			$html.= "</table>\n";
		}
		
		if($return)
			return $html;
		else
			echo $html;
	}
	/**
	* table_row() - it will initialize the table row
	* @param mixed $extra - extra attributes for your table, if it's a string it's considered the attribute `class`
	* @param mixed $extra2 - extra attributes for your cols, if it's a string it's considered the attribute `class`
	* @param array $data - an array for the data in the table
	* @param bool $return - decide if the data should be echo or returned
	* @param $endtable - ends the table tag
	*/	
	
	function table_row($return = 0, $extra = '', $cols = 1, $data = '',$extra2='', $endtable = 0) {
		
		$html .= "\t<tr";
		if(is_array($extra)) // extra attributes for tr tag
			foreach($extra as $k => $v)
				$html.=" $k=\"$v\"";
		else if($extra)
			$html.= " class=\"$extra\"";
		$html.= ">\n";

		for($i=0; $i < abs($cols); ++$i) {
			$html.= "\t\t<td";
			if(is_array($extra2)) // extra attributes for td tag
				foreach($extra2 as $k => $v)
					$html.=" $k=\"$v\"";
			else if($extra2)
				$html.= " class=\"$extra2\"";
			$html.= ">\n";				
			$html.= $data[$i]."\n\t\t</td>\n";
		}
		$html.= "\t</tr>\n";		
		
		if($endtable)
			$html.="</table>";
		
		if($return)
			return $html;
		else
			echo $html;
	
	}
	/**
	* table_end() - ends the table tag
	* @param bool $return - decide if the data should be echo or returned
	*
	*/
	function table_end($return = 0){
		$html.="</table>";
		if($return)
			return $html;
		else
			echo $html;		
	}
	
	/**
	* img() - loads an image
	* @param string $url - the url for the image 
	* @param mixed $extra - extra attributes for your tag, if it's a string it's considered the attribute `class`	
	* @param bool $return - decide if the data should be echo or returned
	*/
	function img($return = 0, $url = '', $extra = ''){
		$html.= "<img src=\"$url\"";

		if(is_array($extra)) // extra attributes for img tag
			foreach($extra as $k => $v)
				$html.=" $k=\"$v\"";
		else if($extra)
			$html.= " class=\"$extra\"";
		$html.= ">\n";
		
		if($return)
			return $html;
		else
			echo $html;			
	
	}
	/**
	* js() - loads a js file, if no argument provided for the file it will return jquery
	* @param bool $return - decide if the data should be echo or returned
	* @param mixed $extra - extra attributes for your tag, if it's a string it's considered the attribute `type`
	* @param string $code - javascript code to be inserted between <script> tags
	*/
	function js($return = 0,$file = '',$extra = '',$code = ''){
		
		if(!$file && !$code)
			$html = "<script src=\"http://code.jquery.com/jquery-latest.min.js\"";
		else if(!$file)
			$html .= "<script";
		else
			$html = "<script src=\"$file\"";

		
		if(is_array($extra)) // extra attributes for script tag
			foreach($extra as $k => $v)
				$html.=" $k=\"$v\"";
		else if($extra)
			$html.= " type=\"$extra\"";
		$html.= ">$code</script>\n";		
		
		if($return)
			return $html;
		else
			echo $html;	
		
		
	}
	
	/**
	* linkrel() - <link> tag
	* @param bool $return - decide if the data should be echo or returned
	* @param mixed $extra - extra attributes for your tag, if it's a string it's considered the attribute `rel`
	*/
	function linkrel($return = 0,$extra = ''){
		$html .= "<link";
		
		if(is_array($extra)) // extra attributes for this tag
			foreach($extra as $k => $v)
				$html.=" $k=\"$v\"";
		else if($extra)
			$html.= " rel=\"$extra\"";
		$html.= ">\n";	
		
		if($return)
			return $html;
		else
			echo $html;	
	}



	/**
	* css() - loads the css, it can be a file or the code
	* @param string $file - url to the file
	* @param bool $return - decide if the data should be echo or returned
	*/
	function css($return = 0, $file = '',$code ='',$extra = '') {
		// if the file name is provided it's just a custom case of linkrel()
		if($file){
			if(!is_array($extra)) $extra=array();
			$html = $this->linkrel(1,array_merge(array("rel" => "stylesheet","href"=> $file),$extra));
		}else { // e make <style> tags
			$html .= "<style";
			if(is_array($extra)) // extra attributes for this tag
				foreach($extra as $k => $v)
					$html.=" $k=\"$v\"";
			else if($extra)
				$html.= " type=\"$extra\"";
			$html.= ">\n$code\n</style>\n";				
		}
		if($return)
			return $html;
		else
			echo $html;	
	}
	
	/**
	* favicon() - adds a favicon. custom case of linkrel()
	*/
	function favicon($return = 0, $file = '',$extra=''){
		$html .= "<link rel=\"shortcut icon\" href=\"$file\" type=\"image/x-icon\"";
		if(is_array($extra)) // extra attributes for this tag
			foreach($extra as $k => $v)
				$html.=" $k=\"$v\"";
		else if($extra)
			$html.= " id=\"$extra\"";
		$html.= ">\n";				

		if($return)
			return $html;
		else
			echo $html;			
	
	}
	
	/*
	* link() - makes a link
	* @param string $url - the destination of the link
	* @param string $name - name of the link
	* @param mixed $extra - extra attributes for your tag, if it's a string it's considered the attribute `class`	
	* @param bool $return - decide if the data should be echo or returned
	*/
	function link($return = 0, $url = '',$name = '', $extra = ''){
		$name = empty($name) ? $url : $name; // if the name is empty fill it with the url
		$html = "<a href=\"$url\"";
		if(is_array($extra)) // extra attributes for this tag
			foreach($extra as $k => $v)
				$html.=" $k=\"$v\"";
		else if($extra)
			$html.= " class=\"$extra\"";
		$html.= ">$name</a>\n";		


		if($return)
			return $html;
		else
			echo $html;			
	
	}
	/// feel free to add more functions here, if you do please send me a copy (ionutvmi@gmail.com)
	/// more we share the better we get
	
	/*
	* code() - for particular code when you want to write the actual html or you receive from somewhere that way
	* @param bool $return - decide if the data should be echo or returned
	* @param string $html - the html code...
	*/
	
	function code($return =0, $html){
		if($return)
			return $html;
		else
			echo $html;		
	}
	
	/// well i'm done, have a nice rest of the day and happy coding
}
















