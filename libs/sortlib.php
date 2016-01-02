<?php
// Lib for sorting
// needs a lot of cleanup...

// --------------------------------------------------------------------
// Filters work orders based on the specified criteria
function CreateFilterSQL($filters)
{
	$multipleWheres = false;

	$sql = "SELECT ";
	if(isset($filters["View"]) && $filters["View"] == "full")
	{
		$sql .= " WorkOrders.WID, Title, Receiver, Requestor, Project, Priority, DateNeedBy , Approved, Assigned, ApprovedByCap, Finished, Closed, Active";
	}
	else
	{
				$sql .= " WorkOrders.WID, Title, Receiver, Requestor ";

	}
	$sql .=" FROM WorkOrders ";

	if(isset($filters["StudentAssigned"]) && $filters["StudentAssigned"]!="")
		{
		$sql .= " RIGHT JOIN Assignments ON WorkOrders.WID = Assignments.WID ";
		$sql .= CheckMultipleWheres($multipleWheres);
		$multipleWheres = true;
		$sql .= "Assignments.UserID = " . $filters["StudentAssigned"];
	}
	if(isset($filters["Title"]) && $filters["Title"]!="")
	{
		$sql .= CheckMultipleWheres($multipleWheres);
		$multipleWheres = true;
		$sql .= " Title = '" . $filters["Title"] . "'";
	}
	if(isset($filters["Author"]) && $filters["Author"]!="")
	{
		$sql .= CheckMultipleWheres($multipleWheres);
		$multipleWheres = true;
		$sql .= " AuthorID = " . $filters["Author"] ;
	}
	if(isset($filters["Priority"]) && $filters["Priority"]!="")
	{
		$sql .= CheckMultipleWheres($multipleWheres);
		$multipleWheres = true;
		$sql .= " Priority = '" . $filters["Priority"] ."'" ;	
	}
	if(isset($filters["DateCreatedStart"]) && isset($filters["DateCreatedEnd"]) && $filters["DateCreatedStart"]!="" && $filters["DateCreatedEnd"]!="" &&$filters["DateCreatedStart"]<= $filters["DateCreatedEnd"])
	{
		$sql .= CheckMultipleWheres($multipleWheres);
		$multipleWheres = true;
		$sql .= "(DateCreated BETWEEN '" . $filters["DateCreatedStart"] . "' AND '" . $filters["DateCreatedEnd"] . "')";
	}
	if(isset($filters["DateNeededEnd"]) && isset($filters["DateNeededStart"]) && $filters["DateNeededStart"]!="" && $filters["DateNeededEnd"]!="" &&$filters["DateNeededStart"]<= $filters["DateNeededEnd"])
	{
		$sql .= CheckMultipleWheres($multipleWheres);
		$multipleWheres = true;
		$sql .= "(DateNeedBy BETWEEN '" . $filters["DateNeededStart"] . "' AND '" . $filters["DateNeededEnd"] . "')";
	}
	if(isset($filters["RequestingTeam"]) && $filters["RequestingTeam"]!="")
	{
		$sql .= CheckMultipleWheres($multipleWheres);
		$multipleWheres = true;
		$sql .= "Requestor = '" . $filters["RequestingTeam"] . "'";
	}
	if(isset($filters["ReceivingTeam"]) && $filters["ReceivingTeam"]!="")
	{
		$sql .= CheckMultipleWheres($multipleWheres);
		$multipleWheres = true;
		$sql .= "Receiver = '" . $filters["ReceivingTeam"] . "'";
	}
	if(isset($filters["Project"]) && $filters["Project"]!="")
	{
		$sql .= CheckMultipleWheres($multipleWheres);
		$multipleWheres = true;
		$sql .= "Project = '" . $filters["Project"] . "'";
	}
	if(isset($filters["Assigned"]) && $filters["Assigned"]!="")
	{
		$sql .= CheckMultipleWheres($multipleWheres);
		$multipleWheres = true;
		if($filters["Assigned"] == 0) $sql .= " Assigned = 0 ";
		else if($filters["Assigned"]==1) $sql .= " Assigned = 1 ";
	}
	if(isset($filters["Approved"]) && $filters["Approved"]!="")
	{
		$sql .= CheckMultipleWheres($multipleWheres);
		$multipleWheres = true;
		if($filters["Approved"] == 0) $sql .= " Approved = 0 ";
		else if($filters["Approved"]==1) $sql .= " Approved = 1 ";
	}
	if(isset($filters["ApprovedByCap"]) && $filters["ApprovedByCap"]!="")
	{
		$sql .= CheckMultipleWheres($multipleWheres);
		$multipleWheres = true;
		if($filters["ApprovedByCap"] == 0) $sql .= " ApprovedByCap = 0 ";
		else if($filters["ApprovedByCap"]==1) $sql .= " ApprovedByCap = 1 ";
	}
	if(isset($filters["Finished"]) && $filters["Finished"]!="")
	{
		$sql .= CheckMultipleWheres($multipleWheres);
		$multipleWheres = true;
		if($filters["Finished"] == 0) $sql .= " Finished = 0 ";
		else if($filters["Finished"]==1) $sql .= " Finished = 1 ";
	}
	if(isset($filters["Closed"]) && $filters["Closed"]!="")
	{
		$sql .= CheckMultipleWheres($multipleWheres);
		$multipleWheres = true;
		if($filters["Closed"] == 0) $sql .= " Closed = 0 ";
		else if($filters["Closed"]==1) $sql .= " Closed = 1 ";
	}
	if(isset($filters["Active"]) && $filters["Active"]!="")
	{
		$sql .= CheckMultipleWheres($multipleWheres);
		$multipleWheres = true;
		if($filters["Active"] == 0) $sql .= " Active = 0 ";
		else if($filters["Active"]==1) $sql .= " Active = 1 ";
	}
	$sql .= ";";
	return $sql;

}

function CheckMultipleWheres($multipleWheres){
	$sql = "";
	if($multipleWheres)
		{
			$sql .= " AND ";
		}
	else
		{
			$sql .= " WHERE ";
		} 
		return $sql;
}
?>