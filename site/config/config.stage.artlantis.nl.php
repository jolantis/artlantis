<?php

/* -----------------------------------------------------------------------------
Direct access protection
--------------------------------------------------------------------------------

*/

if(!defined('KIRBY')) die('Direct access is not allowed');


/* -----------------------------------------------------------------------------
Environment
--------------------------------------------------------------------------------

Add server-specific settings to this file that are needed for the environment
this Kirby instance is running on (e.g. local, staging or production).

*/

c::set('environment', 'stage');


/* -----------------------------------------------------------------------------
Troubleshooting
--------------------------------------------------------------------------------

*/

c::set('troubleshoot', false);


/* -----------------------------------------------------------------------------
Debug
--------------------------------------------------------------------------------

*/

c::set('debug', true);
c::set('whoops', true);



/* -----------------------------------------------------------------------------
URL
--------------------------------------------------------------------------------

*/

c::set('url', 'https://stage.artlantis.nl');
c::set('ssl', true);


/* -----------------------------------------------------------------------------
Timezone
--------------------------------------------------------------------------------

*/

c::set('timezone', 'UTC');


/* -----------------------------------------------------------------------------
Home folder
--------------------------------------------------------------------------------

*/

c::set('home', 'home');


/* -----------------------------------------------------------------------------
Cache
--------------------------------------------------------------------------------

*/

c::set('cache', false);
c::set('cache.driver', 'memcached');
c::set('cache.options', array('prefix' => 'artlantis_stage_'));

/* -----------------------------------------------------------------------------
Fingerprint (assets files)
--------------------------------------------------------------------------------

*/

c::set('fingerprint', true);


/* -----------------------------------------------------------------------------
Analytics, tracking, site stats
--------------------------------------------------------------------------------

*/

c::set('google.analytics', false);
