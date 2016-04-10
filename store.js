"use strict";


var store = {};


store.components = {
    products          : dom.classes_get("store-item"),

    details_modal     : {
                          panel        : dom.id_get("product-expanded"),

                          close_btn    : dom.id_get("close-product-preview"),

                          cart_add_btn : dom.id_get("add-to-cart"),

                          this_product : null,

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
                                         },

                          update        : function(name, desc, price, src) {
                                              store.components.details_modal.product_img.set(src)  ;
                                              store.components.details_modal.product_name.set(name);
                                              store.components.details_modal.product_desc.set(desc);
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
    open_modal    : function() {
        styles.add_class(store.components.details_modal.panel, "active");
    },

    close_modal   : function() {
        styles.remove_class(store.components.details_modal.panel, "active");
    },

    open_preview  : function() {
        styles.add_class(store.components.cart_preview.pane, "active");
    },

    close_preview : function(target, origin) {
        styles.remove_class(store.components.cart_preview.pane, "active");
    },

    show_product  : function(target) {
        var id             = { sharedID : target.getAttribute('data-product-id') };
        var productDetails = products[id.sharedID];

        pass_product_to_modal(productDetails);
        //ajax.post('controllers/product_info.php', id, function(response) { pass_product_to_modal(response); } );
    },


    init          : function() {
        var i = store.components.products.length;
        while(i--) {
            var thisProduct = store.components.products[i];
            set_click_handler( thisProduct,  function() { store.handlers.show_product(this); }  );
        }

        set_click_handler( store.components.preview_open,               function() { store.handlers.open_preview();  } );
        set_click_handler( store.components.preview_close,              function() { store.handlers.close_preview(); } );
        set_click_handler( store.components.details_modal.close_btn,    function() { store.handlers.close_modal();   } );
        set_click_handler( store.components.details_modal.cart_add_btn, function() {
                                                                            add_to_cart(store.components.details_modal.this_product)
                                                                        }
                         );
    }
}


function pass_product_to_modal(productDetails) {
    var details = productDetails;
    var name    = details.name;
    var desc    = details.description;
    var price   = details.price;
    var img_src = details.img_src;

    store.components.details_modal.this_product = productDetails;
    store.components.details_modal.update(name, desc, price, img_src);
    store.handlers.open_modal();
}

function add_to_cart(product) {
    var pid = { sharedID : product.sharedID };

    ajax.post('controllers/add_to_cart.php', pid, function(response) { } );
}

window.addEventListener("load", function() { store.handlers.init(); }, false);