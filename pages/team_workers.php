<?php
// --------------------------------------------------------------------
// team_workers.php -- Shows WO Assignemnts for entire team.
//
// Created: 01/04/16 DLB
// --------------------------------------------------------------------

require_once "../maindef.php";
$loc = rmabs(__FILE__);
$timer = new timer();
session_start();
log_page();
CheckLogin();

$pagetitle = "WO Assignments for Entire Team";

$pagecontent = "Not ready yet... ";

GenerateHTML:
$stylesheet=array("../css/global.css", "../css/nav.css", "../css/team.css");
include "forms/header.php";
include "forms/nav_form.php";
include "forms/team_menubar.php";
include "forms/null_form.php";
include "forms/footer.php";

?>