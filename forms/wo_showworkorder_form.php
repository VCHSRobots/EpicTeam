<?php
//---------------------------------------------------------------------
// wo_showworkorder_form.php -- HTML fragment to show a workorder
//
// Created: 11/10/15 NG
//---------------------------------------------------------------------

echo '<div class="content_area">';

echo '<h2>Work Order Display For ' . $WorkOrderTitle . '</h2>';

echo '<div class="badges_param_div">';
echo '<div class="badges_paramvalue">Work Order ID:</div>';
echo '<div class="badges_paramvalue">' . $WorkOrderID . '</div>';
echo '</div>';

echo '<div class="badges_param_div">';
echo '<div class="badges_paramvalue">Work Order Title:</div>';
echo '<div class="badges_paramvalue">' . $WorkOrderTitle . '</div>';
echo '</div>';

echo '<div class="badges_param_div">';
echo '<div class="badges_paramvalue">Date Requested:</div>';
echo '<div class="badges_paramvalue">' . $DateRequested . '</div>';
echo '</div>';

echo '<div class="badges_param_div">';
echo '<div class="badges_paramvalue">Date Needed:</div>';
echo '<div class="badges_paramvalue">' . $DateNeeded . '</div>';
echo '</div>';

echo '<div class="badges_param_div">';
echo '<div class="badges_paramvalue">Priority:</div>';
echo '<div class="badges_paramvalue">' . $Priority . '</div>';
echo '</div>';

echo '<div class="badges_param_div">';
echo '<div class="badges_paramvalue">Day Estimate:</div>';
echo '<div class="badges_paramvalue">' . $DayEstimate . '</div>';
echo '</div>';

echo '<div class="badges_param_div">';
echo '<div class="badges_paramvalue">Revision:</div>';
echo '<div class="badges_paramvalue">' . $Revision . '</div>';
echo '</div>';

echo '<div class="badges_param_div">';
echo '<div class="badges_paramvalue">Requestor:</div>';
echo '<div class="badges_paramvalue">' . $Requestor . '</div>';
echo '</div>';

echo '<div class="badges_param_div">';
echo '<div class="badges_paramvalue">Requesting IPT Lead Approval:</div>';
echo '<div class="badges_paramvalue">' . $RequestingIPTLeadApproval . '</div>';
echo '</div>';

echo '<div class="badges_param_div">';
echo '<div class="badges_paramvalue">Assigned IPT Lead Approval:</div>';
echo '<div class="badges_paramvalue">' . $AssignedIPTLeadApproval . '</div>';
echo '</div>';

echo '<div class="badges_param_div">';
echo '<div class="badges_paramvalue">Project:</div>';
echo '<div class="badges_paramvalue">' . $Project . '</div>';
echo '</div>';

echo '<div class="badges_param_div">';
echo '<div class="badges_paramvalue">Requesting IPT Group:</div>';
echo '<div class="badges_paramvalue">' . $RequestingIPTGroup . '</div>';
echo '</div>';

echo '<div class="badges_param_div">';
echo '<div class="badges_paramvalue">Recieving IPT Group:</div>';
echo '<div class="badges_paramvalue">' . $ReceivingIPTGroup . '</div>';
echo '</div>';

/*echo '<div class="badges_param_div">';
echo '<div class="badges_paramvalue">Project Office Approval:</div>';
echo '<div class="badges_paramvalue">' . $ProjectOfficeApproval . '</div>';
echo '</div>';

echo '<div class="badges_param_div">';
echo '<div class="badges_paramvalue">Reviewed By:</div>';
echo '<div class="badges_paramvalue">' . $ReviewedBy . '</div>';
echo '</div>';
*/
echo '<div class="badges_param_div">';
echo '<div class="badges_paramvalue">Assigned To:</div>';
echo '<div class="badges_paramvalue">' . $AssignedTo . '</div>';
echo '</div>';

echo '<div class="badges_param_div">';
echo '<div class="badges_paramvalue">Completed:</div>';
echo '<div class="badges_paramvalue">' . $Completed . '</div>';
echo '</div>';

echo '<div class="badges_param_div">';
echo '<div class="badges_paramvalue">Completed On:</div>';
echo '<div class="badges_paramvalue">' . $CompletedOn . '</div>';
echo '</div>';

echo '<div class="badges_param_div">';
echo '<div class="badges_paramvalue">Description:</div>';
echo '<div class="badges_paramvalue">' . $Description . '</div>';
echo '</div>';


echo '<div class="badges_param_div">';
echo '<div class="badges_paramvalue">Prerequisite ID:</div>';
echo '<div class="workorders_params_link">';
echo '<a href="workorders_showworkorder.php?WorkOrderID=' . $PrereqID . '">' . $PrereqID . '</a>';
echo '</div>';

echo '</div>';


echo '<form method = "post" action = "wo_markcompleted.php">';
$sql = 'SELECT completed FROM WorkOrders WHERE WorkOrderID = "' . $WorkOrderID . '"';
$result = SqlQuery($loc, $sql);
if ($result->num_rows > 0)
{
	$row = $result->fetch_assoc();
	$completed = $row["completed"];
	if($completed == 0)
	{
		echo '<div class="badges_paramvalue">Is This Work Order Completed?</div>';
		echo '<input type="checkbox" name="completed" value="Yes" />';
		echo '<input type="submit" name="formSubmit" value="Submit" />';
	}
}

echo '<div class="content_area">';
echo '<form action= "wo_setworker.php" method="post">';
echo "What student do you want to assign this to?";
echo "<select  name=\"AssignedTo\"> <!-- This will include a list of all un-completed workorders in the database -->";
$results_array = array();
$sql = 'SELECT LastName, FirstName, UserName from Users';
$result = SqlQuery($loc, $sql);
if ($result->num_rows > 0)
{
        while ($row = $result->fetch_assoc())
        {
			 array_push($results_array, $row);
		}
		
		foreach($results_array as $key => $value)
		{
                    echo "<option value=".addslashes($value['UserName']).">" . addslashes($value['NickName']). " ". addslashes($value['LastName']). "</option>";
		}
		
         $firstname = $row["FirstName"];
	 $lastname = $row["LastName"];
	 $username = $row["UserName"];

}

else
{
	echo "No users currently exist.";
}
echo "</select> ";
echo "<input type=\"submit\" value=\"Submit\">";

echo '</div' . "\n";
?>

