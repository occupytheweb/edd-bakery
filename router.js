"use strict";


var router = {
    page     : {
                 active   : null,

                 content  : dom.id_get('page-content'),

                 activate : function(route) {
                     router.page.active = route;
                     header.components.stickyMenu.activate(route.name);
                 }
               },

    routes   : {
                 home     : { name : "Home",    path : "home.php"    },

                 cakes    : { name : "Cakes",   path : "store.php"   },

                 bread    : { name : "Bread",   path : "store.php"   },

                 store    : { name : "Store",   path : "store.php"   },

                 about    : { name : "About",   path : "about_us.php"},

                 gallery  : { name : "Gallery", path : "gallery.php" },

                 blog     : { name : "Blog",    path : "blog.php"    },

                 contact  : { name : "Contact", path : "contact.php" }
               },


    redirect : function(location) {
        var route = router.routes[location];
        var path  = 'routes/' + route.path;
        ajax.get(path, null, function(response) { router.writes.write_content(response); }, 'xml');
        router.page.activate(route);
    },


    writes   : {
                 write_content : function(response) {
                     dom.clear(dom.id_get('page-content'));
                     var root    = response.documentElement;
                     var content = xml.tag_text(root, "content");

                     router.page.content.innerHTML = content;
                 },

                 write_head    : function(head) {

                 },

                 execute       : function(response) {
                     //xml.
                 }
               },


    init     : function() {
        var i;
        for (i = 0; i < router.routes.length; i++) {

        }
    }
};