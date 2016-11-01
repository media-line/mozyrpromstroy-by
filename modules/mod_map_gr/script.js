jQuery(document).ready(function() {
    function mapHandler () {

        jQuery('.mod-map-gr').each(function () {

            var json = jQuery.parseJSON(jQuery(this).find('.js-map-gr-json').val());

            ymaps.ready(init);

            function init() {
                mapGr = new ymaps.Map("page_map_gr"+json.id, {
                    center: [json.mapx, json.mapy],
                    zoom: json.mapzoom,
                    controls: ['zoomControl', 'typeSelector',  'fullscreenControl']
                });

                json.markers.forEach(function(marker, i) {
                    var mapPlacemark = new ymaps.Placemark([marker.markerx,marker.markery], {}, {
                        iconLayout: 'default#image',
                        iconImageHref: '/modules/mod_map_gr/map-marker.png',
                        iconImageSize: [54, 66],
                        iconImageOffset: [-27, -66]
                    });

                    mapGr.geoObjects.add(mapPlacemark);
                });

                mapGr.behaviors.disable('scrollZoom');
            }
        });
    }

    mapHandler();
});