//mess ahead
//ui_namespace = ui_namespace || {};

var click_handler = function() {
    function listen(itm, e) {
        if(e.target == "") {
            itm.className.indexOf(" open") === -1 ? itm.className += " open" : itm.className = itm.className.replace(" open", "");
        }
    };

    var drops = document.getElementsByClassName("dropdown");
    var i = drops.length;
    while(i--) {
        d = drops[i];
        d.addEventListener("click", function(){ listen(this, event); }, false);
    }
};



window.onload = function() {
    click_handler();
};
