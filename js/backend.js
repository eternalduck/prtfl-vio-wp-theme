"use strict";

(function () {
  //generate link to manual in admin above a page editor
  document.addEventListener('DOMContentLoaded', function () {
    setTimeout(function () {
      //dom renders too slow here
      var a = document.createElement('a');
      a.appendChild(document.createTextNode("Manual: How to Edit This Site"));
      a.href = "...";
      a.className = "manual-link"; //styled in backend.css

      a.target = "_blank";
      document.getElementById("editor").appendChild(a);
    }, 1500);
  }); //DOMContentLoaded
})();