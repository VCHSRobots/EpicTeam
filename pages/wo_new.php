<?php
// --------------------------------------------------------------------
// wo_new.php -- Adds a new work order. 
//
// Created: 12/31/15 DLB
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
$picid = 0;
$havebadge = false;

$param_list = array(
array("FieldName" => "Title",      "FieldType" => "Text",                                    "Style" => "width: 500px;", "Caption" => "Title of New Work Order"),
array("FieldName" => "Priority",   "FieldType" => "Selection", "Selection" => $WOPriorities, "Style" => "width: 120px;", "Caption" => "Priority"),
array("FieldName" => "Project",    "FieldType" => "Selection", "Selection" => $WOProjects,   "Style" => "width: 200px;", "Caption" => "Project"),
array("FieldName" => "Requestor",  "FieldType" => "Selection", "Selection" => $WOIPTeams,    "Style" => "width: 200px;", "Caption" => "Requesting IPT"),
array("FieldName" => "Receiver",   "FieldType" => "Selection", "Selection" => $WOIPTeams,    "Style" => "width: 200px;", "Caption" => "Receiving IPT"),
array("FieldName" => "DateNeedBy", "FieldType" => "Date",                                    "Style" => "width: 200px;", "Caption" => "Date Needed"),
array("FieldName" => "Description","FieldType" => "TextArea", "Rows" => 10, "Columns" => 72, "Caption" => "Describe Work"));

if( $_SERVER["REQUEST_METHOD"] == "GET")
{

    // Set up defaults...
    $data["Priority"]   =  $WOPriorities[0];
    $data["Requestor"]  =  $userIPT;
    $data["Receiver"]   =  $userIPT;
    $data["DateNeedBy"] =  date('Y-m-d', time() + (5 * 24 * 3600));
    
    PopulateParamList($param_list, $data);
    goto GenerateHtml;
}

if( $_SERVER["REQUEST_METHOD"] == "POST")
{

    PopulateParamList($param_list, $_POST);

    // Check for illegal input...
    if(!IsSqlTextOkay($_POST))
    {
        $error_msg = "Illegal characters in input... Do not use quotes and control chars.";
        goto GenerateHtml;
    }

    // Check for required inputs:
    $sEmpty = array();
    if(empty($_POST["Title"]))       $sEmpty[] = "Title";
    if(empty($_POST["Priority"]))    $sEmpty[] = "Priority";
    if(empty($_POST["Project"]))     $sEmpty[] = "Project";
    if(empty($_POST["Requestor"]))   $sEmpty[] = "Requesting IPT";
    if(empty($_POST["Receiver"]))    $sEmpty[] = "Receiving IPT";
    if(empty($_POST["Description"])) $sEmpty[] = "Description of Work";
    if(empty($_POST["DateNeedBy"]))  $sEmpty[] =" Date Needed";
    if(count($sEmpty) > 0)
    {
        $error_msg = "Required information missing: ";
        $c = 0;
        foreach($sEmpty as $s) 
        {
            if($c > 0) $error_msg .= ', ';
            $error_msg .= $s;
            $c++;
        }
        $error_msg .= '.';
        goto GenerateHtml;
    }
    
    // !!! Check to make sure the title is unique.

    // !!! Check to make sure the date is okay.

    $data = ExtractValuesFromParamList($param_list);

    // Add some important stuff
    $data["Revision"] = 0;
    $data["AuthorID"] = $userid;
    $data["DateCreated"] = date('Y-m-d');
    $data["Assigned"] = false;
    $data["Approved"] = false;
    $data["ApprovedByCap"] = false;
    $data["Finished"] = false;
    $data["Closed"] = false;
    $data["Active"] = true;

    $r = CreateNewWorkOrder($data);
    if($r[1] !== true)
    {
        $error_msg = $r[1];
        goto GenerateHtml;
    }

    $success_msg = "New work order " . WIDStrHtml($r[0], 0, false) . " created!";
}

GenerateHtml:
$picid = GetPicIDForUserID($userid);
if($picid > 0) 
{
    $picurl = PicUrl($picid, "thumb");
}

include "forms/header.php";
include "forms/nav_form.php";
include "forms/wo_new_form.php";
include "forms/footer.php";

?>