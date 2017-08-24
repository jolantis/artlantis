/**
 * Filters (show-hide filter tags) module
 */

var Filters = (function () {

	function toggle(event) {
		event.preventDefault();
		var button = event.target;
		var expandtarget = document.getElementsByClassName('js-expandtarget')[0];
		var expandparent = expandtarget.parentNode;

		if(expandparent.classList.contains('is-closed')) {
			expandparent.removeChild(button);
			button.textContent = 'Less −';
			// button.classList.add('js-exapndbutton');
			expandtarget.appendChild(button);
			expandparent.classList.remove('is-closed');
			expandparent.classList.add('is-open');
		}
		else {
			expandtarget.removeChild(button);
			button.textContent = 'More +';
			expandparent.insertBefore(button, expandtarget);
			expandparent.classList.remove('is-open');
			expandparent.classList.add('is-closed');
		}
	}

	function init() {
		var expandtarget = document.getElementsByClassName('js-expandtarget')[0];

		if(expandtarget) {
			var expandparent = expandtarget.parentNode;
			// var button = expandtarget.parentNode.getElementsByClassName('js-exapndbutton')[0];
			var button = expandtarget.parentNode.getElementsByTagName('button')[0];
			var lastItem = expandtarget.lastElementChild;

			if(expandparent.classList.contains('is-open')) {
				expandtarget.removeChild(button);
				expandparent.classList.remove('is-open');
			}
			else {

				if(isVisible(lastItem)) {
					expandparent.classList.add('is-visible');

					if(button) {
						button.remove();
						expandparent.classList.remove('is-closed');
					}
				}
				else {

					if(!button) {
						var newButton = document.createElement('button');
						// newButton.classList.add('js-exapndbutton');
						newButton.setAttribute('aria-hidden', true);
						newButton.textContent = 'More +';
						expandparent.classList.add('is-closed');
						expandparent.classList.remove('is-visible');
						expandparent.insertBefore(newButton, expandtarget);
						newButton.addEventListener('click', Filters.toggle, false);
					}
				}
			}
		}
	}

	// Debounced (delayed) callback of `init` function after resize!
	window.addEventListener('resize', debounce(init), false);

	/**
	 * Return public methods
	 */
	return {
		toggle: toggle,
		init: init
	};
})();
