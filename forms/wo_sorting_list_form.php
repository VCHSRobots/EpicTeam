<?php
// --------------------------------------------------------------------
// wo_sorting_form.php -- HTML fragment to show the work orders.
//
// Created: 12/31/15 SS
// --------------------------------------------------------------------

?>
<div class="content_area">

	<h2 class="page_title">Show Work Orders</h2>

	<div class="wo_sorting_selection_area">
		<form action="list.php" method="post">

			<div class="wo_sorting_label"> Filter By:</div>
			<br>
			<br>
			<div class="wo_sorting_label"> View:</div>
			<div class="wo_sorting_selection ">
				<select name="View">
					<option name="simple" value="simple">simple</option>
					<option name="full" value="full">full</option>
				</select>
			 </div>

			<div class="wo_sorting_label"> Priority:</div>
			<div class="wo_sorting_selection ">
				<select name="Priority">
					<option name="" value=""></option>
					<?php
						foreach($WOPriorities as $priority){
							echo "<option value=\"$priority\">$priority</option>";
						}
					?>
				</select>
			 </div>
			<!--<div class="wo_sorting_label"> Status: </div>
			<div class="wo_sorting_selection ">
				<select name="Status">
					<option name="" value=""></option>
					<option name="Unapproved" value="Unapproved">Unapproved</option>
					<option name="Approved" value="Approved">Approved</option>
					<option name="Unassigned" value="Unassigned">Unassigned</option>
					<option name="Assigned" value="Assigned">Assigned</option>
					<option name="ApprovedByCap" value="ApprovedByCap">ApprovedByCap</option>
					<option name="Finished" value="Finished">Finished</option>
					<option name="Closed" value="Closed">Closed</option>
					<option name="Active" value="Active">Active</option>
				</select>
			</div>-->
			<!--<div class="wo_sorting_label"> Requesting IPT:</div>
			<div class="wo_sorting_selection ">
				<select name="RequestingTeam">
					<option name="" value=""></option>
					<?php
						foreach($WOIPTeams as $team){
							echo "<option value=\"$team\">$team</option>";
						}
					?>
				</select>
			 </div>-->
			<div class="wo_sorting_label"> Receiving IPT:</div>
			<div class="wo_sorting_selection ">
				<select name="ReceivingTeam">
					<option name="" value=""></option>
					<?php
						foreach($WOIPTeams as $team){
							echo "<option value=\"$team\">$team</option>";
						}
					?>
				</select>
			 </div>
			<!--<div class="wo_sorting_label"> IPT Group:</div>
			<div class="wo_sorting_selection ">
			    <select name="ReceivingTeam">
					<?php
						/*foreach($IPTeams as $team){
							echo "<option value=\"$team\">$team</option>";
						}*/
					?>
				</select>
			</div>-->
			<br>
			<br>
			<input class="wo_sorting_load_button" name="Refresh" type="submit" value="Refresh">
			<input class="wo_sorting_load_button" name="AdvFilter" type="submit" value="Advanced Filter">
		</form>
	</div>
	<div style="clear: both"> </div>
	<div class="showlog_output_area">
	</div>

