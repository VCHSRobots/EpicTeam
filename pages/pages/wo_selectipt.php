<?php
// --------------------------------------------------------------------
// workorder_selectipt.php -- 
//
// Created: ??
// --------------------------------------------------------------------

require_once "../maindef.php";

session_start();
log_page();
CheckLogin();
CheckAdmin();
$timer = new timer();
$loc = 'wo_selectipt.php';
$error_msg = "";
$success_msg = "";

if( $_SERVER["REQUEST_METHOD"] == "POST")
{
	if(!empty($_POST["RequestingIPTGroup"]) ) { $IPTGroup = $_POST["RequestingIPTGroup"];}

        JumpToPage("wo_listipts.php?IPTGroup=" . $IPTGroup);

  if(empty($_POST["RequestingIPTGroup"]))
    {
        DieWithMsg($loc, "Bad Page Invoke. No IPTGroup given.");
    }
}
GenerateHtml:
include "forms/header.php";
include "forms/nav_form.php";
include "forms/wo_menubar.php";
include "forms/wo_selectipt_form.php";
include "forms/footer.php";
?>

