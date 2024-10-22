
window.addEventListener('load', function(){
	new Glider(document.querySelector('.carousel__lista3'), {
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: {
			prev: '.carousel__anterior3',
			next: '.carousel__siguiente3'
		},
		responsive: [
			{
				breakpoint: 1000,
				settings: {
				  slidesToShow: 3,
				  slidesToScroll: 1
				}
			  },
			{
			  breakpoint: 750,
			  settings: {
				slidesToShow: 2,
				slidesToScroll: 1
			  }
			},
			{
			  breakpoint: 450,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			  }
			}
		]
	});
});