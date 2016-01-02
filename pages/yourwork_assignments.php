<?php
// --------------------------------------------------------------------
// yourwork.php -- 
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
include "forms/yourwork_menubar.php";
echo '<div class="content_area">';
echo '<h2>Your Work</h2>';

$view = "simple";
$filters = array("StudentAssigned"=> getUserID(), "View" => $view, "Status" => "UnFinished");

$sql = CreateFilterSQL($filters);
$result = SqlQuery($loc, $sql);

include "forms/wo_sorting_list_data.php";

echo '<h2>Your Finished Work</h2>';

$view = "simple";
$filters = array("StudentAssigned"=> getUserID(), "View" => $view, "Status" => "Finished");

$sql = CreateFilterSQL($filters);
$result = SqlQuery($loc, $sql);

include "forms/wo_sorting_list_data.php";

echo '</div>';
include "forms/footer.php";

?>