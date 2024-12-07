const tabButtons = document.querySelectorAll('[data-tab-button]');
const tabPanels = document.querySelectorAll('[data-tab-content]');
const closeButtons = document.querySelectorAll('[data-close-modal]');
const tabItems = document.querySelectorAll('[data-tabs-item]');
const headerDefault = document.querySelector('[data-header-default]');

tabButtons.forEach((item, index) => {

	item.addEventListener("click", () => {
		tabPanels.forEach((panel) => {
			panel.classList.remove('show');
		});	

		tabButtons.forEach((button) => {
			button.classList.remove('selected');
			button.setAttribute("aria-selected", false);
		});

		item.classList.add('selected');
		item.setAttribute("aria-selected", true);
		const tabContent = document.getElementById(`tabpanel-${index}`);
		const previousSiblings = [];
		let sibling = item.closest('[data-tabs-item]').previousElementSibling;
		
		while (sibling) {
			previousSiblings.push(sibling);
			sibling = sibling.previousElementSibling;
		}

		let totalHeight = 0;
		previousSiblings.forEach(sibling => {
			totalHeight += sibling.offsetHeight;
		});

		console.log(totalHeight);

		headerDefault.classList.add('active');
		tabContent.classList.add('show');
	});
});

closeButtons.forEach((item) => {
	item.addEventListener("click", () => {
		headerDefault.classList.remove('active');

		tabItems.forEach((panel) => {
			panel.classList.remove('small');
		});

		tabPanels.forEach((panel) => {
			panel.classList.remove('show');
		});

		tabButtons.forEach((button) => {
			button.classList.remove('selected');
		});
	});
});
