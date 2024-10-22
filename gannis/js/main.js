tinymce.init({
	selector: "textarea#formGroupDescripcion",
	skin: "bootstrap",
	plugins: "lists, link, image, media",
	toolbar:
		"h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help",
	menubar: false,
});

function scrollUp() {
	var currentScroll =
		document.documentElement.scrollTop || document.body.scrollTop;

	if (currentScroll > 0) {
		window.requestAnimationFrame(scrollUp);
		window.scrollTo(0, currentScroll - currentScroll / 7);
	}
}

window.onscroll = function () {
	var scroll = document.documentElement.scrollTop;

	if (scroll > 500) {
		document.getElementById("scroll-up").style.transform = "scale(1)";
	} else if (scroll < 500) {
		document.getElementById("scroll-up").style.transform = "scale(0)";
	}
};
