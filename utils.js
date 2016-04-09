"use strict";


var dom = {
    id_get      : function(id) {
        return document.getElementById(id);
    },

    classes_get : function(cls) {
        return document.getElementsByClassName(cls);
    },

    get         : function(selectors) {
        return document.querySelectorAll(selectors);
    },

    clear       : function(container) {
        if(container.hasChildNodes()) {
            container.removeChild(container.firstChild);
            this.clear(container);
        }
    },

    append      : function(text) {
        return document.createTextNode(text);
    },

    text_is     : function(element, text) {
        return (element.textContent.trim() === text);
    }
}


var styles = {
    add_class    : function(element_s, cls) {
        if (element_s.isNodeList()) {
            var i = element_s.length;
            while(i--) {
                element_s[i].classList.add(cls);
            }
        } else {
            element_s.classList.add(cls);
        }
    },

    remove_class : function(element_s, cls) {
        if (element_s.isNodeList()) {
            var i = element_s.length;
            while(i--) {
                element_s[i].classList.remove(cls);
            }
        } else {
            element_s.classList.remove(cls);
        }
    },

    toggle_class : function(element, cls) {
        element.classList.contains(cls) ? element.classList.remove(cls) : element.classList.add(cls);
    }
}


function set_click_handler(element_s, callable) {
    if (element_s.isNodeList()) {
        var i = element_s.length;
        while(i--) {
            element_s[i].addEventListener("click", callable, false);
        }
    } else {
        element_s.addEventListener("click", callable, false);
    }
}


Element.prototype.isNodeList  = function() { return false; };
NodeList.prototype.isNodeList = HTMLCollection.prototype.isNodeList = function() { return true; };