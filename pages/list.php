<?php
// --------------------------------------------------------------------
// list.php -- Main page to list work orders in all their glory.
//
// Created: 12/31/15 
// --------------------------------------------------------------------

require_once "../maindef.php";
$loc = rmabs(__FILE__);

session_start();
log_page();
CheckLogin();


include "forms/header.php";
include "forms/nav_form.php";
echo '<div class="content_area">';
echo '<h2>Work Order Lists</h2>';
echo '<p>The place where you can make lists of work orders.</p>';
echo '</div>';
include "forms/footer.php";

?>