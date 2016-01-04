<?php
// --------------------------------------------------------------------
// inbox.php -- 
//
// Created: 12/31/15 
// --------------------------------------------------------------------

require_once "../maindef.php";
$loc = rmabs(__FILE__);

session_start();
log_page();
CheckLogin();
CheckAdmin();
/*
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

*/

$tableheader = "";
$tabledata = "";
$sql = "";

if( $_SERVER["REQUEST_METHOD"] == "GET")
{
		$IPT = getUserIPT(GetUserID());
		if(getUserIPT(GetUserID())==""){
			$IPT = "none";
		}

	if(!empty($_GET["Assigned"]))
	{
		$pagetitle = "Assigned Work Orders";
		$pagetext = "These are work orders for your team that you have already assigned to students.";
		$tabledata = array();

		$sql = 'Select WID, Revision, Title, Receiver, Approved, ApprovedByCap, Finished, Closed FROM WorkOrders WHERE Receiver = "' . $IPT . '" AND Assigned = 1';
		$result = SqlQuery($loc, $sql);
		if ($result->num_rows <= 0) 
		{
			$pagetext = "There are no work orders that you have already assigned.  When there are, they will be listed here.";
			goto GenerateHtml;
		}
	}

	if(!empty($_GET["Unassigned"]))
	{
		$pagetitle = "UnAssigned Work Orders";
		$pagetext = "These are work orders for your team that you have not assigned to a student yet.";
		$sql = 'Select WID, Revision, Title, Receiver, Approved, ApprovedByCap, Finished, Closed FROM WorkOrders WHERE Receiver = "' . $IPT . '" AND Assigned = 0';
		$result = SqlQuery($loc, $sql);
		if ($result->num_rows <= 0) 
		{
			$pagetext = "There are no work orders that you have not assigned.  When there are, they will be listed here.";
			goto GenerateHtml;
		}
	}
	if(!empty($_GET["Completed"]))
	{
		$pagetitle = "Completed Work Orders";
		$pagetext = "These are work orders that your team has completed.";
		$tabledata = array();

		$sql = 'Select WID, Revision, Title, Receiver, Approved, ApprovedByCap, Finished, Closed FROM WorkOrders WHERE Receiver = "' . $IPT . '" AND Finished = 1';
		$result = SqlQuery($loc, $sql);
		if ($result->num_rows <= 0) 
		{
			$pagetext = "There are no work orders that your team has completed.  When there are, they will be listed here.";
			goto GenerateHtml; 
		}
	}

	if(!empty($_GET["Opened"]))
	{
		$pagetitle = "Open Work Orders";
		$pagetext = "These are work orders for your team that are still open.";
		$sql = 'Select WID, Revision, Title, Receiver, Approved, ApprovedByCap, Finished, Closed FROM WorkOrders WHERE Receiver = "' . $IPT . '" AND Closed = 0';
		$result = SqlQuery($loc, $sql);
		if ($result->num_rows <= 0) 
		{
			$pagetext = "There are no open work orders for your team.  When there are, they will be listed here.";
			goto GenerateHtml;
		}
	}
	if(!empty($_GET["Closed"]))
	{
		$pagetitle = "Closed Work Orders";
		$pagetext = "These are work orders for your team that have already been closed.";
		$sql = 'Select WID, Revision, Title, Receiver, Approved, ApprovedByCap, Finished, Closed FROM WorkOrders WHERE Receiver = "' . $IPT . '" AND Closed = 1';
		$result = SqlQuery($loc, $sql);
		if ($result->num_rows <= 0) 
		{
			$pagetext = "There are no closed work orders for your team.  When there are, they will be listed here.";
			goto GenerateHtml;
		}
	}

	if($sql != ""){
		$tableheader = array("WO", "Title", "Receiving IPT ", "Approved" , "Cap Approved ", "Complted ", "Closed");
		$tabledata = array();
		while($row = $result->fetch_assoc()) {
			$wid = $row["WID"];
			$rev = $row["Revision"];
			$app = ($row["Approved"] || $row["ApprovedByCap"]);
			$woname = WIDStrHtml($wid, $rev, $app);
			unset($dd);
			$dd=array();
			$dd[] = '<a href="wo_display.php?wid=' . $row["WID"] . '">' . $woname . '</a>';
			$dd[] = $row["Title"];
			$dd[] = $row["Receiver"];
			if($app) $dd[] = "Yes";
			else $dd[] = "--";
			if($row["ApprovedByCap"]) $dd[] = "Yes";
			else $dd[] = "--";
			if($row["Finished"]) $dd[] = "Yes";
			else $dd[] = "--";
			if($row["Closed"]) $dd[] = "Yes";
			else $dd[] = "--";
			$tabledata[] = $dd;
		}
	goto GenerateHtml;
	}

	$pagetitle = "In Box";
	$pagetext = "<p>Here, you can manange the work that has been assigned to your team.</p>";
	$pagetext .= "<p>Use the links above to get started.";
	goto GenerateHtml;

    $data = GetUserInfo($userid);
    if($data === false) DieWithMsg($loc, 'User with ID=' . $userid . ' not found.');
    
    PopulateParamList($param_list, $data);
    goto GenerateHtml;
}

if( $_SERVER["REQUEST_METHOD"] == "POST")
{
}

GenerateHtml:


$stylesheet=array("../css/global.css", "../css/nav.css", "../css/yourwork.css");
include "forms/header.php";
include "forms/nav_form.php";
include "forms/inbox_menubar.php";
include "forms/yourwork_form.php";
include "forms/footer.php";

?>
?>