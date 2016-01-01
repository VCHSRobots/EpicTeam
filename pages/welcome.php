<?php
// --------------------------------------------------------------------
// welcome.php -- The main welcome page.  Come here directly after
//                a login.
//
// Created: 12/29/14 DLB
// --------------------------------------------------------------------

require_once "../maindef.php";
$loc = rmabs(__FILE__);

session_start();
log_page();
CheckLogin();

include "../forms/header.php";
include "../forms/nav_form.php";
include "../forms/welcome_form.php";
include "../forms/footer.php";

?>