Array.from(document.querySelectorAll('.media-3')).forEach(function(el) {
	if (window.innerWidth < 576) {
		el.querySelector('.stretched-link').classList.remove('stretched-link')
	}
})
