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
$dofrom = false;
$wid=0;

if( $_SERVER["REQUEST_METHOD"] == "GET")
{
    if(empty($_GET["wid"])) DieWithMsg($loc, "No WID given.");
    $wid = $_GET["wid"];
    $wo = GetWO($wid);
    $pagetabtitle = "Epic " . $wo["WIDStr"];
    $workers = array("Dalbert Brandon", "Sarah Shibley", "Bob McQuire");
    $currentworkers = array("Gail Dubell", "Steve Dugan", "Cindy Smith");
    $doform = true;
    goto GenerateHtml;
}

if( $_SERVER["REQUEST_METHOD"] == "POST")
{
	dumpit($_POST);
	if(empty($_POST["wid"])) DieWithMsg($loc, "No WID in POST.");
	$wid = intval($_POST["wid"]);
    $wo = GetWO($wid);
    $userinfo = GetUserInfo($userid);
    $name = $userinfo["FirstName"] . ' ' . $userinfo["LastName"];
    $doform = true;
    goto GenerateHtml;
}

GenerateHtml:
$stylesheet=array("../css/global.css", "../css/nav.css", "../css/wo_head.css", "../css/wo_assign_workers.css");
include "forms/header.php";
include "forms/nav_form.php";
include "forms/wo_display_menubar.php";
include "forms/wo_assign_workers_form.php";  
include "forms/footer.php"; 

?>