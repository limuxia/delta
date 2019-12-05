<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title></title>
<script charset="utf-8" src="http://map.qq.com/api/js?v=2.exp&key=5RRBZ-3VBAR-67OW5-WAJDA-4DER5-5UF67"></script>
</head>
<body>
	<div id="map" style="width:1600px;height:900px;">
	  <script>
    var map = new qq.maps.Map(document.getElementById('map'),{
        center: new qq.maps.LatLng(0,0),
        zoom: 10
    });
  
  	var addressNo=0;
  	var geocoderArray=[];
    var locationArray=[];
  
  function LocationMarker(add){
	var i='a'+addressNo;
  	geocoderArray[i] =[
  		new qq.maps.Geocoder({
        	complete : function(result){
          		geocoderArray[i][1]=result.detail.location;
          		map.setCenter(geocoderArray[i][1]);
            	var marker = new qq.maps.Marker({
                	map: map,
                	position: geocoderArray[i][1]
            	}); 
          		var marker_label = new qq.maps.Label({
    				map: map,
    				position: geocoderArray[i][1],
    				content: add
				});
        	}
    	})
    ,];
    geocoderArray[i][0].getLocation(add);
  	addressNo++;
  }     
 
    function codeAddress(){
      addressNo=0;
      for(x in geocoderArray){
       locationArray[addressNo]=geocoderArray[x][1]; 
       addressNo++;
      }
      var polyline = new qq.maps.Polyline({
        path: locationArray,
        strokeColor: '#FF0000',
        strokeWeight: 3,
        editable:false,
        map: map
      });
      map.setCenter(locationArray[0]);
    }


<?php
$arrayPosition=$_REQUEST['position'];
foreach ($arrayPosition as $position){
	echo 'LocationMarker("'.$position.'");';
}
?>

//因为api的调用是异步，结果返回是随机的，所以加入足够的定时时间以保证返回全部值进行处理
setTimeout("codeAddress()",1000);
</script>
	</div>
</body>
</html>