<?php
// --------------------------------------------------------------------
// team_menubar.php -- HTML fragment to show menu bar for the team view.
//
// Created: 01/05/16 DLB
// --------------------------------------------------------------------


echo '<style>' . "\n";
echo '   .content_area {min-height: 275px; } ' . "\n";
echo '</style>' . "\n";

echo '<div class="menubar_area">' . "\n";

echo '<div class="btn_menu_div">' . "\n";
echo '<a class="btn_menu" href="team.php">Overview</a>' . "\n";
echo '</div>' . "\n";

echo '<div class="btn_menu_div">' . "\n";
echo '<a class="btn_menu" href="team_org.php">Organization</a>' . "\n";
echo '</div>' . "\n";

echo '<div class="btn_menu_div">' . "\n";
echo '<a class="btn_menu" href="team_assignments.php">Assignments</a>' . "\n";
echo '</div>' . "\n";

if(IsAdmin() || IsEditor() || IsCaptain()) 
{
	echo '<div class="btn_menu_div">' . "\n";
	echo '<a class="btn_menu" href="wo_merge.php">Merge WO</a>' . "\n";
	echo '</div>' . "\n";
}

if(IsAdmin()) 
{
	echo '<div class="btn_menu_div">' . "\n";
	echo '<a class="btn_menu" href="wo_delete.php">Delete WO</a>' . "\n";
	echo '</div>' . "\n";
}

echo '</div>' . "\n";

?>