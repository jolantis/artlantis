/**
 * main.script.js
 *
 * Custom, additional scripts
 */

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
	svg4everybody();                                                            // Init svg external content support (e.g. for IE11)

});
