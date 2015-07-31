window.onload=function(){
	var map = new BMap.Map('map')
	var point = new BMap.Point(116.404, 39.915);    
	map.centerAndZoom(point, 15);    
	
	
	window.setTimeout(function(){  
    	map.panTo(new BMap.Point(116.409, 39.918));    
	}, 	2000);
	
//	var navigation=new BMap.NavigationControl()
//	map.addControl(navigation); 
	var zoomControl=new BMap.ZoomControl();  
	map.addControl(zoomControl);//添加缩放控件  
	var scaleControl=new BMap.ScaleControl();  
	map.addControl(scaleControl);//添加比例尺控件  
	
	
	var marker = new BMap.Marker(new BMap.Point(116.404, 39.915));        // 创建标注      
	map.addOverlay(marker);
	
	
	var bounds = map.getBounds();      
	var lngSpan = bounds.getNorthEast().lng - bounds.getSouthWest().lng;      
	var latSpan = bounds.getNorthEast().lat- bounds.getSouthWest().lat;      
	for (var i = 0; i < 10; i++) {  
		var point = new BMap.Point(bounds.getSouthWest().lng + lngSpan * (Math.random() * 0.7 + 0.15), bounds.getSouthWest().lat + latSpan * (Math.random() * 0.7 + 0.15));  
		addMarker(point, i, map);  
	}
	
	
	
}
function addMarker(point, index,map){  // 创建图标对象     
  var myIcon = new BMap.Icon("http://api.map.baidu.com/mapCard/img/location.gif",
		new BMap.Size(14, 23), {      
       	// 指定定位位置。     
       	// 当标注显示在地图上时，其所指向的地理位置距离图标左上      
       	// 角各偏移7像素和25像素。您可以看到在本例中该位置即是     
       	// 图标中央下端的尖角位置。      
       		anchor: new BMap.Size(7, 25),        
      	});        
 // 创建标注对象并添加到地图     
  var marker = new BMap.Marker(point, {icon: myIcon});      
  map.addOverlay(marker);      
  marker.addEventListener("click", function(){      
      		var infoWindow = new BMap.InfoWindow("World", opts);  // 创建信息窗口对象      
      		map.openInfoWindow(infoWindow, marker.getPosition());      // 打开信息窗口
      	});
 }      
 var opts = {      
    width : 100,     // 信息窗口宽度      
    height: 50,     // 信息窗口高度      
    title : "Hello",  // 信息窗口标题     
    enableAutoPan : true //自动平移
}      
