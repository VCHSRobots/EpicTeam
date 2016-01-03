<?php
// --------------------------------------------------------------------
// wo_assign_workers.php -- Assign a worker to a work order.
//
// Created: 01/02/16 DLB
// --------------------------------------------------------------------

require_once "../maindef.php";
$loc = rmabs(__FILE__);

session_start();
log_page();
CheckLogin();

$timer = new timer();
$error_msg = "";
$success_msg = "";
$userid = GetUserID();
$username = GetUserName();
$userIPT  = GetUserIPT($userid);
$pagetitle = "Assign Workers"; 
$wid="";

if( $_SERVER["REQUEST_METHOD"] == "GET")
{
    if(empty($_GET["wid"])) DieWithMsg($loc, "No WID given.");
    $wid = $_GET["wid"];
    $wo = GetWO($wid);
    $pagetabtitle = "Epic " . $wo["WIDStr"];
    goto GenerateHtml;
}

if( $_SERVER["REQUEST_METHOD"] == "POST")
{
    goto GenerateHtml;
}

GenerateHtml:
$stylesheet=array("../css/global.css", "../css/nav.css", "../css/wo_display.css");
include "forms/header.php";
include "forms/nav_form.php";
include "forms/wo_display_menubar.php";
include "forms/null_form.php";                // !!! Change this when feature is ready.
include "forms/footer.php"; 

?>