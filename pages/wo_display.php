<?php
// --------------------------------------------------------------------
// wo_display.php -- Main Place to Display a Work Order  
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

if( $_SERVER["REQUEST_METHOD"] == "GET")
{
    goto GenerateHtml;
}

if( $_SERVER["REQUEST_METHOD"] == "POST")
{
    goto GenerateHtml;
}

GenerateHtml:
$stylesheet=array("../css/global.css", "../css/nav.css", "../css/wo_new.css");
include "forms/header.php";
include "forms/nav_form.php";
include "forms/wo_display_form.php";
include "forms/footer.php";

?>