<?php
// --------------------------------------------------------------------
// wo_new_form.php -- HTML fragment to show new workorder form.
//
// Created: 12/31/15 DLB
// --------------------------------------------------------------------

echo '<div class="content_area">';
echo '<h2 class="page_title">New Work Order</h2>' . "\n";

if(!empty($success_msg))
{
    echo '<div class="inputform_msg" id="inputform_success_msg" >' . $success_msg . "</div>";
}
if(!empty($error_msg))
{
    echo '<div class="inputform_msg" id="inputform_error_msg" >' . $error_msg . "</div>";
}

echo '<div class="inputform_area">' . "\n";
echo '<form action="wo_new.php" method="post">' . "\n";

RenderParams($param_list);

/*
render_text_field("Title", "Title", "width: 300px;");
render_textarea_field("Describe Work To Do", "Description", 10, 60, "font-size: 10pt;");
render_selection_field("Priority", "Priority", $WOPriorities, "width: 120px;", "Routine");
render_selection_field("Project", "Project", $WOProjects, "width: 120px;", "General");
render_selection_field("Requesting IPT", "Requestor", $WOIPTeams, "width: 200px;");
render_selection_field("Receiving IPT", "Receiver", $WOIPTeams, "width: 200px;");
render_date_field("Date Required", "DateNeedBy", "width: 200px;", "2016-01-15");
*/

echo '<div class="btn_form_submit_div">';
echo '<input class="btn_form_submit" type="submit" value="Submit">' . "\n";
echo '</div>';
echo '</form></div>' . "\n";

echo '<div class="inputfrom_instructions">' . "\n";
echo '<p>Please do not input garbage!</p>';
echo '</div>' . "\n"; 

echo '</div' . "\n";
?>