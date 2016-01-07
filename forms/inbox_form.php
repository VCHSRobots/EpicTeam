<?php
// --------------------------------------------------------------------
// inbox_form.php -- HTML fragment to for Inbox page.
//
// Created: 01/04/16 SS
// --------------------------------------------------------------------

echo '<div class="content_area">';
echo '<h2 class="page_title">' . $pagetitle . '</h2>' . "\n";

if(!empty($success_msg))
{
    echo '<div class="inputform_msg" id="inputform_success_msg" >' . $success_msg . "</div>";
}
if(!empty($error_msg))
{
    echo '<div class="inputform_msg" id="inputform_error_msg" >' . $error_msg . "</div>";
}

echo $pagetext;
 

if(!empty($tabledata) && !empty($tableheader))
{
	
	RenderTable($tableheader, $tabledata, "inbox_submit");
}
if ($sql!= "" && $result->num_rows >0) 
{
	include "forms/statuskey_form.php";
}

echo '</div' . "\n";
?>