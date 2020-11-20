// Slick https://kenwheeler.github.io/slick/
// the slider uses jqiery anyway so we use it here too...

// ref: Bootstrap breakpoints:
// xs: 0, sm: 576px, md: 768px, lg: 992px, xl: 1200px
// initialize slider at SM-down
// see style tweaks in styles.scss & some content blocks' css

$(document).ready(function(){


// Common slider,
// add .slider class to a group in admin
if ($(".slider").length) {

	let slider = $('.slider > .wp-block-group__inner-container');

		slider.slick({
			infinite: true,
			dots: true,
			arrows: false,
			mobileFirst: true,
			responsive: [
				{
					breakpoint: 767,//md
					settings: "unslick"
				},
				{
					breakpoint: 0,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
					}
				},
				
			]
		});

};//if .slider exists


//Portfolio page slider
if ($(".portfolio-slider").length) {

let portfSlider = $('.portfolio-slider > .wp-block-group__inner-container')

//create custom arrows
let companiesContainer = document.querySelector(".portf-companies")
let partnContainer = document.querySelector(".portf-partnership")
let sliders = [companiesContainer, partnContainer]

sliders.forEach(function(s){
	let arrNext = document.createElement("div");
	arrNext.classList.add("portfolio-slider__arr-holder", "portfolio-slider__arr-holder_next")

	let arrPrev = document.createElement("div");
	arrPrev.classList.add("portfolio-slider__arr-holder", "portfolio-slider__arr-holder_prev")

	s.append(arrNext, arrPrev)

})


portfSlider.slick({
	rows: 2,
	slidesPerRow: 2,
	infinite: true,
	arrows: true,
	dots: false,
	// mobileFirst: true,
	responsive: [
		{
			breakpoint: 991,//lg
			settings: {
				rows: 2,
				slidesPerRow: 1,
				// slidesToShow: 2,
				// slidesToScroll: 2,
			}
		},
		{
			breakpoint: 0,
			settings: {
				rows: 1,
				slidesPerRow: 1,
				slidesToShow: 1,
				slidesToScroll: 1,
			}
		},
	]
});


};//if .slider exists




});//doc ready
