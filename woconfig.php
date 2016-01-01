<?php
// --------------------------------------------------------------------
// woconfig.php: Configuration File for the workorder related stuff.
//
// This file is conttains WO constants that are used through-out
// the website in workorder related code.
//
// Created: 01/01/16 DLB
// --------------------------------------------------------------------

$WOIPTeams = array(
    "",                      // Means none assigned 
    "CAD",
    "Build",
    "Programming",
    "Electronics",
    "CNC",
    "3D Printing",
    "IT",
    "Safety",
    "Management",
    "Business",
    "Purchasing");

$WOProjects = array(
    "",  
    "General",                  
    "Manipulator",
    "Chasis",
    "Pit",
    "Drive Station",
    "Advertizing",
    "Fund Rasing",
    "Safey");

$WOPriorities = array(
    "Routine",   // Put normal one first for defaults
    "Urgent",
    "High",
    "Low");
?>
