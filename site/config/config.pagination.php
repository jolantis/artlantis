<?php

/* -----------------------------------------------------------------------------
Pagination
--------------------------------------------------------------------------------

 The number of items on a `target` page. To have all items listed
 on one page (e.g. no pagination) set varaible to `false`.
 The `target` must be the (intended) name of the template.

 Examples:
 1) c::set('pagination.blog', 10);
 2) c::set('pagination.list', false);
 3) c::set('pagination.news', 20);

 */

c::set('pagination.blog', 4);

/* -----------------------------------------------------------------------------
Category (filtered archive) pagination
--------------------------------------------------------------------------------

Enable (or disable) filtered archive (by category) pagination.

*/

c::set('pagination.category', false);
