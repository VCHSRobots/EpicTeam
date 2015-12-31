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
echo '<form action="pages/wo_new.php" method="post">' . "\n";

RenderParams($param_list);

echo '<div class="btn_form_submit_div">';
echo '<input class="btn_form_submit" type="submit" value="Submit">' . "\n";
echo '</div>';
echo '</form></div>' . "\n";

echo '<div class="inputfrom_instructions">' . "\n";
echo '<p>Please do not input garbage!</p>';
echo '</div>' . "\n"; 

echo '</div' . "\n";
?>