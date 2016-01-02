<?php
// --------------------------------------------------------------------
// workorderlib.hp:  library fucntions that deal with workorders.
//
// Created: 11/??/15 SH, BM ??
// --------------------------------------------------------------------

// --------------------------------------------------------------------
// Given the WorkOrderID, returns a associative array, with the following
// keys: (WorkOrderID, WorkOrderName, Description, DateRequested,
//    DateNeeded, Priority, DayEstimate, Revision, Requestor,
//    RequestingIPTLeadApproval, AssignedIPTLeadApproval, Project, 
//    RequestingIPTGroup, ReceivingIPTGroup, ProjectOfficeApproval,
//    ReviewedBy, AssignedTo, Completed, CompletedOn). False returned if
//    work order not found.
function GetWorkOrderInfo($workorderid)
{
    $loc = rmabs(__FILE__ . ".GetWorkOrderInfo");
    $sql = 'SELECT * FROM WorkOrders WHERE WorkOrderID=' . SqlClean($workorderid);
    $result = SqlQuery($loc, $sql);
    if($result->num_rows != 1) { return false; }
    $row = $result->fetch_assoc();
    return $row;
}
// --------------------------------------------------------------------
// Given the WorkOrderID, returns a associative array, with the following
// keys: (PrereqID, PrevWorkOrderID, WorkOrderID). False returned if
//    work order prerequisite not found.
function GetWorkOrderPrereqInfo($workorderid)
{
    $loc = rmabs(__FILE__ . ".GetWorkOrderPrereqInfo");
    $sql = 'SELECT * FROM Prerequisites WHERE WorkOrderID=' . SqlClean($workorderid);
    $result = SqlQuery($loc, $sql);
    if($result->num_rows != 1) { return false; }
    $row = $result->fetch_assoc();
    return $row;
}
// --------------------------------------------------------------------
// Given the WorkOrderID, returns a associative array, with the following
// keys: (TaskID, WorkOrderID, Quantity, Description, UnitPrice). False returned if
//    work order task not found.
function GetWorkOrderTasksInfo($workorderid)
{
    $loc = rmabs(__FILE__ . ".GetWorkOrderTasksInfo");
    $sql = 'SELECT * FROM WorkOrderTasks WHERE WorkOrderID=' . SqlClean($workorderid);
    $result = SqlQuery($loc, $sql);
    if($result->num_rows != 1) { return false; }
    $row = $result->fetch_assoc();
    return $row;
}
// --------------------------------------------------------------------
// Given the WorkOrderID, returns a associative array, with the following
// keys: (FileID, WorkOrderID, FilePath). False returned if
//    work order task not found.
function GetWorkOrderFiles($workorderid)
{
    $loc = rmabs(__FILE__ . ".GetWorkOrderFiles");
    $sql = 'SELECT * FROM RelatedFiles WHERE WorkOrderID=' . SqlClean($workorderid);
    $result = SqlQuery($loc, $sql);
    if($result->num_rows != 1) { return false; }
    $row = $result->fetch_assoc();
    return $row;
}
// --------------------------------------------------------------------
// Returns List of all IPTGroups in database.
function getIPTGroups($loc){
	$sql = "SELECT IPTGroupName FROM IPTGroup;";
	$result = SqlQuery($loc, $sql);
	$IPTGroupArray = array();
	while($result->num_rows > 0)
	{
		$row = $result->fetch_assoc();
		$IPTGroupName = $row["IPTGroupName"];
		array_push($IPTGroupArray, $IPTGroupName);
	}
	return $IPTGroupArray;
}
// --------------------------------------------------------------------
// Returns list of all Projects in database;
function getAllProjects($loc){
	$sql = "SELECT ProjectName FROM Project;";
	$result = SqlQuery($loc, $sql);
	$ProjectArray = array();
	while($result->num_rows > 0)
	{
		$row = $result->fetch_assoc();
		$ProjectName = $row["ProjectName"];
		array_push($ProjectArray, $ProjectName);
	}
	return $ProjectArray;
}
// --------------------------------------------------------------------
// Filters work orders based on the specified criteria
function FilterWorkOrders($view, $priority, $iptgroup, $status, $project)
{
	$loc = rmabs(__FILE__ . ".FilterWorkOrders");
	$multipleWheres = false;
	$sql = "SELECT ";
	if($view = "simple")
	{
		$sql .= " WorkOrderID, WorkOrderName, ReceivingIPTGroup ";
	}
	else
	{
		$sql .= " WorkOrderID, WorkOrderName, ReceivingIPTGroup, RequestingIPTGroup, Project, Priority, DateNeeded ";
	}
	$sql .=" FROM WorkOrders";
	if(isset($priority))
	{
		$sql .= "WHERE Priority = \'" . $priority ."\'" ;
		$multipleWheres = true;
	}
	$ProjectArray = array();
	
	if(isset($iptgroup))
	{
		if($multipleWheres)
		{
			$sql .= " AND ";
		}
		else
		{
			$sql .= "";
		}
		$sql .= "";
	}
	
	while($result->num_rows > 0)
	{
		$row = $result->fetch_assoc();
		$ProjectName = $row["ProjectName"];
		array_push($ProjectArray, $ProjectName);
	}
		$data = SqlQuery($loc, $sql);

	
	
	return $ProjectArray;
}

// --------------------------------------------------------------------
// Generates the Revision Letter(s) given the revision number.
function RevisionToStr($revision, $approved)
{
	$letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	if($revision < 0) return "-?";
	if($revision == 0) return "**";
	$revision--;
	$dash = '*';
	if($approved) $dash = '-';
	if($revision < 26) return $dash . substr($letters, $revision, 1);
	$revision -= 26;
	$d2 = intval($revision / 26);
	$d1 = intval($revision % 26);
	return substr($letters, $d2, 1) . substr($letters, $d1, 1);
}

// --------------------------------------------------------------------
// Given a WID and it's revision number, generated the correctly 
// formatted string for a Work Order.
function WIDStr($wid, $revision, $approved=true)
{
	if($wid <= 0) return "W????" . RevisionToStr($revision, $approved);
	if($wid > 9999) return "W####" . RevisionToStr($revision, $approved);
	return sprintf("W%04d", $wid) . RevisionToStr($revision, $approved);
}

// --------------------------------------------------------------------
// Given a WID and it'w revision number, returns the HTML to 
// correctly fromat it (i.e., as a span.)
function WIDStrHtml($wid, $revision, $approved=true)
{
	return '<span class="wostr">' . WIDStr($wid, $revision, $approved) . '</span>' ;
}

// --------------------------------------------------------------------
// Create a new work order.  Iput is an assocative array of all fields
// in the work order table.  Returns a array of two values: WID of
// the new work order, or WID=0 and an error message.

function CreateNewWorkOrder($data)
{
	$loc = rmabs(__FILE__ . ".CreateNewWorkOrder");

	if(empty($data["Title"])) return array(0, "Title cannot be empty.");
	if(empty($data["Description"])) return array(0, "Title cannot be empty.");
	if(empty($data["Priority"])) return array(0, "Priority cannot be empty.");
	if(empty($data["Project"])) return array(0, "Project cannot be empty.");
	if(empty($data["Requestor"])) return array(0, "Requestor cannot be empty.");
	if(empty($data["Receiver"])) return array(0, "Receiver cannot be empty.");
	if(empty($data["DateNeedBy"])) return array(0, "DateNeedBy cannot be empty.");
	if(empty($data["DateCreated"])) return array(0, "DateCreated cannot be empty.");

    // Check for duplicate title.
    $sql = 'SELECT WID FROM WorkOrders WHERE Title="' . $data["Title"] . '"';
    $result = SqlQuery($loc, $sql);
    if($result->num_rows > 0)
    {
        $msg = 'Unable to create Work Order. Duplicate Title. ';
        log_msg($loc, $msg);
        return array(0, $msg);
    }

    $sql = 'INSERT INTO WorkOrders ' .
           '(Title, Description, Priority, Project, Revision, ' .
   	       'Requestor, Receiver, AuthorID, DateCreated, DateNeedBy, ' .
   	       'Assigned, Approved, ApprovedByCap, Finished, Closed, Active) ';
	$sql .= ' VALUES(';
	$sql .= '  "' . $data["Title"] . '"';
	$sql .= ', "' . $data["Description"] . '"';
	$sql .= ', "' . $data["Priority"] . '"';
	$sql .= ', "' . $data["Project"] . '"';
	$sql .= ', '  . intval($data["Revision"]) ;
	$sql .= ', "' . $data["Requestor"] . '"';
	$sql .= ', "' . $data["Receiver"] . '"';
	$sql .= ', '  . intval($data["AuthorID"]) ;
	$sql .= ', "' . $data["DateCreated"] . '"';
	$sql .= ', "' . $data["DateNeedBy"] . '"';
	$sql .= ', '  . TFstr($data["Assigned"]);
	$sql .= ', '  . TFstr($data["Approved"]);
	$sql .= ', '  . TFstr($data["ApprovedByCap"]);
	$sql .= ', '  . TFstr($data["Finished"]);
	$sql .= ', '  . TFstr($data["Closed"]);
	$sql .= ', '  . TFstr($data["Active"]);
	$sql .= ')';

    $result = SqlQuery($loc, $sql);
    log_msg($loc, 
       array("New WO added!  Title=" . $data["Title"] ,
       "AuthorID= " . $data["AuthorID"]));

    // Quicky find the new WO
    $sql = 'Select WID, Revision From WorkOrders WHERE Title = "' . $data["Title"] . '"';
    $result = SqlQuery($loc, $sql);
    if($result->num_rows != 1)
    {
    	DieWithMsg($loc, 'Unable to find newly create workorder.');
    }
    $row = $result->fetch_assoc();
    $wid = intval($row["WID"]);
    $revision = intval($row["Revision"]);

    return array($wid, true);
}

// --------------------------------------------------------------------
// Gets evertying about one WO, and returns it in a assoc array.
// If the WO is not found, false is returned. 

function GetWO($wid)
{
	$loc = rmabs(__FILE__ . '.GetWO');
	$sql = "SELECT * From WorkOrders WHERE WID=" . intval($wid);
	$result = SqlQuery($loc, $sql);
    if($result->num_rows != 1) return false;
    $data = $result->fetch_assoc();

    $data["IsApproved"] = $data["Approved"] || $data["ApprovedByCap"];
    $data["WIDStr"] = WIDStr($wid, $data["Revision"], $data["IsApproved"]);
    $data["AuthorInfo"] = GetUserInfo($data["AuthorID"]);
    $data["AuthorName"] = "";
    if(!empty($data["AuthorInfo"]))
    {
    	$ai = $data["AuthorInfo"];
    	$data["AuthorName"] = strtoupper(substr($ai["FirstName"], 0, 1)) . '. ' . $ai["LastName"];
    }

    return $data;
}


?>
