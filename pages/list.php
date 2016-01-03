
<?php
// --------------------------------------------------------------------
// list.php -- Main page to list work orders in all their glory.
//
// Created: 12/31/15 SS
// --------------------------------------------------------------------

require_once "../maindef.php";
session_start();
log_page();
CheckLogin();
$timer = new timer();
$loc = rmabs(__FILE__);
$error_msg = "";

if( $_SERVER["REQUEST_METHOD"] == "POST") 
{
	/*AdvFilter redirects to form where user can select more specific filter criteria*/
    if(isset($_POST["AdvFilter"])) JumpToPage("pages/wo_sort_advanced.php");

    /* Filter POST comes from the wo_sort_advanced_form.php */
    else if(isset($_POST["Filter"]))
	{
		/*store input in variables*/
        $title = 			$_POST["Title"];
        $author= 			$_POST["Author"];
        $studentAssigned = 	$_POST["StudentAssigned"];
        $createdStart = 	$_POST["DateCreatedStart"];
        $createdEnd = 		$_POST["DateCreatedEnd"];
        $needByStart = 		$_POST["DateNeedByStart"];
        $needByEnd = 		$_POST["DateNeedByEnd"];
        $requestor = 		$_POST["RequestingTeam"];
        $project = 			$_POST["Project"];
        $approved = 		$_POST["Approved"];
        $approvedByCap = 	$_POST["ApprovedByCap"];
        $assigned = 		$_POST["Assigned"];
        $finished = 		$_POST["Finished"];
        $closed = 			$_POST["Closed"];
        $active = 			$_POST["Active"];
        $filterType = "Advanced";
        if($needByStart > $needByEnd){
        	$error_msg = "Invalid Need By Date. Need By End must be after Need By Start.";
        	$_SESSION["ERROR"] = $error_msg;
        	JumpToPage("pages/wo_sort_advanced.php");
        }
        else if($createdStart > $createdEnd){
        	$error_msg = "Invalid DateCreated. Created End must be after Created Start.";
        	$_SESSION["ERROR"] = $error_msg;
        	JumpToPage("pages/wo_sort_advanced.php");
        }
        else unset($_SESSION["ERROR"]);
    }
    /*post came from wo_sorting_list_form.php*/
	else{
		/*initialize variables to empty*/
		$title = $requestor = $author = $project = $author = $studentAssigned = $createdStart = 
			$createdEnd = $needByStart = $needByEnd = $approved = $approvedByCap = $assigned = $finished =
		    $closed = $active = $view = $priority = $receiver = $filterType = "";
		$filterType = "Simple";
	}
	/*the fields below are set in both the Advanced and Simple forms */
    $view   = 				$_POST["View"];
    $priority  = 			$_POST["Priority"];
    $receiver = 			$_POST["ReceivingTeam"];

    /*put all form input into array indexed by Field - this will then be stored in the SESSION*/
	$filters = array("Title" => $title, "Author" => $author, "StudentAssigned"=> $studentAssigned,
		"DateCreatedStart"=>$createdStart,"DateCreatedEnd"=>$createdEnd, "DateNeededStart"=>$needByStart,
		"DateNeededEnd"=>$needByEnd,"RequestingTeam"=>$requestor, "View" => $view, "Priority" => $priority,
		"ReceivingTeam" => $receiver, "Project" => $project,"Approved" => $approved,"Active"=> $active,
		"Assigned" => $assigned,"Finished" => $finished,"Closed"=>$closed, "ApprovedByCap"=> $approvedByCap);

	/*store input in SESSION so it can still be accessed if user leaves the page */
	$_SESSION["ShowListParams"] = $filters;
	/*store filter type in session so it knows what to filter by if user leaves page and comes back */
	$_SESSION["FilterType"] = $filterType;
	goto GenerateHtml;

}


if( $_SERVER["REQUEST_METHOD"] == "GET")
{
	/*initialize variables to empty*/
	$title = $requestor = $author = $project = $author = $studentAssigned = $createdStart = 
		$createdEnd = $needByStart = $needByEnd = $approved = $approvedByCap = $assigned = 
	    $finished = $closed = $active = $view = $priority = $receiver = $filterType = "";

	/*place form data into array to be passed to CreateFilterSQL()*/
	$filters = array("Title" => $title, "Author" => $author, "StudentAssigned"=> $studentAssigned,
		"DateCreatedStart"=>$createdStart,"DateCreatedEnd"=>$createdEnd, "DateNeededStart"=>$needByStart,
		"DateNeededEnd"=>$needByEnd,"RequestingTeam"=>$requestor, "View" => $view, "Priority" => $priority,
		"ReceivingTeam" => $receiver, "Project" => $project,"Approved"=>$approved,"Active"=>$active,
		"ApprovedByCap"=>$approvedByCap, "Assigned"=>$assigned,"Finished"=>$finished, "Closed"=>$closed);

}


GenerateHtml:
$sql = CreateFilterSQL($filters);	/* lib function that returns filtering SQL Query */
//print $sql; /*used for testing*/
$result = SqlQuery($loc, $sql);

if($view == "full"){
    $tableheader = array("WO", "Title", "Receiving IPT", "Aprvd?", "Assigned?",  "Fin?", "Active?", "Closed?");
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
        if($row["Assigned"]) $dd[] = "Yes";
        else $dd[] = "--";
            if($row["Finished"]) $dd[] = "Yes";
        else $dd[] = "--";
            if($app) $dd[] = "Yes";
        else $dd[] = "--";
        if($row["Closed"]) $dd[] = "Yes";
        else $dd[] = "--";
        if($row["Active"]) $dd[] = "Yes";
        else $dd[] = "--";
        $tabledata[] = $dd;
        $pagetitle = "";
        $pagetext = "";

    }
}
else{
     $tableheader = array("WO", "Title", "Receiving IPT", "Requesting IPT");
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
        $dd[] = $row["Requestor"];
        $tabledata[] = $dd;
        $pagetitle = "";
        $pagetext = "";
    }

}

include "forms/header.php";
include "forms/nav_form.php";
include "forms/wo_sorting_list_form.php";
//include "forms/wo_sorting_list_data.php";
include "forms/yourwork_form.php";

echo '</div>';
include "forms/footer.php";

?>