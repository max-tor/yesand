import { header_height, querySelectorAll, range_to_array, remove_all, scroll_to_element } from './helpers'

// global.$ = global.jQuery = require('jquery');

function subscribe_to_click_on_team_member_block(block) {
	block.addEventListener('click', function(event) {

		if (this.ariaSelected) {
			console.log('This is open', this.ariaSelected)
			remove_active_block()
			clear_active_circle()
		} else {
			console.log('This is closed', this.ariaSelected)
			remove_active_block()
			clear_active_circle()
			set_active_circle(this)
			show_block(this)
		}
	})
}

function subscribe_to_click_on_close_btn(button) {
	button.addEventListener('click', function(event) {
		this.closest('[data-js="team-member-content-clone"]').remove()
		clear_active_circle()
	})
}

function remove_active_block() {
	remove_all('[data-js="team-member-content-clone"]')
}

function row_size() {
	if (window.innerWidth > 1024) return 4
	if (window.innerWidth > 768)  return 3
	if (window.innerWidth > 640)  return 2
	return 1
}

function clear_active_circle() {
	querySelectorAll('[data-js="team-member"][aria-selected]').forEach(function(el) {
		el.ariaSelected = null
	})
}

function set_active_circle(active_el) {
	active_el.ariaSelected = true
}

function block_index(block) {
	return querySelectorAll('[data-js="team-member"]').indexOf(block)
}

function block_to_insert_clone_after(block) {
	const index = block_index(block)
	const columns = row_size()
	const row_index = Math.floor(index / columns)
	const start_index = columns * row_index
	const end_index   = columns * (row_index + 1) - 1

	return range_to_array(start_index, end_index)
					.reverse()
					.map(index => `[data-js="team-member"]:nth-child(${index + 1})`)
					.map(selector => document.querySelector(selector))
					.filter(block => block)[0]
}

function prepare_clone(block) {
	const clone = block.querySelector('[data-js="team-member-content"]').cloneNode(true)

	clone.dataset.js = 'team-member-content-clone'
	clone.classList.remove('hidden')

	const button = clone.querySelector('[data-js="close-team-member-block"]')
	subscribe_to_click_on_close_btn(button)

	return clone
}

function show_block(block) {
	const clone = prepare_clone(block)
	block_to_insert_clone_after(block).insertAdjacentElement('afterend', clone)
	// global.jQuery(clone).slideDown('slow')
	clone.ariaExpanded = true
	scroll_to_element(clone)
}

querySelectorAll('[data-js="team-member"]').forEach(function(block) {
	subscribe_to_click_on_team_member_block(block)
})
