<?php
// --------------------------------------------------------------------
// admin_adduser_form.php -- HTML fragment to show the add_user form.
//
// Created: 12/29/14 DLB
// --------------------------------------------------------------------

echo '<div class="content_area">';
echo '<h2 class="page_title">Add New User</h2>' . "\n";

if(!empty($success_msg))
{
    echo '<div class="inputform_msg" id="inputform_success_msg" >' . $success_msg . "</div>";
}
if(!empty($error_msg))
{
    echo '<div class="inputform_msg" id="inputform_error_msg" >' . $error_msg . "</div>";
}

echo '<div class="inputform_area">' . "\n";
echo '<form action="admin_adduser.php" method="post">' . "\n";

RenderParams($param_list, "admin_adduser_");

echo '<div style="clear: both;"></div>' . "\n";

echo '<div class="btn_form_submit_div">';
echo '<input class="btn_form_submit" type="submit" value="Add User">' . "\n";
echo '</div>';
echo '</form></div>' . "\n";

echo '</div' . "\n";
?>
