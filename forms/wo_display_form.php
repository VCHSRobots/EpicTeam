<?php
// --------------------------------------------------------------------
// wo_display_form.php -- HTML fragment for wo display,
//
// Created: 01/02/16 DLB
// --------------------------------------------------------------------

echo '<div class="content_area">';
echo '<h2 class="page_title"> ' . $pagetitle . '</h2>' . "\n";

if(!empty($success_msg))
{
    echo '<div class="inputform_msg" id="inputform_success_msg" >' . $success_msg . "</div>";
}
if(!empty($error_msg))
{
    echo '<div class="inputform_msg" id="inputform_error_msg" >' . $error_msg . "</div>";
}

RenderField("wo", "wo_WIDStr",        "",                     $wo["WIDStr"]                );
echo '<div style="clear: both;"></div>' . "\n";

if(!empty($pagetext)) echo $pagetext;
RenderField("wo", "wo_Title",         "Title:",               $wo["Title"]                 );

echo '<div style="clear: both;"></div>' . "\n";

echo '<div id="wod_left">' . "\n";
RenderField("wo", "wod_Priority",      "Priority:",            $wo["Priority"]              );
RenderField("wo", "wod_Project",       "Project:",             $wo["Project"]               );
RenderField("wo", "wod_Requestor",     "Requesting IPT:",      $wo["Requestor"]             );
RenderField("wo", "wod_Receiver",      "Receiving IPT:",       $wo["Receiver"]              );
RenderField("wo", "wod_AuthorName",    "Author:",              $wo["AuthorName"]            );
RenderField("wo", "wod_Assigned",      "Assigned:",            YNstr($wo["Assigned"])       );
echo '</div>' ."\n";

echo '<div id="wod_right">' . "\n";
RenderField("wo", "wod_DateNeedBy",    "Date Needed:",         $wo["DateNeedBy"]            );
RenderField("wo", "wod_DateCreated",   "Date Created:",        $wo["DateCreated"]           );
RenderField("wo", "wod_IsApproved",    "Approved:",            YNstr($wo["IsApproved"])     );
RenderField("wo", "wod_ApprovedByCap", "Captian:",             YNstr($wo["ApprovedByCap"])  );
RenderField("wo", "wod_Finished",      "Finished:",            YNstr($wo["Finished"])       );
RenderField("wo", "wod_Closed",        "Closed:",              YNstr($wo["Closed"])         );
echo '</div>' ."\n";


//ren("Revision",      "Revision:",            RevisionToStr($wo["Revision"], $wo["IsApproved"]) );
//ren("Approved",      "Normal Approval:",     YNstr($wo["Approved"])       );
//ren("AuthorID",      "AuthorID:",            $wo["AuthorID"]              );

echo '<div style="clear: both;"></div>' . "\n";

RenderField("wo", "wod_Work",          "Work To Do:",          $wo["Description"]           );

echo '<div style="clear: both;"></div>' . "\n";

echo '<div id="appened_data_label">Appened Data:</div>' . "\n";
echo '<div id="appened_data_list">' . "\n";
foreach($ap as $a)
{
	RenderAppendedData($a);
}
echo '</div>'. "\n";

echo '</div' . "\n";


// --------------------------------------------------------------------
// Render one block of appened data
function RenderAppendedData($a)
{
	global $wid;
	$author = "";
	$date   = "";
	$text   = "";
	$picid  = 0;
	$picurl_thumb = "";

	if(!empty($a["AuthorName"]))  $author = $a["AuthorName"];
	if(!empty($a["DateCreated"])) $date   = $a["DateCreated"];
	if(!empty($a["TextInfo"]))    $text   = $a["TextInfo"];
	if(!empty($a["PicID"]))       $picid =  intval($a["PicID"]);

	if($picid > 0) 
	{
		$picfile_thumb = PicPathName($picid, "thumb");
		if(file_exists($picfile_thumb)) 
		{
			$picurl_thumb = PicUrl($picid, "thumb");
		}
	}

	echo '<div class="wo_ap_block">';
	echo '<div class="wo_ap_header">';
	echo '<div class="wo_ap_author">' . $author . '</div>' . "\n";
	echo '<div class="wo_ap_date">' . $date . '</div>' . "\n";
	echo '</div>' . "\n";
	echo '<div class="wo_ap_body">';
	if(!empty($picurl_thumb))
	{
		echo '<div class="wo_ap_image">';
		echo '<a href=image.php?picid=' . $picid . "&wid=" . $wid . '"><img src="' . $picurl_thumb . '"></a>';
		echo '</div>';
		echo '<div class="wo_ap_text_i">' . $text . '</div>' . "\n";
	}
	else 
	{
		echo '<div class="wo_ap_text">' . $text . '</div>' . "\n";
	}
	echo '</div>' . "\n";
	echo '</div>' . "\n";
	echo '<div style="clear: both;"></div>' ."\n";

}



?>