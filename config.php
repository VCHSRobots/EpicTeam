//<?php
// --------------------------------------------------------------------
// config.php: Configuration File for Entire Epic Admin website/application
//
// This file is conttains all the config settings that are used through-out
// the website.  There is ususally a different version of this file for
// each host: on your local computer, and on the real website.
//
// Created: 12/29/15 DLB
// --------------------------------------------------------------------

// This version is for the actual epicteam.org website!  
// Be Careful NOT TO OVERWITE!!!

$config = array(
    "db" => array(
            "host" => "localhost",
            "dbname" => "EpicTeam",
            "username" => "webpage",
            "password" => "loveepic",  //matthew1016
        ),
    "BaseUrl" => "http://epicteam.org/",
    "Salt" => "41566a17c50a", 
    "BaseDir" => "/var/www/html",
    "UploadDir" => "/var/www/html/uploads/",
    "UploadUrl" => "http://epicteam.org/uploads/",
    "LogDir" => "/var/www/html/logs/",
    "TimeZone" => "America/Los_Angeles",
    "ServerName" => "EpicTeam.Org",
    "DevBypass" => "dbrandon"
);
 
// Additional include paths for libs
ini_set('include_path', get_include_path() . PATH_SEPARATOR . $config["BaseDir"]);
ini_set('include_path', get_include_path() . PATH_SEPARATOR . $config["BaseDir"] . "/libs");

 
//     Error reporting.
ini_set("error_reporting", "true");
ini_set("display_errors", 1);  // TURN THIS FOR REAL DEPLOY
error_reporting(E_ALL|E_STRCT);
 
?>