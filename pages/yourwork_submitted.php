<?php
// --------------------------------------------------------------------
// yoursubmitted.php -- 
//
// Created: 1/2/15 SS
// --------------------------------------------------------------------

require_once "../maindef.php";
$loc = rmabs(__FILE__);

session_start();
log_page();
CheckLogin();

include "forms/header.php";
include "forms/nav_form.php";
include "forms/yourwork_menubar.php";
echo '<div class="content_area">';
echo '<h2>Your Submitted Orders In Progress</h2>';

$view = "simple";
$filters = array("Author"=> getUserID(), "View" => $view);

$sql = CreateFilterSQL($filters);
$result = SqlQuery($loc, $sql);

include "forms/wo_sorting_list_data.php";

echo '<h2>Your Submitted Orders Which have been closed</h2>';

$view = "simple";
$filters = array("StudentAssigned"=> getUserID(), "View" => $view, "Status" => "Closed");

$sql = CreateFilterSQL($filters);
$result = SqlQuery($loc, $sql);

include "forms/wo_sorting_list_data.php";

echo "</div>";
include "forms/footer.php";

?>