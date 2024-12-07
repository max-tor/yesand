export function header_height() {
	return document.getElementById('wrap-header').clientHeight
}

export function querySelectorAll(query) {
	return Array.from(document.querySelectorAll(query))
}

export function range_to_array(from, upto) {
	if (typeof from !== 'number') { throw new Error('“from” must be numeric') }
	if (typeof upto !== 'number') { throw new Error('“upto” must be numeric') }
	if (from > upto) { throw new Error('the 2nd argument must not be smaller') }

	const arr = []
	for(let i = from; i <= upto; i++) { arr.push(i) }
	return arr
}

export function scroll_to_element(clone) {
	window.scrollTo({ behavior: 'smooth', top: (clone.offsetTop - header_height()) })
}

export function toggle_class(element, className) {
	const cl = element.classList
	cl.contains(className) ? cl.remove(className) : cl.add(className)
}

export function toggle_aria_expanded(btn) {
	btn.ariaExpanded = btn.ariaExpanded !== 'true'
}

export function remove_all(selector) {
	querySelectorAll(selector).forEach(el => el.remove())
}
