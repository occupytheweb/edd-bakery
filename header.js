"use strict";


var header = {};


header.components = {
    stickyMenu : {
                    navbar   : dom.id_get("sticky-menu"),

                    tabs     : dom.classes_get("tab"),

                    activate : function(tabName) {
                        styles.remove_class(this.tabs, "active");
                        var i = this.tabs.length;
                        while(i--) {
                            var thisTab = this.tabs[i];
                            if ( dom.text_is(thisTab, tabName) ) {
                                styles.add_class(thisTab, "active");
                            }
                        }
                    },

                    y_offset : function() { return window.pageYOffset; },

                    freeze   : function() {
                        this.navbar.classList.add("fixed");
                    },

                    release  : function() {
                        this.navbar.classList.remove("fixed");
                    },

                    handler  : function() {
                        if (this.y_offset() > 100) {
                            this.freeze();
                        } else {
                            this.release();
                        }
                    }
                 },

    dropdowns  : {
                    drops   : dom.classes_get("dropdown"),

                    handler : function(thisDrop, sourceEvent) {
                        if (sourceEvent.target == "") {
                            styles.toggle_class(thisDrop, "open");
                        }
                    }
                 }
};


window.addEventListener("scroll", function() { header.components.stickyMenu.handler(); }, false);

set_click_handler(header.components.dropdowns.drops, function() { header.components.dropdowns.handler(this, event); } );