//mess ahead
//ui_namespace = ui_namespace || {};
var drops = document.getElementsByClassName("dropdown");

function listen(itm) {
  //console.log(itm);
  console.log(itm.className + " idx: " + itm.className.indexOf(" open"));
  itm.className.indexOf(" open") === -1 ? itm.className += " open" : itm.className = itm.className.replace(" open", "");
}

window.onload = function() {
//    var drops = document.getElementsByClassName("dropdown");
    var i = drops.length;
    console.log("length: " + i);
    while(i--) {
      console.log("i1: " + i);
      d = drops[i];
      //console.log(d);
      d.addEventListener("click", function(){ listen(d); }, false);
      //d.bind("click", function() { listen(d); }, false );
    }
};