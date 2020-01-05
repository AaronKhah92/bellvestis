function getMouseCoords(e) {
  var e = e || window.event;
  document.getElementById("msg").innerHTML =
    e.clientX + ", " + e.clientY + "<br>" + e.screenX + ", " + e.screenY;
}

var followCursor = (function() {
  var s = document.getElementById("object");
  s.style.position = "absolute";

  return {
    init: function() {
      document.body.appendChild(s);
    },

    run: function(e) {
      var e = e || window.event;
      s.style.left = e.clientX - 5 + "px";
      s.style.top = e.clientY - 5 + "px";
      getMouseCoords(e);
    }
  };
})();

window.onload = function() {
  followCursor.init();
  document.body.onmousemove = followCursor.run;
};
