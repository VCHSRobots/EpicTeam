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


if(isset($_SESSION["ERROR"])) $error_msg = $_SESSION["ERROR"];
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
);


if( $_SERVER["REQUEST_METHOD"] == "GET")
{
    goto GenerateHtml;
}

GenerateHtml:
include "forms/header.php";
include "forms/nav_form.php";
include "forms/wo_sort_advanced_form.php";
echo '</div>';
include "forms/footer.php";

?>