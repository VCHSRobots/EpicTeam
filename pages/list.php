
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

	if(isset($_SESSION["ShowListParams"]))
	{
	    if($_SESSION["FilterType"] == "Advanced"){
		    $title = $_SESSION["ShowListParams"]["Title"];
		    $requestor = $_SESSION["ShowListParams"]["RequestingTeam"];
		    $author = $_SESSION["ShowListParams"]["Author"];
		    $project = $_SESSION["ShowListParams"]["Project"];
		    $author = $_SESSION["ShowListParams"]["Author"];
		    $studentAssigned = $_SESSION["ShowListParams"]["StudentAssigned"];
		    $createdStart = $_SESSION["ShowListParams"]["DateCreatedStart"];
		    $createdEnd = $_SESSION["ShowListParams"]["DateCreatedEnd"];
		    $needByStart = $_SESSION["ShowListParams"]["DateNeededStart"];
		    $needByEnd = $_SESSION["ShowListParams"]["DateNeededEnd"];
		    $approved = $_SESSION["ShowListParams"]["Approved"];
		    $approvedByCap = $_SESSION["ShowListParams"]["ApprovedByCap"];
		    $assigned = $_SESSION["ShowListParams"]["Assigned"];
		    $finished = $_SESSION["ShowListParams"]["Finished"];
		    $closed = $_SESSION["ShowListParams"]["Closed"];
		    $active = $_SESSION["ShowListParams"]["Active"];
	    }
	    else{

	    }
 	    $view  = $_SESSION["ShowListParams"]["View"];
	    $priority   = $_SESSION["ShowListParams"]["Priority"];
	   // $status  = $_SESSION["ShowListParams"]["Status"];
	    $receiver = $_SESSION["ShowListParams"]["ReceivingTeam"];

	}


if( $_SERVER["REQUEST_METHOD"] == "POST") 
{
    if(isset($_POST["AdvFilter"])) JumpToPage("pages/wo_sort_advanced.php");
    else if(isset($_POST["Filter"]))
	{
        $title = $_POST["Title"];
        $author= $_POST["Author"];
        $studentAssigned = $_POST["StudentAssigned"];
        $createdStart = $_POST["DateCreatedStart"];
        $createdEnd = $_POST["DateCreatedEnd"];
        $needByStart = $_POST["DateNeedByStart"];
        $needByEnd = $_POST["DateNeedByEnd"];
        $requestor = $_POST["RequestingTeam"];
        $project = $_POST["Project"];
        $approved = $_POST["Approved"];
        $approvedByCap = $_POST["ApprovedByCap"];
        $assigned = $_POST["Assigned"];
        $finished = $_POST["Finished"];
        $closed = $_POST["Closed"];
        $active = $_POST["Active"];

        $_SESSION["FilterType"] = "Advanced";

    }
 

    $view   = $_POST["View"];
    $priority  = $_POST["Priority"];
    //$status = $_POST["Status"];
    $receiver = $_POST["ReceivingTeam"];


	$filters = array("Title" => $title, "Author" => $author, "StudentAssigned"=> $studentAssigned,
	 "DateCreatedStart"=>$createdStart,"DateCreatedEnd"=>$createdEnd, "DateNeededStart"=>$needByStart,"DateNeededEnd"=>$needByEnd,
	  "RequestingTeam"=>$requestor, "View" => $view, "Priority" => $priority, /*"Status" => $status,*/
	     "ReceivingTeam" => $receiver, "Project" => $project,
	     "Approved"=>$approved,"ApprovedByCap"=>$approvedByCap, "Assigned"=>$assigned,"Finished"=>$finished, "Closed"=>$closed,"Active"=>$active,);
	$_SESSION["ShowListParams"] = $filters;
}


if( $_SERVER["REQUEST_METHOD"] == "GET")
{
}


// Store settings away, so not lost if user leaves the page...


$filters = array("Title" => $title, "Author" => $author, "StudentAssigned"=> $studentAssigned,
 "DateCreatedStart"=>$createdStart,"DateCreatedEnd"=>$createdEnd, "DateNeededStart"=>$needByStart,"DateNeededEnd"=>$needByEnd,
  "RequestingTeam"=>$requestor, "View" => $view, "Priority" => $priority, /*"Status" => $status,*/
     "ReceivingTeam" => $receiver, "Project" => $project);



$sql = CreateFilterSQL($filters);
$result = SqlQuery($loc, $sql);
//print $sql;

GenerateHtml:
include "forms/header.php";
include "forms/nav_form.php";
include "forms/wo_sorting_list_form.php";
include "forms/wo_sorting_list_data.php";
echo '</div>';
include "forms/footer.php";

?>