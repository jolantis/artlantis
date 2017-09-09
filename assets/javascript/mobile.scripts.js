/**
 * mobile.scripts.js
 *
 * Custom mobile specific scripts
 */

// Executed on DOM ready
domready(function () {

	// Invoke modules
	// Alerts.init(push_message);                                                  // Init alerts
	// Expand.init();                                                              // Init expand / collapse
	Filters.init();                                                             // Init filters
	FontObserverHandler.init();                                                 // Init font(face)observer
	// NavMain.init();                                                             // Init main navigation

	// Invoke plugins
	// gumshoe.init();                                                             // Init gumshoe (scrollspy)
	svg4everybody({nosvg: true,polyfill: true});                                // Init svg4everybody (e.g. for IE11)
	// smoothScroll.init();                                                        // Init smoothscroll

	// Run svg4everybody polyfill (e.g. for IE11)
	// svg4everybody({
	// 	nosvg: false,                                                           // Shiv <svg> and <use> elements and use image fallbacks
	// 	polyfill: true                                                          // Polyfill <use> elements for External Content
	// });

});
