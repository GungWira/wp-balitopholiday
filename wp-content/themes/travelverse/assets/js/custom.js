/**
 * Is the DOM ready?
 *
 * This implementation is coming from https://gomakethings.com/a-native-javascript-equivalent-of-jquerys-ready-method/
 */
function isDOMReady(fn) {
	if (typeof fn !== 'function') return;

	if (document.readyState === 'complete') {
		return fn();
	}

	document.addEventListener('DOMContentLoaded', fn, false);
}

isDOMReady(function () {
	const animationClasses = ['[class*="animation"]', '[class*="clipIn"]'];

	function scrollTrigger(selector, options = {}) {
		const elements = [];
		selector.forEach((selector) => {
			const els = document.querySelectorAll(selector);
			elements.push(...Array.from(els));
		});

		elements.forEach((el) => {
			addObserver(el, options);
		});
	}

	function addObserver(el, options) {
		if (!("IntersectionObserver" in window)) {
			entry.target.classList.add("animate");
			return;
		}
		let observer = new IntersectionObserver((entries, observer) => {
			entries.forEach((entry) => {
				entry.target.classList.toggle("animate", entry.isIntersecting);
			});
		}, options);
		observer.observe(el);
	}

	scrollTrigger(animationClasses, {
		rootMargin: "0px"
	});
})



