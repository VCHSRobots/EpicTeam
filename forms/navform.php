<?php
// --------------------------------------------------------------------
// navform.php -- Form for nav area that fits to left of most pages.
//                Include after header.php if used on a given page.
// 
// Created: 12/29/14 DLB
// --------------------------------------------------------------------

require_once "maindef.php";

echo '<div id="nav_area">';
	           echo '<div class="nav_button"><a href="' . $config["BaseUrl"] . 'pages/workorders_addnew.php">Work Orders</a></div>' . "\n";
               echo '<div class="nav_button"><a href="' . $config["BaseUrl"] . 'pages/account.php"   >Account   </a></div>' . "\n";
if(IsAdmin())  echo '<div class="nav_button"><a href="' . $config["BaseUrl"] . 'pages/admin.php"     >Admin     </a></div>' . "\n";

if(IsAdmin() && isset($config['DevBypass']))
{
    echo '<div style="font-size: 8pt;"><a href="' . $config["BaseUrl"] . 't.php">test</a></div>' . "\n";
}

echo '</div>' . "\n";

?>
