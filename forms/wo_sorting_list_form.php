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
<form action="wo_sorting.php" method="post">

<input class="wo_sorting_load_button" type="submit" value="Refresh">



<div class="wo_sorting_label"> View:
<div class="wo_sorting_selection ">
<select name="View">
	<option name="simple" value="simple">simple</option>
	<option name="full" value="full">full</option>
</select>
 </div>

<div class="wo_sorting_label"> Priority:
<div class="wo_sorting_selection ">
<select name="Priority">
	<option name="high" value="high">high</option>
	<option name="normal" value="normal">normal</option>
	<option name="low" value="low">low</option>
</select>
 </div>
<div class="wo_sorting_label"> Status: 
<div class="wo_sorting_selection ">
<select name="Status">
	<option name="Unapproved" value="Unapproved">Unapproved</option>
	<option name="Unassigned" value="Unassigned">Unassigned</option>
	<option name="Assigned" value="Assigned">Assigned</option>
	<option name="Completed" value="Completed">Completed</option>
	<option name="Closed" value="Closed">Closed</option>
	
</select>
 </div>
 <div class="wo_sorting_label"> IPT Group:
<div class="wo_sorting_selection ">
<select name="IPTGroup">
<?php
foreach($IPTGroupArray as $group){
	         echo "<option value=\"$group\">$group</option>";
}

?>
</select>
</div>
 <div class="wo_sorting_label"> Project:
<div class="wo_sorting_selection ">
<select name="Project">
<?php
foreach($Projects as $project){
	         echo "<option value=\"$project\">$project</option>";
}

?>
</select>
</div>
</div>
</form>

</div>
<div style="clear: both"> </div>

<div class="showlog_output_area">

</div>
 </div>
  </div>