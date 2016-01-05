<?php
// --------------------------------------------------------------------
// inbox.php -- page where IPTLeads can see all work for their teams
//
// Created: 12/31/15 DLB
// Updated: 1/4/16 SS -- filled in Inbox pages
// --------------------------------------------------------------------

require_once "../maindef.php";
$loc = rmabs(__FILE__);

session_start();
log_page();
CheckLogin();
CheckAdmin();


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
		$pagetitle = "Assigned Work Orders (" . $IPT . ") ";
		$pagetext = "These are work orders for your team that you have already assigned to students.";
		$tabledata = array();

		$sql = 'Select * FROM WorkOrders WHERE Receiver = "' . $IPT . '" AND Assigned = 1 AND Closed = 0';
		$result = SqlQuery($loc, $sql);
		if ($result->num_rows <= 0) 
		{
			$pagetext = "There are no work orders that you have already assigned.  When there are, they will be listed here.";
			goto GenerateHtml;
		}
	}

	if(!empty($_GET["Unassigned"]))
	{
		$pagetitle = "UnAssigned Work Orders (" . $IPT . ") ";
		$pagetext = "These are work orders for your team that you have not assigned to a student yet.";
		$sql = 'Select * FROM WorkOrders WHERE Receiver = "' . $IPT . '" AND Assigned = 0 AND Closed = 0';
		$result = SqlQuery($loc, $sql);
		if ($result->num_rows <= 0) 
		{
			$pagetext = "There are no work orders that you have not assigned.  When there are, they will be listed here.";
			goto GenerateHtml;
		}
	}
	if(!empty($_GET["Completed"]))
	{
		$pagetitle = "Completed Work Orders (" . $IPT . ") ";
		$pagetext = "These are work orders that your team has completed.";
		$tabledata = array();

		$sql = 'Select WID, Revision, Title, Receiver, Approved, Assigned, ApprovedByCap, Finished, Closed FROM WorkOrders WHERE Receiver = "' . $IPT . '" AND Finished = 1 AND Closed = 0';
		$result = SqlQuery($loc, $sql);
		if ($result->num_rows <= 0) 
		{
			$pagetext = "There are no work orders that your team has completed.  When there are, they will be listed here.";
			goto GenerateHtml; 
		}
	}

	if(!empty($_GET["Opened"]))
	{
		$pagetitle = "Open Work Orders (" . $IPT . ")" ;
		$pagetext = "These are work orders for your team that are still open.";
		$sql = 'Select * FROM WorkOrders WHERE Receiver = "' . $IPT . '" AND Closed = 0';
		$result = SqlQuery($loc, $sql);
		if ($result->num_rows <= 0) 
		{
			$pagetext = "There are no open work orders for your team.  When there are, they will be listed here.";
			goto GenerateHtml;
		}
	}
	if(!empty($_GET["Closed"]))
	{
		$pagetitle = "Closed Work Orders (" . $IPT . ") ";
		$pagetext = "These are work orders for your team that have already been closed.";
		$sql = 'Select * FROM WorkOrders WHERE Receiver = "' . $IPT . '" AND Closed = 1';
		$result = SqlQuery($loc, $sql);
		if ($result->num_rows <= 0) 
		{
			$pagetext = "There are no closed work orders for your team.  When there are, they will be listed here.";
			goto GenerateHtml;
		}
	}

	if($sql != ""){
		if(empty($_GET["Closed"]))	$tableheader = array("WO", "Title", "Date Needed", "CAP", "AP", "AS" , "F ");
		else $tableheader = array("WO", "Title", "Date Needed", "CAP", "AP", "AS" , "F ", "C");
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
			$dd[] = $row["DateNeedBy"];
			if($row["ApprovedByCap"]) $dd[] = "X";
			else $dd[] = "--";
			if($app) $dd[] = "X";
			else $dd[] = "--";
			if($row["Assigned"]) $dd[] = "X";
			else $dd[] = "--";
			if($row["Finished"]) $dd[] = "X";
			else $dd[] = "--";
			if(!empty($_GET["Closed"]))
			{			
				if($row["Closed"]) $dd[] = "X";
				else $dd[] = "--";
			}
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


$stylesheet=array("../css/global.css", "../css/nav.css", "../css/inbox.css", "../css/statuskey.css");
include "forms/header.php";
include "forms/nav_form.php";
include "forms/inbox_menubar.php";
include "forms/inbox_form.php";
include "forms/footer.php";

?>
