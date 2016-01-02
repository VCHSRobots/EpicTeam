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

ren("WIDStr",        "",          $wo["WIDStr"]                );
echo '<div style="clear: both;"></div>' . "\n";

if(!empty($pagetext)) echo $pagetext;
ren("Title",         "Title:",                $wo["Title"]                 );

echo '<div style="clear: both;"></div>' . "\n";

echo '<div id="wod_left">' . "\n";
ren("Priority",      "Priority:",            $wo["Priority"]              );
ren("Project",       "Project:",             $wo["Project"]               );
ren("Requestor",     "Requesting IPT:",      $wo["Requestor"]             );
ren("Receiver",      "Receiving IPT:",       $wo["Receiver"]              );
ren("AuthorName",    "Author:",              $wo["AuthorName"]            );
ren("Assigned",      "Assigned:",            YNstr($wo["Assigned"])       );
echo '</div>' ."\n";

echo '<div id="wod_right">' . "\n";
ren("DateNeedBy",    "Date Needed:",         $wo["DateNeedBy"]            );
ren("DateCreated",   "Date Created:",        $wo["DateCreated"]           );
ren("IsApproved",    "Approved:",            YNstr($wo["IsApproved"])     );
ren("ApprovedByCap", "Captian:",             YNstr($wo["ApprovedByCap"])  );
ren("Finished",      "Finished:",            YNstr($wo["Finished"])       );
ren("Closed",        "Closed:",              YNstr($wo["Closed"])         );
echo '</div>' ."\n";


//ren("Revision",      "Revision:",            RevisionToStr($wo["Revision"], $wo["IsApproved"]) );
//ren("Approved",      "Normal Approval:",     YNstr($wo["Approved"])       );
//ren("AuthorID",      "AuthorID:",            $wo["AuthorID"]              );

echo '<div style="clear: both;"></div>' . "\n";

ren("Work",          "Work To Do:",          $wo["Description"]           );

echo '</div' . "\n";

// --------------------------------------------------------------------
// Aids in rendering.
function ren($field, $caption, $value)
{
	echo '<div id="wod_' . $field . '_block" class="wod_block">';
	echo '<div id="wod_' . $field . '_label" class="wod_label">' . $caption . '</div>';
	echo '<div id="wod_' . $field . '_value" class="wod_value">' . $value . '</div>';
	echo '</div>' . "\n";
}
?>