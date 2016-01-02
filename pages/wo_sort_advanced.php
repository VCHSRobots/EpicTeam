<?php
// --------------------------------------------------------------------
// wo_sort_advanced.php -- page to filter results more specifically
// Created: 1/1/16 SS
// --------------------------------------------------------------------

require_once "../maindef.php";
session_start();
//log_page();
CheckLogin();
CheckAdmin();
$timer = new timer();
$loc = 'wo_sort_advanced.php';
$error_msg = "";
/*
if(isset($_SESSION["ShowListParams"]))
{
    $view      = $_SESSION["ShowListParams"]["View"];
    $priority   = $_SESSION["ShowListParams"]["Priority"];
    $status  = $_SESSION["ShowListParams"]["Status"];
    $iptgroup = $_SESSION["ShowListParams"]["IPTGroup"];
    $project = $_SESSION["ShowListParams"]["Project"];
}
else{
    $view = "simple";
}

if( $_SERVER["REQUEST_METHOD"] == "POST") 
{
    $view   = isset($_POST["View"]);
    $priority  = isset($_POST["Priority"]);
    $status = isset($_POST["Status"]);
    $iptgroup = isset($_POST["IPT"]);
    $project = intval($_POST["Project"]);
}
*/
$View = array("Simple", "Full");
$Priority = array("");
$Priority = array_merge($Priority, $WOPriorities);
$Status = array("", "Unapproved", "Approved", "Unassigned", "Assigned", "ApprovedByCap", "Finished", "Closed", "Active");
$param_list = array(
array("FieldName" => "Title",           "FieldType" => "Text",      "Value" => "",              "Style" => "width: 500px;"),
array("FieldName" => "View",            "FieldType" => "Selection", "Selection" => $View,       "Style" => "width: 120px;"),
array("FieldName" => "Priority",        "FieldType" => "Selection", "Selection" => $Priority,   "Style" => "width: 120px;"),
array("FieldName" => "RequestingTeam",  "FieldType" => "Selection", "Selection" => $WOIPTeams,  "Style" => "width: 200px;"),
array("FieldName" => "ReceivingTeam",   "FieldType" => "Selection", "Selection" => $WOIPTeams,  "Style" => "width: 200px;"),
array("FieldName" => "Project",         "FieldType" => "Selection", "Selection" => $WOProjects, "Style" => "width: 200px;"),
array("FieldName" => "Status",          "FieldType" => "Selection", "Selection" => $Status,     "Style" => "width: 200px;"),
);


if( $_SERVER["REQUEST_METHOD"] == "GET")
{
    goto GenerateHtml;
}

/*
// Store settings away, so not lost if user leaves the page...
$t = array("View" => $view, "Priority" => $priority, "Status" => $status,
     "IPTGroup" => $iptgroup, "Project" => $project);
$_SESSION["ShowListParams"] = $t;

unset($output_lines);

if($data === false) { $error_msg = "Invalid date."; }
else if(empty($data)) { $error_msg = "Log file not found."; }
else
{
    $output_lines = FilterListData($view, $priority, $iptgroup, $status, $project);
}

$output_lines = ReverseLogLines($output_lines);

*/
GenerateHtml:
include "forms/header.php";
include "forms/nav_form.php";
include "forms/wo_sort_advanced_form.php";
echo '</div>';
include "forms/footer.php";

?>