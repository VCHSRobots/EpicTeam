<?php
// --------------------------------------------------------------------
// admin_listusers_form.php -- HTML fragment for listing users.
//
// Created: 01/02/16 DLB
// --------------------------------------------------------------------

echo '<div class="content_area">';
if(!empty($pagetitle)) echo '<h2 class="page_title">' . $pagetitle . '</h2>' . "\n";

if(!empty($success_msg))
{
    echo '<div class="inputform_msg" id="inputform_success_msg" >' . $success_msg . "</div>";
}
if(!empty($error_msg))
{
    echo '<div class="inputform_msg" id="inputform_error_msg" >' . $error_msg . "</div>";
}

if(!empty($pagetext)) echo $pagetext;
 
if(!empty($tabledata) && !empty($tableheader))
{
	RenderTable($tableheader, $tabledata, "admin_listusers");
}

echo '</div' . "\n";
?>