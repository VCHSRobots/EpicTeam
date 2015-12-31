<?php
// --------------------------------------------------------------------
// yourwork.php -- 
//
// Created: 12/31/15 
// --------------------------------------------------------------------

require_once "../maindef.php";

session_start();
log_page();
CheckLogin();
CheckAdmin();
$loc = rmabs(__FILE__);

include "forms/header.php";
include "forms/nav_form.php";
include "forms/yourwork_menubar.php";
echo '<div class="content_area">';
echo '<h2>Your Work</h2>';
echo '<p>This page will show, for the person logged in, the work orders that are assigned to
      him/her to do.  

      As an option, it will also list WOs that have been submitted (created) by the person who is logged in.</p>

      <p>
      This page works by directly sorting with simplifed parameters, and using a lib routine to list resutls.
      </p>';

echo '</div>';
include "forms/footer.php";

?>