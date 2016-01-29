//mess ahead
//ui_namespace = ui_namespace || {};
var drops = document.getElementsByClassName("dropdown");
window.onload = function() {
//    var drops = document.getElementsByClassName("dropdown");
    var i = drops.length;
    while(i--) {
      d = drops[i];
      console.log(d);
      d.addEventListener("click", function(){
          d.className.indexOf(" active") === -1 ? d[i].className += " active" : d[i].className.replace(" active", "");
      });
    }
};