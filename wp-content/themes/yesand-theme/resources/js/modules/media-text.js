const showMoreBtn = document.querySelector("[data-show-more-btn]");
const showMore = document.querySelector("[data-show-more]");
const boxes = document.querySelectorAll("[data-img-text]");

if (showMoreBtn) {
	let visibleBoxCount = 3;

	showMoreBtn.addEventListener("click", () => {
		visibleBoxCount += 3;
		for (let i = 0; i < boxes.length; i++) {
			boxes[i].style.display = (i < visibleBoxCount) ? "block" : "none";
		}
		if (visibleBoxCount >= boxes.length) {
			showMore.style.display = "none";
		}
	});
}
