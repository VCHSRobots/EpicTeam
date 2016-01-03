<?php
// --------------------------------------------------------------------
// inbox_completed.php -- 
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
include "forms/inbox_menubar.php";
echo '<div class="content_area">';
echo '<h2>Your Assigned Orders</h2>';
$IPT = getUserIPT(GetUserID());
if(getUserIPT(GetUserID())==""){
	$IPT = "none";
}
$view = "simple";
$filters = array("ReceivingTeam"=> $IPT, "View" => $view, "Finished"=> 1, "Closed" => 0);

$sql = CreateFilterSQL($filters);
$result = SqlQuery($loc, $sql);

include "forms/wo_sorting_list_data.php";

echo "</div>";
include "forms/footer.php";

?>