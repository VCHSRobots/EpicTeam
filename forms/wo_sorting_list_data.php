<?php
// --------------------------------------------------------------------
// wo_sorting_list_data.php -- HTML fragment to show the work orders.
//
// Created: 12/31/15 SS
// --------------------------------------------------------------------

    if(isset($error_msg))
    {
        echo '<div class="showlog_error_message">' . $error_msg . '</div>';
    }

    if($view == "full"){

        // output data of each row
       // echo "<br>\n";
        echo '<table class="members_userlist">' . "\n<tr>\n";
        echo "<th align=left width=200><u>WorkOrder ID</u></th>";
        echo "<th align=left width=200><u>Title</u></th>";
        echo "<th align=left width=200><u>Receiving  Group</u></th>";
        echo "<th align=left width=200><u>Requesting  Group</u></th>";
        echo "<th align=left width=200><u>Project</u></th>";
        echo "<th align=left width=200><u>Priority</u></th>";
        echo "<th align=left width=250><u>Date Need By  Group</u></th>";
        echo '<th class="verticalTableHeader" align=left width=20><u>ApprovedByCap</u></th>';
        echo '<th class="verticalTableHeader" align=left width=20><u>Approved</u></th>';
        echo '<th class="verticalTableHeader" align=left width=20><u>Assigned</u></th>';
        echo '<th class="verticalTableHeader" align=left width=20><u>Finished</u></th>';
        echo '<th class="verticalTableHeader" align=left width=20><u>Active</u></th>';
        echo '<th class="verticalTableHeader" align=left width=20><u>Closed</u></th>';
        echo "<br>\n";

        while($row = $result->fetch_assoc()) {
            echo "\n<tr>";
            //echo '<th align=left> <a href="workorders_showworkorder.php?WID=' . $row["WID"] . '">' . $row["WID"] . '</a></th>'; 
            echo '<th align=left>'  . $row["WID"] . '</th>';
            echo '<th align=left>'  . $row["Title"] . '</th>';
            echo '<th align=left>'  . $row["Receiver"] . '</th>';
            echo '<th align=left>'  . $row["Requestor"] . '</th>';
            echo '<th align=left>'  . $row["Project"] . '</th>';
            echo '<th align=left>'  . $row["Priority"] . '</th>';
            echo '<th align=left>'  . $row["DateNeedBy"] . '</th>';
            echo '<th align=left>'  . $row["ApprovedByCap"] . '</th>';
            echo '<th align=left>'  . $row["Approved"] . '</th>';
            echo '<th align=left>'  . $row["Assigned"] . '</th>';
            echo '<th align=left>'  . $row["Finished"] . '</th>';
            echo '<th align=left>'  . $row["Closed"] . '</th>';
            echo '<th align=left>'  . $row["Active"] . '</th>';
            //echo "<br>\n";
        }
        echo "</table>\n";
    }

else{
            // output data of each row
        echo '<table class="members_userlist">' . "\n<tr>\n";
        echo "<th align=left width=200><u>WorkOrder ID</u></th>";
        echo "<th align=left width=200><u>Title</u></th>";
        echo "<th align=left width=200><u>Receiving  Group</u></th>";
        echo "<th align=left width=200><u>Requesting  Group</u></th>";
        //echo "<br>\n";

        while($row = $result->fetch_assoc()) {
            echo "\n<tr>";
            //echo '<th align=left> <a href="workorders_showworkorder.php?WID=' . $row["WID"] . '">' . $row["WID"] . '</a></th>'; 
            echo '<th align=left>'  . $row["WID"] . '</th>';
            echo '<th align=left>'  . $row["Title"] . '</th>';
            echo '<th align=left>'  . $row["Receiver"] . '</th>';
            echo '<th align=left>'  . $row["Requestor"] . '</th>';
            //echo "<br>\n";
        }
        echo "</table>\n";
}



?>