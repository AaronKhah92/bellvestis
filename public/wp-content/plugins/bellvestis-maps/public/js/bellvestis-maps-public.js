(function($) {
  "use strict";
  $.ajax({
    type: "GET",
    url: "http://bellvestis.test/wp-json/wp/v2/store",
    success: function(markers) {
      var jsonData = markers;
      /*  Add a maker for every outlet store */
      for (var i = 0; i < jsonData.length; i++) {
        addMarker(jsonData[i].acf);
      }
    }
  });
})(jQuery);

// Initialize and add the map
function initMap() {
  // Options
  var options = {
    zoom: 10,
    center: {
      lat: 55.631432,
      lng: 13.70557
    }
  };

  // The map, centered at sjobo
  map = new google.maps.Map(document.getElementById("map"), options);
}

function addMarker(props) {
  var markerOptions = {
    position: {
      lat: parseFloat(props["store_latitud"]),
      lng: parseFloat(props["store_longitud"])
    },
    map: map
  };
  var marker = new google.maps.Marker(markerOptions);

  if (props.store_marker_icon) {
    marker.setIcon(props.store_marker_icon);
  }

  if (props.store_marker_content_box) {
    var infoContent = {
      content: props.store_marker_content_box
    };

    var infoWindow = new google.maps.InfoWindow(infoContent);

    marker.addListener("click", function() {
      infoWindow.open(map, marker);
    });
  }
}
