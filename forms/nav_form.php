<?php
// --------------------------------------------------------------------
// nav_form.php -- Form for nav area that fits to left of most pages.
//                 Include after header.php if used on a given page.
// 
// Created: 12/29/14 DLB
// --------------------------------------------------------------------

require_once "maindef.php";

echo '<div id="nav_area">';
	           echo '<div class="btn_nav_div"><a class="btn_nav" href="' . $config["BaseUrl"] . 'pages/wo_addnew.php">New Order  </a></div>' . "\n";
               echo '<div class="btn_nav_div"><a class="btn_nav" href="' . $config["BaseUrl"] . 'pages/wo_addnew.php">Find Orders </a></div>' . "\n";
               echo '<div class="btn_nav_div"><a class="btn_nav" href="' . $config["BaseUrl"] . 'pages/wo_addnew.php">Your Orders </a></div>' . "\n";
               echo '<div class="btn_nav_div"><a class="btn_nav" href="' . $config["BaseUrl"] . 'pages/wo_addnew.php">Approve     </a></div>' . "\n";
               echo '<div class="btn_nav_div"><a class="btn_nav" href="' . $config["BaseUrl"] . 'pages/account.php"  >Account   </a>
               </div>' . "\n";
if(IsAdmin())  echo '<div class="btn_nav_div"><a class="btn_nav" href="' . $config["BaseUrl"] . 'pages/admin.php"    >Admin     </a></div>' . "\n";

if(IsAdmin() && isset($config['DevBypass']))
{
               echo '<div class="btn_navdiv"><a class="btn_nav" href="' . $config["BaseUrl"] . 'pages/test.php"      >Test      </a></div>' . "\n";
}

echo '</div>' . "\n";

?>
