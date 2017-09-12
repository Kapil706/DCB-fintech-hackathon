window.onload = function() {
	
	
    var latlng = new google.maps.LatLng(51.4975941, -0.0803232);
    var map = new google.maps.Map(document.getElementById('map'), {
        center: latlng,
        zoom: 11,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        title: 'Set lat/lon values for this property',
        draggable: true
    });
    google.maps.event.addListener(marker, 'dragend', function(a) {
        console.log(a);
        var div = document.createElement('div');
        div.innerHTML = a.latLng.lat().toFixed(4) + ', ' + a.latLng.lng().toFixed(4);
        document.getElementsByTagName('body')[0].appendChild(div);
    });
	
	
};


