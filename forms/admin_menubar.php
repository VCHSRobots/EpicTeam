<?php
// --------------------------------------------------------------------
// admin_menubar.php -- HTML fragment to show the admin menu bar.
//
// Created: 12/29/14 DLB
// --------------------------------------------------------------------
?>

 <style>
    .content_area {min-height: 275px; } 
 </style>

<div class="menubar_area">

<div class="btn_menu_div">
<a class="btn_menu" href="admin_listusers.php">List Users</a>
</div>

<div class="btn_menu_div">
<a class="btn_menu" href="admin_adduser.php">Add User</a>
</div>

<div class="btn_menu_div">
<a class="btn_menu" href="admin_uploadusers.php">Upload Users</a>
</div>

<div class="btn_menu_div">
<a class="btn_menu" href="admin_showlog.php">Show Log</a>
</div>

<div class="btn_menu_div">
<a class="btn_menu" href="admin_masquerade.php">Masquerade</a>
</div>

<div class="btn_menu_div">
<a class="btn_menu" href="admin_bulkwo.php">Bulk WOs</a>
</div>

<?php
if(isset($config['DevBypass']))
{
	echo '<div class="btn_menu_div">' . "\n";
	echo '<a class="btn_menu" href="admin_testdata.php">Add Test Data</a>' . "\n";
	echo '</div>' . "\n";
}
?>

</div>
