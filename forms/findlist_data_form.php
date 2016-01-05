<?php
// --------------------------------------------------------------------
// findlist_data_form.php -- HTML fragment to for findlist page.
//
// Created: 01/04/16 SS
// --------------------------------------------------------------------


if(!empty($tabledata) && !empty($tableheader))
{
	
	RenderTable($tableheader, $tabledata, "findlist_submit");
}
if ($sql!= "" && $view == "full") 
{
	include "forms/statuskey_form.php";
}

echo '</div' . "\n";
?>