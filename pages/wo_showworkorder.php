<?php
// --------------------------------------------------------------------
// wo_showworkorder.php -- Shows one work order.
//
// Created: 11/10/15 SS
// --------------------------------------------------------------------

require_once "../maindef.php";

session_start();
log_page();
CheckLogin();
CheckEditor();
$loc = 'wo_showworkorder.php';
$timer = new Timer();
$action = "";
$error_msg = "";
$success_msg = "";

if( $_SERVER["REQUEST_METHOD"] == "GET")
{
    if(empty($_GET["WorkOrderID"]))
    {
        DieWithMsg($loc, "Bad Page Invoke. No WorkOrderID given.");
    }

    $WorkOrderID = $_GET["WorkOrderID"];
    $_SESSION["WorkOrderID"] = $WorkOrderID;
    $data = GetWorkOrderInfo($WorkOrderID);
    if($data === false) DieWithMsg($loc, 'Work Order with ID=' . $WorkOrderID . ' not found.');
    $WorkOrderID  = $data["WorkOrderID"];
    $WorkOrderTitle = $data["WorkOrderTitle"];
    //$Description = $data["Description"];
    $DateRequested  = $data["DateRequested"];
    $DateNeeded  = $data["DateNeeded"];
    $DayEstimate = $data["DayEstimate"];
    $Revision = $data["Revision"];
    $Requestor  = $data["Requestor"];
    $RequestingIPTLeadApproval  = $data["RequestingIPTLeadApproval"];
    $AssignedIPTLeadApproval = $data["AssignedIPTLeadApproval"];
    $Project  = $data["Project"];
    $Priority  = $data["Priority"];
    $RequestingIPTGroup = $data["RequestingIPTGroup"];
    $ReceivingIPTGroup  = $data["ReceivingIPTGroup"];
    $ProjectOfficeApproval  = $data["ProjectOfficeApproval"];
    $ReviewedBy = $data["ReviewedBy"];
    $AssignedTo = $data["AssignedTo"];
    $Completed = $data["Completed"];
    $CompletedOn  = $data["CompletedOn"];
	
	$data = GetWorkOrderTasksInfo($WorkOrderID);
    if($data === false) DieWithMsg($loc, 'Work Order Task with ID=' . $WorkOrderID . ' not found.');
    $TaskID  = $data["TaskID"];
    $Quantity = $data["Quantity"];
    $Description = $data["Description"];
    $UnitPrice  = $data["UnitPrice"];
	
	$data = GetWorkOrderPrereqInfo($WorkOrderID);
    if($data === false) DieWithMsg($loc, 'Work Order Prerequisite for ID=' . $WorkOrderID . ' not found.');
    $PrereqID  = $data["PrereqID"];
    $PrevWorkOrderID = $data["PrevWorkOrderID"];

}

GenerateHtml:
include "forms/header.php";
include "forms/nav_form.php";
include "forms/wo_menubar.php";
include "forms/wo_showworkorder_form.php";
include "forms/footer.php";

?>
