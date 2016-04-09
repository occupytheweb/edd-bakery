"use strict";


var store = {};


store.components = {
    products          : dom.classes_get("store-item"),

    details_modal     : {
                          panel        : dom.id_get("product-expanded"),

                          product_name : {
                                           get : function()     { return dom.id_get('product-name').textContent; },

                                           set : function(name) { dom.id_get('product-name').textContent = name; }
                                         },

                          product_desc : {
                                           get : function()     { return dom.id_get('product-description').textContent; },

                                           set : function(desc) { dom.id_get('product-description').textContent = desc; }
                                         },

                          product_img  : {
                                           get : function()     { return dom.id_get('product-image').src; },

                                           set : function(src)  { dom.id_get('product-image').src = src;  }
                                         }
                        },

    cart_preview      : {
                          widget : {
                            num_of_items : function() { return dom.id_get("cart-counter").textContent; },

                            update       : function(value) { dom.id_get("cart-counter").textContent = value; }
                          },

                          pane   : dom.id_get("cart-preview-pane")
                        },

    preview_open      : dom.id_get("cart-button-container"),

    preview_close     : dom.id_get("close-cart-preview")
};


store.handlers = {
    //expander is deprecated
    expander      : function(target, origin) {
        previous : this.previous || target;
        state    : this.state    || true;

        if( target === this.previous ) {
            $("#product-expanded").slideToggle(500, function() {} );
            this.state = !(this.state);
        } else {
            this.previous = target;
        }
    },

    open_preview  : function() {
        styles.add_class(store.components.cart_preview.pane, "active");
    },

    close_preview : function(target, origin) {
        styles.remove_class(store.components.cart_preview.pane, "active");
    },

    get_pro_info  : function(target) {
        var id = { sharedID : target.getAttribute('data-product-id') };

        ajax.post('product_info.php', id, function(response) { alert(response); });
    },

    init          : function() {
        var i = store.components.products.length;
        while(i--) {
            var thisProduct = store.components.products[i];
            set_click_handler( thisProduct,  function() { store.handlers.get_pro_info(this); }  );  // function() { listen(this, event, store.handlers.expander) } );
        }

        set_click_handler( store.components.preview_open,  function() { store.handlers.open_preview();  } );
        set_click_handler( store.components.preview_close, function() { store.handlers.close_preview(); } );
    }
}


function listen(target, origin, action) {
    action(target, origin);
}

window.addEventListener("load", function() { store.handlers.init(); }, false);