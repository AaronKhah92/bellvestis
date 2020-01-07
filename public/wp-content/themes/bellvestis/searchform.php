<?php

?>


<form id="searchform" role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
  <label>
    <span class="screen-reader-text">Search for:</span>
    <input type="search" class="search-field" placeholder="Search …" value="" name="s">
  </label>
  <input type="submit" class="search-submit" value="Search">
  <input type="hidden" name="lang" value="en"></form>