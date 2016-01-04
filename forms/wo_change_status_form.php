<?php
// --------------------------------------------------------------------
// wo_change_status_form.php -- Form for changing status of WO.
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
	echo '<div class="wo_ins_header">Click one of the buttons for an immediate Status change.</div>' . "\n";

	echo '<div class="inputform_area">' . "\n";
	echo '<form action="wo_change_status.php" method="post">' . "\n";
	echo '<input type="hidden" name="wid" value="' . $wid . '" />' . "\n";

	foreach($buttons as $b) 
	{
		echo '<div class="wo_status_btn">' . "\n";
		echo '<input class="btn_form_submit" type="submit" name="' . $b . '" value="'. $b . '">' . "\n";
		echo '</div>';
	}
	echo '</form></div>' . "\n";
}

if(!empty($instructions)) 
{ 
    echo '<div class="instructions"><pre>';
    echo $instructions;
    echo '</pre></div>';
}

echo '</div>' ."\n";

?>