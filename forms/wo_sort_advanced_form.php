<?php
// --------------------------------------------------------------------
// wo_new_form.php -- HTML fragment to show new workorder form.
//
// Created: 12/31/15 DLB
// --------------------------------------------------------------------

echo '<div class="content_area">';
echo '<h2 class="page_title">Advanced Filter</h2>' . "\n";


echo '<div class="inputform_area">' . "\n";
echo '<form action="list.php" method="post">' . "\n";

RenderParams($param_list);


echo "\n\n";
        echo '<div class="inputform_paramblock">' . "\n";
        echo '<div class="inputform_label">Author: </div>' ."\n";
        echo '<div class="inputform_selection">' . "\n";
        echo '<select name="Author" Style = "width: 300px"> ' . "\n";
        echo '<option value = ""></option>' . "\n";
$sql = "Select UserID, FirstName, LastName FROM Users;";
$result = SqlQuery($loc, $sql);
while ($row = $result->fetch_assoc())
{
    $firstName = $row["FirstName"];
    $lastName = $row["LastName"];
    $userID = $row["UserID"];
    echo '<option value="' . $userID . '"> ' . $firstName . ' ' . $lastName . '</option>' . "\n";
 }
 echo '</select>' . "\n";
 echo '</div>' . "\n";
 echo '</div>' . "\n";

echo "\n\n";
        echo '<div class="inputform_paramblock">' . "\n";
        echo '<div class="inputform_label">Student Assigned: </div>' . "\n";
        echo '<div class="inputform_selection">' . "\n";
        echo '<select name="StudentAssigned" Style = "width: 300px"> ' . "\n";
        echo '<option value = ""></option>' . "\n";
$sql = "Select UserID, FirstName, LastName FROM Users;";
$result = SqlQuery($loc, $sql);
while ($row = $result->fetch_assoc())
{
    $firstName = $row["FirstName"];
    $lastName = $row["LastName"];
    $userID = $row["UserID"];
    echo '<option value="' . $userID . '"> ' . $firstName . ' ' . $lastName . '</option>' . "\n";
 }
 echo '</select>' . "\n";
 echo '</div>' . "\n";
 echo '</div>' . "\n";


 echo "\n\n";
    echo '<div class="inputform_paramblock">' . "\n";
    echo '<div class="inputform_label">Date Created: </div>' . "\n";
    echo '<div class="wo_sorting_label">Between: </div>';
    echo '<div class="inputform_text_field"> <input type="date" ' . "\n";
    echo '  name="DateCreatedStart" Style = "width: 200px" Caption ="Date Created Start"';
    echo "></div>\n";
    echo '<div class="wo_sorting_label">And: </div>';
    echo '<div class="inputform_text_field"> <input type="date" ' . "\n";
    echo '  name="DateCreatedEnd" Style = "width: 200px" Caption ="Date Created End"';
    echo "></div>\n
    </div>\n";

     echo "\n\n";
    echo '<div class="inputform_paramblock">' . "\n";
    echo '<div class="inputform_label">Date Need By: </div>' . "\n";
    echo '<div class="wo_sorting_label">Between: </div>';
    echo '<div class="inputform_text_field"> <input type="date" ' . "\n";
    echo '  name="DateNeedByStart" Style = "width: 200px" Caption ="Date Need By Start"';
    echo "></div>\n";
    echo '<div class="wo_sorting_label">And: </div>';
    echo '<div class="inputform_text_field"> <input type="date" ' . "\n";
    echo '  name="DateNeedByEnd" Style = "width: 200px" Caption ="Date Need By End"';
    echo "></div>\n
    </div>\n";

echo '<div class="inputform_paramblock">' . "\n";
echo '<div class="inputform_label">Approved: </div>' . "\n";
echo '<input type="radio" name="Approved" value="1">Approved<br>';
echo '<input type="radio" name="Approved" value="0">Not Approved';
echo '<input type="radio" name="Approved" value="" checked="checked">Show Both';
echo '</div>';

echo '<div class="inputform_paramblock">' . "\n";
echo '<div class="inputform_label">ApprovedByCap: </div>' . "\n";
echo '<input type="radio" name="ApprovedByCap" value="1">Approved By Captain<br>';
echo '<input type="radio" name="ApprovedByCap" value="0">Not Approved By Captain';
echo '<input type="radio" name="ApprovedByCap" value="" checked="checked">Show Both';
echo '</div>';

echo '<div class="inputform_paramblock">' . "\n";
echo '<div class="inputform_label">Assigned: </div>' . "\n";
echo '<input type="radio" name="Assigned" value="1">Assigned<br>';
echo '<input type="radio" name="Assigned" value="0">Not Assigned';
echo '<input type="radio" name="Assigned" value="" checked="checked">Show Both';
echo '</div>';

echo '<div class="inputform_paramblock">' . "\n";
echo '<div class="inputform_label">Finished: </div>' . "\n";
echo '<input type="radio" name="Finished" value="1">Finished<br>';
echo '<input type="radio" name="Finished" value="0">Not Finished';
echo '<input type="radio" name="Finished" value="" checked="checked">Show Both';
echo '</div>';

echo '<div class="inputform_paramblock">' . "\n";
echo '<div class="inputform_label">Closed: </div>' . "\n";
echo '<input type="radio" name="Closed" value="1">Closed<br>';
echo '<input type="radio" name="Closed" value="0">Not Closed';
echo '<input type="radio" name="Closed" value="" checked="checked">Show Both';
echo '</div>';

echo '<div class="inputform_paramblock">' . "\n";
echo '<div class="inputform_label">Active: </div>' . "\n";
echo '<input type="radio" name="Active" value="1">Active<br>';
echo '<input type="radio" name="Active" value="0">Not Active';
echo '<input type="radio" name="Active" value="" checked="checked">Show Both';
echo '</div>';


echo '<div class="btn_form_submit_div">';
echo '<input class="btn_form_submit" name = "Filter" type="submit" value="Filter">' . "\n";

echo '</div>';
echo '</form></div>' . "\n";

echo '</div' . "\n";
?>