"use strict";


var Map = {
    lat        : -20.2624375,

    lng        : 57.466312,

    zoom       : 15,

    container  : function() {
        return document.getElementById('map');
    },

    head_write : function() {
        var resScript = document.createElement('script');
        resScript.setAttribute('src', "https://maps.googleapis.com/maps/api/js?callback=Map.map_write");
        resScript.setAttribute('async', "");
        resScript.setAttribute('defer', "");
        document.head.appendChild(resScript);
    },

    map_write  : function() {
        new google.maps.Map(this.container(), {
                                                center : {lat: this.lat, lng: this.lng},
                                                zoom   : this.zoom
                                              }
                            );
    }
}


window.onload = function() {
    Map.head_write();
}