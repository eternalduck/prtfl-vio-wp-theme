"use strict";

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && Symbol.iterator in Object(iter)) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

// September, 29, 2020
//this file is compiled by gulp-babel from /src/js/custom.js for older browsers compatibility
// see also slick slider settings in /js/slick-config.js
//////////////////////////
//GENERAL CODE
// Globals
var scrollTop;
var pageHeight;
var winWidth;
var winHeight;
var screenBottom;
var sections;
var sectionsParents;
var headerHeight = 80; //average height

var sectionsList = [];
var sideMenu; // Toggle Popup & Mobile menus

document.querySelector(".menu-toggle_mob").addEventListener("click", function () {
  this.classList.toggle("toggled");
  document.querySelector(".menu_mobile").classList.toggle("open");
}); // end mob menus

document.addEventListener('DOMContentLoaded', function () {
  winWidth = window.innerWidth;
  winHeight = window.innerHeight; // Logic based on detecting sections in viewport:
  // .common-block class may be added to wp-groups (in wp conmtent editor) or used with page Template Name: Block / Centered

  sections = _toConsumableArray(document.querySelectorAll(".common-block"));
  sectionsParents = _toConsumableArray(document.querySelectorAll(".insert-page"));

  if (winWidth > 768 && sections != null) {
    makeSectionsList();
    createSideMenu();
    populateSideMenu();
  }
}); //DOMContentLoaded

window.addEventListener('scroll', function () {
  // vars for sections in view detection
  scrollTop = window.pageYOffset;
  screenBottom = scrollTop + winHeight;

  if (winWidth > 768 && sections != null) {
    revealSideMenu();
    watchSections();
  }
}); //scroll
// Make a list of iterable sections: 
//if block is inserted with insert-page && it has id assigned in content editor (html anchor /Custom Element ID) - take this id

function makeSectionsList() {
  sections.map(function (s) {
    if (sectionsParents != "" && s.parentNode.id != "") {
      sectionsList.push(s.parentNode.id);
    } else {
      //otherwise take section's id
      sectionsList.push(s.id);
    }
  }); // console.info(sectionsList)
} // Detect a section in the viewport


function isInViewport(el) {
  var block = document.getElementById(el);
  var advance = 150;
  var blockTopBorder = block.offsetTop;
  var blockHeight = block.offsetHeight;
  var blockBottomBorder = blockTopBorder + blockHeight;
  return scrollTop >= blockTopBorder - advance && scrollTop <= blockBottomBorder;
} // isInViewport
//Create side-menu in <body> (it has position: fixed)


function createSideMenu() {
  var menu = document.createElement("div");
  menu.setAttribute('id', "side-menu");
  menu.classList.add("side-menu", "hidden");
  document.body.appendChild(menu);
  sideMenu = document.getElementById("side-menu");
} // Make menu appear after some scroll


function revealSideMenu() {
  if (scrollTop > winHeight / 4) {
    sideMenu.classList.remove("hidden");
  } else {
    sideMenu.classList.add("hidden");
  }
} // Operations on each section on scroll


function watchSections() {
  sectionsList.forEach(function (el, i) {
    var current = document.getElementById(el);
    highlightCurrentMenuItem(el); // stickSection(el, current)//TODO
  });
} //watchSections
//Populate side-menu with relevant items


function populateSideMenu() {
  sectionsList.forEach(function (el, i) {
    var current = document.getElementById(el); // console.log(`populateSideMenu el: ${el}`)

    var anchor = document.createElement("a");
    anchor.textContent = i + 1;
    anchor.setAttribute('href', "#".concat(el));
    anchor.setAttribute('id', "".concat(el, "-item"));
    anchor.classList.add("side-menu__item");
    sideMenu.appendChild(anchor);
  });
} //end populate menu
// Highlight current block in side menu


function highlightCurrentMenuItem(el) {
  isInViewport(el) ? document.getElementById("".concat(el, "-item")).classList.add("current") : document.getElementById("".concat(el, "-item")).classList.remove("current");
} // highlight
// TODO: Slightly stick section to top


function stickSection(el, current) {
  if (isInViewport(el)) {
    window.scrollTo(0, current.offsetTop + headerHeight); // current.style.outline = "5px solid red"
  } else {
    window.scrollTo(0, scrollTop); // current.style.outline = "none"
  }
} // stickSection
