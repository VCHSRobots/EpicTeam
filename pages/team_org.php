<?php
// --------------------------------------------------------------------
// team_org.php -- Shows IPT teams.
//
// Created: 01/04/16 DLB
// --------------------------------------------------------------------

require_once "../maindef.php";
$loc = rmabs(__FILE__);
$timer = new timer();

session_start();
log_page();
CheckLogin();

$pagetitle = "Team Organization";

$sql = 'SELECT * FROM UserView WHERE Active=1';
$result = SqlQuery($loc, $sql);
$everybody = array();
while($row = $result->fetch_assoc()) 
{
	$everybody[] = $row;
}

$teams = array();
$tm = array();
$tm["Name"] = "Captains";
$tm["Members"] = GetTaggedPepole("captain", $everybody);
$coaches = GetTaggedPepole("headcoach", $everybody);
foreach($coaches as $c)
{
	$tm["Members"][] = $c . ' - Head Coach';
}

$teams[] = $tm;

foreach($WOIPTeams as $t)
{
	if(empty($t)) continue;
	$tm = array();
	$tm["Name"] = $t;
	$tm["Members"] = GetTeamMembers($t, $everybody);
	$teams[] = $tm;
}

$tm = array();
$tm["Name"] = "Mentors";
$tm["Members"] = GetTaggedPepole("mentor", $everybody);
$teams[] = $tm;

//dumpit($teams);

GenerateHTML:
$stylesheet=array("../css/global.css", "../css/nav.css", "../css/team_org.css");
include "forms/header.php";
include "forms/nav_form.php";
include "forms/team_menubar.php";
include "forms/team_org_form.php";
include "forms/footer.php";

// --------------------------------------------------------------------
function GetTaggedPepole($tag, $everybody)
{
	$list = array();
	foreach($everybody as $person)
	{
		if(CheckRawTagList($tag, $person["Tags"])) 
		{
			$list[] = $person["FirstName"] . ' ' . $person["LastName"];
		}
	}
	return $list;
}

// --------------------------------------------------------------------
function GetTeamMembers($team, $everybody)
{
	$list = array();
	foreach($everybody as $p)
	{
		if($p["IPT"] == $team) 
		{
			$m = $p["FirstName"] . ' ' . $p["LastName"];
			if(CheckRawTagList("iptlead", $p["Tags"])) $m .= ' - Lead';
			if(CheckRawTagList("mentor", $p["Tags"])) $m .= ' - Mentor';
			$list[] = $m;
		}
	}
	return $list;
}

?>