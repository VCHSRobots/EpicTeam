<?php
// --------------------------------------------------------------------
// wo_assign_workers_form.php -- Form for changing status of WO.
//
// Created: 01/03/16 DLB
// --------------------------------------------------------------------


echo '<div class="content_area">' . "\n";

echo '<h2 class="page_title"> ' . $pagetitle . '</h2>' . "\n";

if(!empty($success_msg))
{
    echo '<div class="inputform_msg" id="inputform_success_msg" >' . $success_msg . "</div>";
}
if(!empty($error_msg))
{
    echo '<div class="inputform_msg" id="inputform_error_msg" >' . $error_msg . "</div>";
}

if(!empty($doform)) 
{

	RenderField("wo", "wo_WIDStr",        "",                     $wo["WIDStr"]                );
	echo '<div style="clear: both;"></div>' . "\n";

	if(!empty($pagetext)) echo $pagetext;
	RenderField("wo", "wo_Title",         "Title:",               $wo["Title"]                 );

	echo '<div style="clear: both;"></div>' . "\n";

	echo '<div id="assignment_block">' . "\n";
	if(!empty($workers))
	{
		echo '<div class="inputform_area">' . "\n";
		echo '<form action="wo_assign_workers.php" method="post">' . "\n";
		echo '<input type="hidden" name="wid" value="' . $wid . '" />' . "\n";
		render_selection_field("Worker to Assign", "Workers", $workers, "wo_aw_");
		echo '<div style="clear: both;"></div>' . "\n";
		echo '<div class="btn_form_submit_div">';
		echo '<input class="btn_form_submit" type="submit" value="Submit" name="Add">' . "\n";
		echo '</div>';
		echo '</form></div>' . "\n";
	}
	if(!empty($currentworkers))
	{
		echo '<div class="inputform_area">' . "\n";
		echo '<form action="wo_assign_workers.php" method="post">' . "\n";
		echo '<input type="hidden" name="wid" value="' . $wid . '" />' . "\n";
		render_selection_field("Worker to Unassign", "Workers", $currentworkers, "wo_aw_");
		echo '<div style="clear: both;"></div>' . "\n";
		echo '<div class="btn_form_submit_div">';
		echo '<input class="btn_form_submit" type="submit" value="Submit" name="Remove">' . "\n";
		echo '</div>';
		echo '</form></div>' . "\n";
	}
	echo '</div>' . "\n";

	echo '<div id="worker_info_block">' . "\n";
	if(!empty($currentworkers))
	{
		echo '<div class="wo_aw_info">Currently Assigned Workers</div>' . "\n";
		foreach($currentworkers as $c)
		{
			echo '<div class="wo_aw_worker">' . $c . '</div>' . "\n";
		}
	}
	else
	{
		echo '<div class="wo_aw_info">No workers are currently assigned to this Work Order.</div>' . "\n";
	}
	echo '</div>' . "\n";

	echo '<div style="clear: both;"></div>' . "\n";
}

if(!empty($instructions)) 
{ 
    echo '<div class="instructions"><pre>';
    echo $instructions;
    echo '</pre></div>';
}

echo '</div>' ."\n";

?>