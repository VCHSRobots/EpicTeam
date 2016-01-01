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
    $loc = "userlib.php->GetUserInfo";
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
    $loc = "userlib.php->GetUserInfo";
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
    $loc = "userlib.php->GetUserInfo";
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
    $loc = "userlib.php->GetUserInfo";
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
function FilterWorkOrders($view, $priority, $iptgroup, $status, $project){
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
?>
