// September, 29, 2020
//this file is compiled by gulp-babel from /src/js/custom.js for older browsers compatibility

// see also slick slider settings in /js/slick-config.js

//////////////////////////
//GENERAL CODE

// Globals
let scrollTop
let pageHeight
let winWidth
let winHeight
let screenBottom
let sections
let sectionsParents
let headerHeight = 80//average height
let sectionsList = []
let sideMenu

// Toggle Popup & Mobile menus
document.querySelector(".menu-toggle_mob").addEventListener("click", function(){
	this.classList.toggle("toggled")
	document.querySelector(".menu_mobile").classList.toggle("open")
})
// end mob menus


document.addEventListener('DOMContentLoaded', function () {

	winWidth = window.innerWidth;
	winHeight = window.innerHeight;
// Logic based on detecting sections in viewport:
// .common-block class may be added to wp-groups (in wp conmtent editor) or used with page Template Name: Block / Centered
	sections = [...document.querySelectorAll(".common-block")]
	sectionsParents = [...document.querySelectorAll(".insert-page")]

	if (winWidth > 768 && sections != null) {
		makeSectionsList()
		createSideMenu()
		populateSideMenu()
	}
})//DOMContentLoaded



window.addEventListener('scroll', function () {

	// vars for sections in view detection
	scrollTop = window.pageYOffset;
	screenBottom = scrollTop + winHeight;
	if (winWidth > 768 && sections != null) {
		revealSideMenu()
		watchSections()
	}

})//scroll


// Make a list of iterable sections: 
//if block is inserted with insert-page && it has id assigned in content editor (html anchor /Custom Element ID) - take this id
function makeSectionsList(){
	sections.map(function(s){
		if(sectionsParents != "" && s.parentNode.id != "") {
			sectionsList.push(s.parentNode.id)
		} else {//otherwise take section's id
			sectionsList.push(s.id)
		}
	})
	// console.info(sectionsList)
}

// Detect a section in the viewport
function isInViewport(el) {
	let block = document.getElementById(el)
	let advance = 150
	let blockTopBorder = block.offsetTop
	let blockHeight = block.offsetHeight
	let blockBottomBorder = blockTopBorder + blockHeight
	return (
		(scrollTop >= blockTopBorder - advance) && (scrollTop <= blockBottomBorder)
	)
}// isInViewport

//Create side-menu in <body> (it has position: fixed)
function createSideMenu(){
	let menu = document.createElement("div");
	menu.setAttribute('id', "side-menu");
	menu.classList.add("side-menu", "hidden");
	document.body.appendChild(menu);
	sideMenu = document.getElementById("side-menu")
}

// Make menu appear after some scroll
function revealSideMenu() {
	if ( scrollTop > winHeight / 4) {
		sideMenu.classList.remove("hidden")
	} else {
		sideMenu.classList.add("hidden")
	}
}

// Operations on each section on scroll
function watchSections(){
	sectionsList.forEach((el, i) => {
		let current = document.getElementById(el)

		highlightCurrentMenuItem(el)
		// stickSection(el, current)//TODO

	})
}//watchSections

//Populate side-menu with relevant items
function populateSideMenu(){
	sectionsList.forEach((el, i) => {
		let current = document.getElementById(el)
		// console.log(`populateSideMenu el: ${el}`)
		let anchor = document.createElement("a");
		anchor.textContent = i + 1
		anchor.setAttribute('href', `#${el}`);
		anchor.setAttribute('id', `${el}-item`);
		anchor.classList.add("side-menu__item")
		sideMenu.appendChild(anchor);
	})
}//end populate menu

// Highlight current block in side menu
function highlightCurrentMenuItem(el){
	isInViewport(el) ? 
		document.getElementById(`${el}-item`).classList.add("current") : 
		document.getElementById(`${el}-item`).classList.remove("current")
}// highlight

// TODO: Slightly stick section to top
function stickSection(el, current){
	if(isInViewport(el)){
		window.scrollTo(0, current.offsetTop + headerHeight)
		// current.style.outline = "5px solid red"
	} else {
		window.scrollTo(0, scrollTop)
		// current.style.outline = "none"
	}

}// stickSection

// WTF
// TODO: make .common-block stick to screen edges
// let stuck = false
// if(!stuck) {
// 	window.scrollTo(0, current.offsetTop - headerHeight)
// 	stuck = true
// }
// console.info(current.offsetTop, stuck)


// const stickySection = () => {
// 	let flag = true;
// 	let wind  = $(window);
// 	let topMenuHeight = $('.header').height();
// 	let sections = $('.insert-page').each(function(index) {
// 			$(this).css({'z-index': (index + 1) * 2});
// 			this._bar = $(this).find('.common-block');
// 		});

// 	function fixPos() {
// 		sections.each(function(index, section) {
// 			let top = section.offsetHeight;
// 			let block = section.getBoundingClientRect();
// 			let winTop = window.scrollTop || 0;

// 			if (top - winTop <= 300 && flag) {
// 				flag = false;
// 				// $('html, body').animate({ scrollTop: top - 300}, 1000);
// 				setTimeout(() => {
// 					flag = true;
// 				}, 5000);
// 			}

// 			if (sections.length - 1 === index) return;

// 			$(this._bar).toggleClass('sticky', block.top < 0 && block.bottom > 0);
// 		});
// 	}

// 	fixPos();
// 	wind.on('load scroll', fixPos);
// };

