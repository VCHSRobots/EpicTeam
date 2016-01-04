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
$userid = GetUserID();
$tableheader = "";
$tabledata = "";

if( $_SERVER["REQUEST_METHOD"] == "GET")
{

	if(!empty($_GET["Assignments"]))
	{
		$pagetitle = "Your Work Assignments";
		$pagetext = "These are work orders that IPT Leads have assigned for you to do.";
		$tableheader = array("WO", "Title", "Receiving IPT", "Approved?", "Finished?");
		$tabledata = array();
		$sql = 'Select WID, Revision, Title, Receiver, Approved, Finished FROM AssignmentsView WHERE UserID = ' . intval($userid);
		$result = SqlQuery($loc, $sql);
		if ($result->num_rows <= 0) 
		{
			$pagetext = "Ther are no work orders currently assigned to you.  When there are, they will be listed here.";
			goto GenerateHtml;
		}

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
    		if($row["Finished"]) $dd[] = "Yes";
    		else $dd[] = "--";
    		$tabledata[] = $dd;
    	}
		goto GenerateHtml;
	}

	if(!empty($_GET["MySubmit"]))
	{
		$pagetitle = "Work Orders You Submitted";
		$pagetext = "These are work orders that you have created.";
		$sql = 'Select WID, Revision, Title, Receiver, Approved, ApprovedByCap, Finished FROM WorkOrders WHERE AuthorID = ' . intval($userid);
		$result = SqlQuery($loc, $sql);
		if ($result->num_rows <= 0) 
		{
			$pagetext = "You haven't submitted any work orders.  When you do, they will be listed here.";
			goto GenerateHtml;
		}
		$tableheader = array("WO", "Title", "Receiving IPT", "Aprvd?", "Fin?");
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
    		if($row["Finished"]) $dd[] = "Yes";
    		else $dd[] = "--";
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
$stylesheet=array("../css/global.css", "../css/nav.css", "../css/yourwork.css");
include "forms/header.php";
include "forms/nav_form.php";
include "forms/yourwork_menubar.php";
include "forms/yourwork_form.php";
include "forms/footer.php";

?>