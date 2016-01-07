<?php
// --------------------------------------------------------------------
// yourwork.php -- Page where anyone can see the work that has been
//		assigned to them
//
// Created: 12/31/15 DLB
// Updated: 01/04/15 SS - filled in YourWork tables and pages
// --------------------------------------------------------------------

require_once "../maindef.php";
$loc = rmabs(__FILE__);

session_start();
log_page();
CheckLogin();
$userid = GetUserID();
$userinfo = GetUserInfo($userid);
$username = MakeFullName($userinfo);
$tableheader = "";
$tabledata = "";

$sql = "";


if( $_SERVER["REQUEST_METHOD"] == "GET")
{

	if(!empty($_GET["Assignments"]))
	{
		$pagetitle = "Your Work Assignments";
		$pagetext = "These are work orders that IPT Leads have assigned for you to do.";
		$sql = 'Select * from AssignmentsView WHERE UserID=' . intval($userid);
		$sql .= ' AND Finished=0 AND Closed=0';
		$result = SqlQuery($loc, $sql);
		if ($result->num_rows <= 0) 
		{
			$pagetext = "Ther are no work orders currently assigned to you.  When there are, they will be listed here.";
			goto GenerateHtml;
		}
	}
	if(!empty($_GET["OldAssignments"]))
	{
		$pagetitle = "Past Assignments";
		$pagetext = "These are past work assignments that you have completed.";
		$sql = 'Select * FROM AssignmentsView WHERE UserID = ' . intval($userid) . ' AND Finished = 1';
		$result = SqlQuery($loc, $sql);
		if ($result->num_rows <= 0) 
		{
			$pagetext = "You haven't finished any work orders.  When you do, they will be listed here.";
			goto GenerateHtml;
		}
	}

	if(!empty($_GET["MySubmit"]))
	{
		$pagetitle = "Work Orders You Submitted";
		$pagetext = "These are work orders that you have created.";
		$sql = 'Select * FROM WorkOrders WHERE AuthorID = ' . intval($userid);
		$result = SqlQuery($loc, $sql);
		if ($result->num_rows <= 0) 
		{
			$pagetext = "You haven't submitted any work orders.  When you do, they will be listed here.";
			goto GenerateHtml;
		}
	}
	if($sql != ""){
		if(!empty($_GET["Assignments"]))$tableheader = 	array("WO", "Title", "Date Needed", "CAP", "AP");
		else 							$tableheader = 	array("WO", "Title", "Date Needed", "CAP", "AP", "AS","F", "C");
		$tabledata = array();
		while($row = $result->fetch_assoc()) {
			$wid = $row["WID"];
			$rev = $row["Revision"];
			$app = ($row["Approved"] || $row["ApprovedByCap"]);
			$woname = WIDStrHtml($wid, $rev, $app);
			unset($dd);
			$dd=array();
			$dd[] = '<a href="wo_display.php?wid=' . $row["WID"] . '">' . $woname . '</a>';
			$dd[] = LimitSize($row["Title"], 24);
			$dd[] = $row["DateNeedBy"];
			if($row["ApprovedByCap"]) $dd[] = "X";
			else $dd[] = "--";
			if($app) $dd[] = "X";
			else $dd[] = "--";
			if(empty($_GET["Assignments"]))
			{	
				if($row["Assigned"]) $dd[] = "X";
				else $dd[] = "--";
				if($row["Finished"]) $dd[] = "X";
				else $dd[] = "--";
				if($row["Closed"]) $dd[] = "X";
				else $dd[] = "--";
			}
		$tabledata[] = $dd;
		}
	goto GenerateHtml;
	}


	$pagetitle = "Your Work";
	$pagetext = "<p>Here, you can manange the work that has been assigned to you.</p>";
	$pagetext .= "<p>You can also track the work orders that you have created.</p>";
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
$stylesheet=array("../css/global.css", "../css/nav.css", "../css/yourwork.css", "../css/statuskey.css");
include "forms/header.php";
include "forms/nav_form.php";
include "forms/yourwork_menubar.php";
include "forms/yourwork_form.php";
include "forms/footer.php";

?>