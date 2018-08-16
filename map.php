<?php


class Map{

    var $validPoints = array();

    var $invalidPoints = array();

    var $mapWidth = 800;

    var $mapHeight = 550;

    var $apiKey = "";

    var $showControl = true;
	
    var $showType = true;

    var $controlType = 'large';
    
    var $zoomLevel = 2;


function addGeoPoint($lat,$long,$infoHTML){
    $pointer = count($this->validPoints);
        $this->validPoints[$pointer]['lat'] = $lat;
        $this->validPoints[$pointer]['long'] = $long;
        $this->validPoints[$pointer]['htmlMessage'] = $infoHTML;
    }
    
function centerMap($lat,$long){
    $this->centerMap = "map.centerAndZoom(new GPoint(".$long.",".$lat."), ".$this->zoomLevel.");\n";
}
    

	function addAddress($address,$htmlMessage=null){
	 if (!is_string($address)){
		die("All Addresses must be passed as a string");
	  }
		$apiURL = "http://api.local.yahoo.com/MapsService/V1/geocode?appid=YahooDemo&location=";
		$addressData = file_get_contents($apiURL.urlencode($address));
		$results = $this->xml2array($addressData);
		if (empty($results['ResultSet']['Result']['Address'])){
			$pointer = count($this->invalidPoints);
			$this->invalidPoints[$pointer]['lat']= $results['ResultSet']['Result']['Latitude'];
			$this->invalidPoints[$pointer]['long']= $results['ResultSet']['Result']['Longitude'];
			$this->invalidPoints[$pointer]['passedAddress'] = $address;
			$this->invalidPoints[$pointer]['htmlMessage'] = $htmlMessage;
		  }else{
			$pointer = count($this->validPoints);
			$this->validPoints[$pointer]['lat']= $results['ResultSet']['Result']['Latitude'];
			$this->validPoints[$pointer]['long']= $results['ResultSet']['Result']['Longitude'];
			$this->validPoints[$pointer]['passedAddress'] = $address;
			$this->validPoints[$pointer]['htmlMessage'] = $htmlMessage;
		}
	
	
	}

	function showValidPoints($displayType,$css_id){
    $total = count($this->validPoints);
      if ($displayType == "table"){
        echo "<table id=\"".$css_id."\">\n<tr>\n\t<td>Address</td>\n</tr>\n";
        for ($t=0; $t<$total; $t++){
            echo"<tr>\n\t<td>".$this->validPoints[$t]['passedAddress']."</td>\n</tr>\n";
        }
        echo "</table>\n";
        }
      if ($displayType == "list"){
        echo "<ul id=\"".$css_id."\">\n";
      for ($lst=0; $lst<$total; $lst++){
        echo "<li>".$this->validPoints[$lst]['passedAddress']."</li>\n";
        }
        echo "</ul>\n";
       }
	}

	function showInvalidPoints($displayType,$css_id){
      $total = count($this->invalidPoints);
      if ($displayType == "table"){
        echo "<table id=\"".$css_id."\">\n<tr>\n\t<td>Address</td>\n</tr>\n";
        for ($t=0; $t<$total; $t++){
            echo"<tr>\n\t<td>".$this->invalidPoints[$t]['passedAddress']."</td>\n</tr>\n";
        }
        echo "</table>\n";
        }
      if ($displayType == "list"){
        echo "<ul id=\"".$css_id."\">\n";
      for ($lst=0; $lst<$total; $lst++){
        echo "<li>".$this->invalidPoints[$lst]['passedAddress']."</li>\n";
        }
        echo "</ul>\n";
       }
	}

	function setWidth($width){
		$this->mapWidth = $width;
	}

	function setHeight($height){
		$this->mapHeight = $height;
	}

	function setAPIkey($key){
		$this->apiKey = $key;
	}

	function printGoogleJS(){
		echo "\n<script src=\"http://maps.google.com/maps?file=api&v=1&key=".$this->apiKey."\" type=\"text/javascript\"></script>\n";
	}

	function showMap(){
		echo "\n<div id=\"map\" style=\"width: ".$this->mapWidth."px; height: ".$this->mapHeight."px\">\n</div>\n";
		echo "    <script type=\"text/javascript\">\n
    	function showmap(){
				//<![CDATA[\n
    		if (GBrowserIsCompatible()) {\n
      		var map = new GMap(document.getElementById(\"map\"));\n";
      		if (empty($this->centerMap)){
             echo "map.centerAndZoom(new GPoint(".$this->validPoints[0]['long'].",".$this->validPoints[0]['lat']."), ".$this->zoomLevel.");\n";
             }else{
               echo $this->centerMap;
               }
		    echo "}\n
			var icon = new GIcon();
			icon.image = \"http://labs.google.com/ridefinder/images/mm_20_red.png\";
			icon.shadow = \"http://labs.google.com/ridefinder/images/mm_20_shadow.png\";
			icon.iconSize = new GSize(12, 20);
			icon.shadowSize = new GSize(22, 20);
			icon.iconAnchor = new GPoint(6, 20);
			icon.infoWindowAnchor = new GPoint(5, 1);
			
			";
		if ($this->showControl){
          if ($this->controlType == 'small'){echo "map.addControl(new GSmallMapControl());\n";}
          if ($this->controlType == 'large'){echo "map.addControl(new GLargeMapControl());\n";}
		
			}
		if ($this->showType){
		echo "map.addControl(new GMapTypeControl());\n";
		}
	
    $numPoints = count($this->validPoints);
    for ($g = 0; $g<$numPoints; $g++){
        echo "var point".$g." = new GPoint(".$this->validPoints[$g]['long'].",".$this->validPoints[$g]['lat'].")\n;
              var marker".$g." = new GMarker(point".$g.");\n
              map.addOverlay(marker".$g.")\n
              GEvent.addListener(marker".$g.", \"click\", function() {\n";
              if ($this->validPoints[$g]['htmlMessage']!=null){
              echo "marker".$g.".openInfoWindowHtml(\"".$this->validPoints[$g]['htmlMessage']."\");\n";
              }else{
             echo "marker".$g.".openInfoWindowHtml(\"".$this->validPoints[$g]['passedAddress']."\");\n";
                }
              echo "});\n";
	}
		echo "    	//]]>\n
		}
		window.onload = showmap;
    	</script>\n";
		}


   	function xml2array($xml){
		$this->depth=-1;
		$this->xml_parser = xml_parser_create();
		xml_set_object($this->xml_parser, $this);
		xml_parser_set_option ($this->xml_parser,XML_OPTION_CASE_FOLDING,0);
		xml_set_element_handler($this->xml_parser, "startElement", "endElement");
		xml_set_character_data_handler($this->xml_parser,"characterData");
		xml_parse($this->xml_parser,$xml,true);
		xml_parser_free($this->xml_parser);
		return $this->arrays[0];

    }
    function startElement($parser, $name, $attrs){
		   $this->keys[]=$name; 
		   $this->node_flag=1;
		   $this->depth++;
     }
    function characterData($parser,$data){
       $key=end($this->keys);
       $this->arrays[$this->depth][$key]=$data;
       $this->node_flag=0; 
     }
    function endElement($parser, $name)
     {
       $key=array_pop($this->keys);
       if($this->node_flag==1){
         $this->arrays[$this->depth][$key]=$this->arrays[$this->depth+1];
         unset($this->arrays[$this->depth+1]);
       }
       $this->node_flag=1;
       $this->depth--;
     }



}


?>
