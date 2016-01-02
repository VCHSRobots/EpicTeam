<?php
// --------------------------------------------------------------------
// yourwork_form.php -- HTML fragment to for your work page.
//
// Created: 01/02/16 DLB
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
	RenderTable($tableheader, $tabledata, "your_submit");
}

echo '</div' . "\n";
?>