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
                                break;
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

                    signoff : dom.id_get('sign_out'),

                    handler : function(thisDrop, sourceEvent) {
                        if (sourceEvent.target == "") {
                            styles.toggle_class(thisDrop, "open");
                        }
                    }
                 },

    head       : {
                    container : dom.id_get('header-container'),

                    wipe      : function() { dom.clear( header.components.head.container ); },

                    write     : function(content) {
                        header.components.head.container.innerHTML = content;
                    }
                 }
};


header.handlers   = {
    write_head : function(headContent) {
        header.components.head.wipe();
        header.components.head.write(headContent);
        header.handlers.init();
    },

    update     : function() {
        ajax.get('controllers/header.php', null, function(response) { header.handlers.write_head(response); } );
    },

    init       : function() {
        window.addEventListener("scroll", function() { header.components.stickyMenu.handler(); }, false);

        set_click_handler(header.components.dropdowns.drops, function() { header.components.dropdowns.handler(this, event); } );

        try {
            set_click_handler(header.components.dropdowns.signoff, function() {
                                                                    ajax.get('controllers/log_out.php', null, function(response) {
                                                                        header.handlers.write_head(response); } );
                                                                    }
                             );
        } catch(e) { }
    }
}


header.auth = {
    controls : {
                 login_btn    : dom.id_get('login_btn'),

                 register_btn : dom.id_get('register_btn'),

                 uid          : {
                                  ctrl   : dom.id_get('login-uid'),

                                  status : dom.id_get('uid-status'),

                                  valid  : false
                 },

                 pass         : {
                                  ctrl   : dom.id_get('login-pass'),

                                  status : dom.id_get('pass-status')
                 },

                 reg_form     : {
                                  form   : dom.id_get('register-container'),

                                  submit : dom.id_get('register_submit')
                                }
               },

    handlers : {
                 validator    : {
                    validateuid : function() {
                        var uid = { uid : header.auth.controls.uid.ctrl.value };

                        if (uid.uid) {
                            ajax.post('controllers/uid_validate.php', uid, function(response) {
                                var uid = JSON.parse(response);
                                if (uid.valid) {
                                    header.auth.handlers.validator.set_valid(header.auth.controls.uid, 'uid');
                                } else {
                                    header.auth.handlers.validator.set_invalid(header.auth.controls.uid, 'uid');
                                }
                            });
                        } else { header.auth.handlers.validator.set_blank(header.auth.controls.uid, 'uid'); }
                    },

                    set_blank   : function(control, controlType) {
                        if (controlType == 'uid') {
                            header.auth.controls.uid.valid   = false;
                        }
                        control.ctrl.style.borderColor       = "#fff";
                        control.status.innerHTML             = "";
                    },

                    set_valid   : function(control, controlType) {
                        if (controlType == 'uid') {
                            header.auth.controls.uid.valid   = true;
                        }
                        control.ctrl.style.borderColor       = "#ABEFD9";
                        control.status.innerHTML             = "&#10004;";
                    },

                    set_invalid : function(control, controlType) {
                        if (controlType == 'uid') {
                            header.auth.controls.uid.valid   = false;
                        }
                        control.ctrl.style.borderColor       = "#E82355";
                        control.status.innerHTML             = "&#10006;";
                    }
                 },

                 login          : {
                    execute               : function() {
                        if (header.auth.controls.uid.valid) {
                            var uid    = header.auth.controls.uid.ctrl.value;
                            var pass   = header.auth.controls.pass.ctrl.value;

                            var creds  = { uid : uid, pass : pass };

                            ajax.post('controllers/log_in.php', creds, function(res) { header.auth.handlers.login.process_auth_response(res) }, 'xml');
                        }
                    },

                    process_auth_response : function(response) {
                        var root       = response.documentElement;
                        var statusNode = xml.tag(root, "status");

                        var username   = xml.tag_text(root, "username");
                        var status     = xml.tag_text(statusNode, "state");
                        var reason     = xml.tag_text(statusNode, "reason");

                        if (status == 'true') {
                            header.auth.handlers.login.success();
                        } else {
                            header.auth.handlers.login.failure();
                        }
                    },

                    success              : function () {
                        header.handlers.update();
                    },

                    failure              : function () {
                        header.auth.handlers.validator.set_invalid(header.auth.controls.pass, 'pass');
                    }
                 },

                 register       : function() {},


                 init           : function() {
                    header.auth.controls.uid.ctrl.addEventListener("blur", function() { header.auth.handlers.validator.validateuid(); }, true             );
                    set_click_handler( header.auth.controls.login_btn,     function() { header.auth.handlers.login.execute();                           } );
                    set_click_handler( header.auth.controls.register_btn,  function() { styles.add_class(header.auth.controls.reg_form.form, 'active'); } );
                 }
               }
}



header.handlers.init();
header.auth.handlers.init();