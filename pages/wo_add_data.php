<?php
// --------------------------------------------------------------------
// wo_add_data.php -- Adds Data to a Work Order
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
$pagetitle = "Add Data to Work Order"; 
$doform = false;
$wid="";

$param_list = array(
array("FieldName" => "WID", "FieldType" => "Hidden"),
array("FieldName" => "PicFile",  "FieldType" => "File", "Caption" => "Picture (if any):"),
array("FieldName" => "MainPic",  "FieldType" => "Boolean", "Caption" => "Mark This Pic as Primary?", "Value" => false),
array("FieldName" => "TextInfo", "FieldType" => "TextArea", "Rows" => 6, "Columns" => 72,  "Caption" => "Input More Information:"));     


if( $_SERVER["REQUEST_METHOD"] == "GET")
{
    if(empty($_GET["wid"])) DieWithMsg($loc, "No WID given.");
    $wid = $_GET["wid"];
    $wo = GetWO($wid);
    $pagetabtitle = "Epic " . $wo["WIDStr"];
    SetValueInParamList($param_list, "WID", $wid);
    $doform = true;
    goto GenerateHtml;
}

if( $_SERVER["REQUEST_METHOD"] == "POST")
{
	if(empty($_POST["WID"])) DieWithMsg($loc, "No WID in post.");
	PopulateParamList($param_list, $_POST);
	$wid = $_POST["WID"];
	$wo = GetWO($wid);
    $pagetabtitle = "Epic " . $wo["WIDStr"];
    SetValueInParamList($param_list, "WID", $wid);
    $doform = true;

	if(empty($_POST["TextInfo"])) 
	{
		$error_msg = "Please enter texutal info, even with a picture.";
		goto GenerateHtml;
	}

	$textinfo = $_POST["TextInfo"];
	$primary  = $_POST["MainPic"];
	$picid = 0;
	if(isset($_FILES["PicFile"]))
	{
		$fileinfo = $_FILES["PicFile"];
		if( CheckFileInput($fileinfo)) {
			$picid = PicFileUpload($_FILES["PicFile"]);
			if(!$picid) {
				$error_msg = "Uploaded File does not seem to be a picture.";
				goto GenerateHtml;
			}
		}
	}

	AppendWorkOrderData($wid, $userid, $textinfo, $picid, $primary);
	IncrementRevision($wid);
	$success_msg = "Data Added!";
	$doform = false;
    goto GenerateHtml;
}

GenerateHtml:
$stylesheet=array("../css/global.css", "../css/nav.css", "../css/wo_head.css", "../css/wo_add_data.css");
include "forms/header.php";
include "forms/nav_form.php";
include "forms/wo_display_menubar.php";
include "forms/wo_add_data_form.php";            
include "forms/footer.php"; 

?>