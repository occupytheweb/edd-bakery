"use strict";


var dom = {
    id_get      : function(id) {
        return document.getElementById(id);
    },

    classes_get : function(cls) {
        return document.getElementsByClassName(cls);
    },

    get         : function(selectors) {
        return document.querySelector(selectors);
    },

    clear       : function(container) {
        if(container.hasChildNodes()) {
            container.removeChild(container.firstChild);
            this.clear(container);
        }
    },

    append      : function(text) {
        return document.createTextNode(text);
    }
}


var styles = {
    add_class    : function(element, cls) {
        element.classList.add(cls);
    },

    remove_class : function(element, cls) {
        element.classList.remove(cls);
    },

    toggle_class : function(element, cls) {
        element.classList.contains(cls) ? element.classList.remove(cls) : element.classList.add(cls);
    }
}


function set_click_handler(element_s, callable) {
    if (element_s.constructor === HTMLCollection) {
        var i = element_s.length;
        while(i--) {
            element_s[i].addEventListener("click", callable, false);
        }
    } else {
        element_s.addEventListener("click", callable, false);
    }
}