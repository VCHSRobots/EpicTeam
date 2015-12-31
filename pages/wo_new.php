<?php
// --------------------------------------------------------------------
// wo_new.php -- Adds a new work order. 
//
// Created: 12/31/15 DLB
// --------------------------------------------------------------------

require_once "../maindef.php";
session_start();
log_page();
CheckLogin();

$timer = new timer();
$loc = rmabs(__FILE__);
$error_msg = "";
$success_msg = "";
$userid = GetUserID();
$username = GetUserName();
$picid = 0;
$havebadge = false;

$param_list = array(
array("FieldName" => "Title",  "FieldType" => "Password", "Value" => ""),
array("FieldName" => "Priority", "FieldType" => "Selection", "Selection" => array("High", "Normal", "Low")),
array("FieldName" => "Receiving IPT", "FieldType" => "Selection", "Selection" => array("Build", "CAD", "CNC", "Purchasing")),
array("FieldName" => "Description", "Caption" => "Short Description of Work", "FieldType" => "TextArea"));

if( $_SERVER["REQUEST_METHOD"] == "GET")
{
    $data = GetUserInfo($userid);
    if($data === false) DieWithMsg($loc, 'User with ID=' . $userid . ' not found.');
    
    PopulateParamList($param_list, $data);
    goto GenerateHtml;
}

if( $_SERVER["REQUEST_METHOD"] == "POST")
{
    $data = GetUserInfo($userid);
    if($data === false) DieWithMsg($loc, 'User with ID=' . $userid . ' not found.');

    PopulateParamList($param_list, $_POST);
   
    // Check for illegal input...
    if(!IsSqlTextOkay($_POST))
    {
        $error_msg = "Illegal characters in input... Do not use quotes and control chars.";
        goto GenerateHtml;
    }
    
    /*
    // Looks like we are okay to insert into the database!
    $okay = UpdateUser($param_list, $userid);
    if($okay === true)
    {
        $success_msg = "Data Updated!";
        $data = GetUserInfo($userid);
        PopulateParamList($param_list, $data);
        
    }
    else 
    {
        $error_msg = $okay;
    }
    */
    $sucess_msg = "Your new workorder is in the system!";
}

GenerateHtml:
$picid = GetPicIDForUserID($userid);
if($picid > 0) 
{
    $picurl = PicUrl($picid, "thumb");
}
$badgeid = $data["BadgeID"];
$havebadge = BadgeExists($badgeid);
if($havebadge)
{
    $badge_front_url = GetBadgeUrl($badgeid, 'front');
    $badge_back_url  = GetBadgeUrl($badgeid, 'back');
}

include "forms/header.php";
include "forms/nav_form.php";
include "forms/wo_new_form.php";
include "forms/footer.php";

?>