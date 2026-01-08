document.addEventListener('DOMContentLoaded', function() {
	const blocks = document.querySelectorAll('.text-and-image');

	blocks.forEach(function(block) {
		const readMoreBtn = block.querySelector('.text-and-image__read-more');
		const bodyText = block.querySelector('.text-and-image__body');

		if (readMoreBtn && bodyText) {
			readMoreBtn.addEventListener('click', function() {
				bodyText.style.display = 'block';
				readMoreBtn.style.display = 'none';
				readMoreBtn.setAttribute('aria-expanded', 'true');
			});
		}
	});
});
