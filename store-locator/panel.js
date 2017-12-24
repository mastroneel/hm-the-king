google.maps.event.addDomListener(window, 'load', function() {
  (function() {
    function error(err) {
      console.log('ERROR('+err.code+'): '+err.message);
      if (map && map.setCenter) map.setCenter(new google.maps.LatLng(37.7749, -122.4194))
    };

      if(!!navigator.geolocation) {

          var map;

          var mapOptions = {
              zoom: 12,
              mapTypeId: google.maps.MapTypeId.ROADMAP
          };

          map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

          navigator.geolocation.getCurrentPosition(function(position) {

              var geolocate = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

              map.setCenter(geolocate);

          }, error);

      }

      // else {



        // var map = new google.maps.Map(document.getElementById('map-canvas'), {
        //   center: new google.maps.LatLng(37.7749, -122.4194),
        //   zoom: 12,
        //   mapTypeId: google.maps.MapTypeId.ROADMAP
        // });
      // }



      var panelDiv = document.getElementById('panel');

      var data = new MedicareDataSource;

      var view = new storeLocator.View(map, data, {
        geolocation: false,
        features: data.getFeatures()
      });

      new storeLocator.Panel(panelDiv, {
        view: view
      });

  })();
});









// google.maps.event.addDomListener(window, 'load', function() {
//   var map = new google.maps.Map(document.getElementById('map-canvas'), {
//     center: new google.maps.LatLng(37.7749, -122.4194),
//     zoom: 12,
//     mapTypeId: google.maps.MapTypeId.ROADMAP
//   });
//
//   var panelDiv = document.getElementById('panel');
//
//   var data = new MedicareDataSource;
//
//   var view = new storeLocator.View(map, data, {
//     geolocation: false,
//     features: data.getFeatures()
//   });
//
//   new storeLocator.Panel(panelDiv, {
//     view: view
//   });
// });
