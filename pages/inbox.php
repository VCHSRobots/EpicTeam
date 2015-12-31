<?php
// --------------------------------------------------------------------
// inbox.php -- 
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
include "forms/inbox_menubar.php";
echo '<div class="content_area">';
echo '<h2>In Box</h2>';
echo '<p>This page will show, for a given IPT, the work orders that have been directed
      to his/her team for work to be done.  From this page, the IPT lead can show all WOs that 
      belong to his/her team, or just ones that are not assigned, or ones that have been
      assigned for work.  Anybody can change the search params so that any combination is displayed.</p>

      <p>
      This page works by using a simplified version of the super sort.
      </p>';

echo '</div>';
include "forms/footer.php";

?>