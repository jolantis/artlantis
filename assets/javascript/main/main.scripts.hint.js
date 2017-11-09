/**
 * For JSHint only!
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
			var button       = expandtarget.parentNode.getElementsByTagName('button')[0];
			var lastItem     = expandtarget.lastElementChild;

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
var FontObserverHandler = (function () {

	function init(){

		// If the class `fonts-loaded` is already set, we're good
		if(document.documentElement.className.indexOf('fonts-loaded') > -1 ) {
			return;
		}

		// Define the fonts and font variants to observed
		var fontObservers = [];
		var fontFamilies = {
			'Kawak': [
				{
					weight: 300,
				},
				{
					weight: 700
				},
			],
			// 'Another Font': [
			// 	{
			// 		weight: 400,
			// 		font-variant: small-caps;
			// 	},
			// 	{
			// 		weight: 700
			// 	},
			// ],
		};

		// Init the observer on the defined font settings
		Object.keys(fontFamilies).forEach(function(family) {
			fontObservers.push(fontFamilies[family].map(function(config) {
				return new FontFaceObserver(family, config).load();
			}));
		});

		// Set the `fonts-loaded` class and avoid re-downloading the web fonts
		// over and over again (and do not run the fontobserver script when the
		// font is already available from cache) by setting a cookie
		Promise
			.all(fontObservers)
			.then(function() {
				// document.documentElement.classList.add('fonts-loaded');
				document.documentElement.className += ' fonts-loaded';
				enhance.cookie('fonts-loaded', 'true', 7);
				// cookie.set('fonts-loaded', 'true', 7);
			}, function() {
				console.info('Web fonts could not be loaded in time. Falling back to system fonts.');
			});

	}

	/**
	 * Return public methods
	 */
	return {
		init: init
	};
})();
// Executed on DOM ready
domready(function () {

	// Invoke modules
	// Alerts.init(push_message);                                                  // Init alerts
	// Expand.init();                                                              // Init expand / collapse
	Filters.init();                                                             // Init filters
	FontObserverHandler.init();                                                 // Init font(face)observer
	// NavMain.init();                                                             // Init main navigation
	// Popup.init();                                                               // Init popup

	// Invoke plugins
	// gumshoe.init();                                                             // Init gumshoe (scrollspy)
	// smoothScroll.init();                                                        // Init smoothscroll

	// Run svg4everybody polyfill (e.g. for IE11)
	svg4everybody({
		nosvg: false,                                                           // Shiv <svg> and <use> elements and use image fallbacks
		polyfill: true                                                          // Polyfill <use> elements for external content
	});

});
