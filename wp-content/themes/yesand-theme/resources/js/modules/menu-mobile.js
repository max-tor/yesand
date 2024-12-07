import { querySelectorAll, toggle_aria_expanded, toggle_class } from './helpers'

querySelectorAll('[data-js="mobile-menu-toggle"]').forEach(function(button) {
	button.addEventListener('click', function(event) {
		const menu_el = document.querySelector('[data-collapsible="mobile-menu"]')
		const body = document.body
		toggle_class(menu_el, 'xs-open')
		toggle_class(body, 'no-scroll')
		toggle_aria_expanded(this)
	})
})
