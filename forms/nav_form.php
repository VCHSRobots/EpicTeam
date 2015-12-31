<?php
// --------------------------------------------------------------------
// nav_form.php -- Form for nav area that fits to left of most pages.
//                 Include after header.php if used on a given page.
// 
// Created: 12/29/14 DLB
// --------------------------------------------------------------------

require_once "maindef.php";

$bu = $config["BaseUrl"];
echo '<div id="nav_area">';

echo '<div class="btn_nav_div"><a class="btn_nav" href="' . $bu . 'pages/yourwork.php" > Your Work  </a></div>' . "\n";
echo '<div class="btn_nav_div"><a class="btn_nav" href="' . $bu . 'pages/wo_new.php"   > New Order  </a></div>' . "\n";

if(IsEditor()) {
echo '<div class="btn_nav_div"><a class="btn_nav" href="' . $bu . 'pages/inbox.php"    > In Box     </a></div>' . "\n";}

echo '<div class="btn_nav_div"><a class="btn_nav" href="' . $bu . 'pages/list.php"     > Find / List</a></div>' . "\n";
if(IsAdmin()) { 
echo '<div class="btn_nav_div"><a class="btn_nav" href="' . $bu . 'pages/admin.php"    > Admin      </a></div>' . "\n";}

//if(IsAdmin() && isset($config['DevBypass'])) {
//echo '<div class="btn_nav_div"><a class="btn_nav" href="' . $bu . 'pages/test.php"     > Test       </a></div>' . "\n";}

echo '</div>' . "\n";

?>
